@extends('layouts.master')

@section('title', 'Books Form')

@section('content')
    <div class="row">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card col-lg-12">
            <div class="card-body">
                <form action={{ $book->id !== '' || $book->id !== null ? route('book/update') : route('book/store') }} method="POST">
                    @csrf
                    <div class="row">
                        <label class="col-form-label col-lg-3"> Title </label>
                        <div class="col-lg-9">
                            <input type="hidden" name="id" value={{ $book->id }}>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}" required>
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <label class="col-form-label col-lg-3"> Authors </label>
                        <div class="col-lg-9">
                            <input type="text" name="authors" id="authors" class="form-control @error('authors') is-invalid @enderror" value="{{ $book->authors }}" required>
                            @error('authors')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="col-form-label col-lg-3"> Publisher </label>
                        <div class="col-lg-9">
                            <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ $book->publisher }}" required>
                            @error('publisher')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="col-form-label col-lg-3"> Release Year </label>
                        <div class="col-lg-3">
                            <input type="text" name="release_year" id="release_year" class="form-control @error('release_year') is-invalid @enderror" value="{{ $book->release_year }}" required>
                            @error('release_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label class="col-form-label col-lg-3"> Pages </label>
                        <div class="col-lg-3">
                            <input type="text" name="page" id="page" class="form-control @error('page') is-invalid @enderror" value="{{ $book->page }}" required>
                            @error('page')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="col-form-label col-lg-3"> Stock </label>
                        <div class="col-lg-9">
                            <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $book->stock }}" required>
                            @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary float-right" value="Save" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection