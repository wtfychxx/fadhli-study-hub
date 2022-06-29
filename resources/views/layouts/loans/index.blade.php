@extends('layouts.master')

@section('title', 'My Book')

@section('content')
    <div class="row">
        @if(session('success'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Book title </th>
                                    <th> Loan Date </th>
                                    <th> Expire Date </th>
                                </tr>
                            </thead>
                            
                            <tbody id="show_data">
                                @foreach($loan as $row)
                                    <tr>
                                        <td>
                                            <a class="item-edit" href="javascript:void(0)" data-id="{{ $row->id }}">{{ $row->title }}</a>
                                            <form action="{{ route('mybook/return', $row->id) }}" method="POST" id="frm_return{{ $row->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" id="penalty" name="penalty">
                                            </form>
                                        </td>
                                        <td>{{ $row->loan_date }}</td>
                                        <td class="{{ $row->expire_date < date('Y-m-d') ? 'text-danger' : 'text-success'}}">{{ $row->expire_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsLibrary')
<script src="{{ url('templates/libs/moment/moment.js') }}"></script>
@endsection

@section('jsFunctions')
<script>
    const data = {!! json_encode($loan->toArray()) !!}

    const formatRupiah = (angka, prefix = 'Rp. ') => {
		let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return `${prefix} ${rupiah}`
	}

    $(document).ready(function(){
        $('#show_data').on('click', '.item-edit', function(){
            const id = $(this).data('id')

            const selected = data.filter((entry) => entry.id)
            const selectedData = selected[0]
            const loanData = {
                penaltyTotal: 0
            }
            const expireDate = moment(selectedData.expire_date)
            const today = moment()
            const differentDate = today.diff(expireDate, 'days')

            if(differentDate > 0){
                loanData.penaltyTotal = differentDate * 1000
                document.querySelector('#penalty').value = loanData.penaltyTotal
            }

            Swal.fire({
                icon: 'question',
                title: 'Are you sure you already return the book?',
                text: `You returning ${differentDate} day after expire date, you should pay ${formatRupiah(loanData.penaltyTotal)}`,
                showCancelButton: true,
                cancelButtonText: "No, I'm not"
            }).then((result) => {
                if(result.value){
                    $(`#frm_return${id}`).submit()
                }
            })
        })
    })
</script>
@endsection