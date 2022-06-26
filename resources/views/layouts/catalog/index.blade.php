@extends('layouts.master')

@section('title', 'Catalog')

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
                    <form action="{{ route('catalog/filter') }}" method="GET">
                        <div class="row align-items-end">
                            <div class="col-lg-3">
                                <label class="col-form-label"> Title </label>
                                <input type="text" name="title" id="title_filter" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label class="col-form-label"> Authors </label>
                                <input type="text" name="authors" id="authors_filter" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label class="col-form-label"> Release Year </label>
                                <input type="text" name="release_year" id="release_year_filter" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-sm-3">
                                <button class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Authors </th>
                                    <th> Publisher </th>
                                    <th> Release Year </th>
                                    <th> Total Page </th>
                                    <th> Stock </th>
                                    <th>  </th>
                                </tr>
                            </thead>
                            
                            <tbody id="show_data">
                                @foreach($book as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->authors }}</td>
                                        <td>{{ $row->publisher }}</td>
                                        <td>{{ $row->release_year }}</td>
                                        <td>{{ $row->page }}</td>
                                        <td>{{ $row->stock }}</td>
                                        <td>
                                            <button class="btn btn-success btn-rounded-lg item-edit" id="btn_pinjam" data-id="{{ $row->id }}"> Borrow </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Loaning Form </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('catalog/store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-lg-3 label col-form-label"> Title </label>
                            <div class="col-lg-9">
                                <input type="hidden" name="book_id" id="book_id" class="form-control" readonly>
                                <input type="text" name="title" id="title" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-lg-3 label col-form-label"> Authors </label>
                            <div class="col-lg-9">
                                <input type="text" name="authors" id="authors" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-lg-3 label col-form-label"> Publisher </label>
                            <div class="col-lg-9">
                                <input type="text" name="publisher" id="publisher" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-lg-3 label col-form-label"> Release Year </label>
                            <div class="col-lg-9">
                                <input type="text" name="release_year" id="release_year" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-lg-3 label col-form-label"> Return before </label>
                            <div class="col-lg-9">
                                <input type="date" name="expire_date" id="expire_date" class="form-control" format="y-m-d" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-hidden="true"> Close </button>
                        <button type="submit" class="btn btn-primary" id="btn_save"> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('jsLibrary')
<script src="{{ url('templates/libs/moment/moment.js') }}"></script>
@endsection

@section('jsFunctions')
<script>
    const data = {!! json_encode($book->toArray()) !!}
    const today = moment().format('YYYY-MM-DD')
    $(document).ready(function(){
        $('table').dataTable()

        $('#show_data').on('click', '.item-edit', function(){
            const id = $(this).data('id')

            const filterData = data.filter(entry => entry.id === id)
            const filteredData = filterData[0]
            console.log(filteredData)

            $('#book_id').val(filteredData['id'])
            $('#title').val(filteredData['title'])
            $('#authors').val(filteredData['authors'])
            $('#publisher').val(filteredData['publisher'])
            $('#release_year').val(filteredData['release_year'])
            $('#expire_date').val(moment(today).add(1, 'week').format('YYYY-MM-DD'))

            $('#modalAdd').modal('show')
        })
    })
</script>
@endsection