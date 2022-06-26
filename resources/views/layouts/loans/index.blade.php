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
                                        <td><a href="javascript:void(0)">{{ $row->title }}</a></td>
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