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

@section('jsFunctions')
<script>
    $(document).ready(function(){
        $('#show_data').on('click', '.item-edit', function(){
            const id = $(this).data('id')

            Swal.fire({
                icon: 'question',
                title: 'Are you sure you already return the book?',
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