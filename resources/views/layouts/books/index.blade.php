@extends('layouts.master')

@section('title', 'Books')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="col-lg-12">
            <a href="{{ route('book/create') }}" class="btn btn-primary float-right">
                Add
            </a>
            <div class="table-responsive mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Authors </th>
                            <th> Publisher </th>
                            <th> Release Year </th>
                            <th> Total Page </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        @foreach($data as $row)
                            <tr>
                                <td><a href="{{ route('book/edit', $row->id) }}">{{ $row->title }}</a></td>
                                <td>{{ $row->authors }}</td>
                                <td>{{ $row->publisher }}</td>
                                <td>{{ $row->release_year }}</td>
                                <td>{{ $row->page }}</td>
                                <td>
                                    <a class="btn btn-danger btn-rounded-lg item-delete" data-id="{{ $row->id }}" href="javascript:void(0)"> Delete </a>

                                    <form action="{{ route('book/destroy', $row->id) }}" class="d-none" method="POST" id="frm_delete{{ $row->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('jsFunctions')
    <script>
        $(document).ready(function(){
            $('table').dataTable()

            $('#show_data').on('click', '.item-delete', function(){
                const id = $(this).data('id')

                Swal.fire({
                    icon: 'question',
                    title: 'Are you sure?',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel'
                }).then(() => {
                    $(`#frm_delete${id}`).submit()
                })
            })
        })
    </script>
@endsection