@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        {{ __('Book') }}:
                        {{ $book->title }}
                        (ID: {{ $book->id }})
                    </h5>

                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('books.create') }}" class="btn btn-md btn-outline-primary">
                                @lang('Create')
                            </a>

                            <a href="{{ route('books.index') }}" class="btn btn-md btn-outline-primary">
                                @lang('Books')
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="100%">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4>@lang('Actions')</h4>
                                                    <div class="w-100">
                                                        <button
                                                            href=""
                                                            onclick="event.preventDefault();
                                                                document.getElementById('books_destroy_{{ $book->id }}').submit();"
                                                            class="btn btn-sm btn-outline-danger">
                                                            @lang('Delete')
                                                        </button>

                                                        <form
                                                            id="books_destroy_{{ $book->id }}"
                                                            action="{{ route('books.destroy', $book->id ) }}"
                                                            method="POST"
                                                            class="d-none"
                                                        >
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="{{ route('books.edit', $book->id ) }}" class="btn btn-sm btn-outline-primary">
                                                            @lang('Edit')
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <td>{{ $book->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('Title')</th>
                                        <td>{{ $book->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('Author')</th>
                                        <td> <a href="{{ route('authors.show', $book->author_id ) }}"> {{ $book->author?->name }} </a> </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('Pages')</th>
                                        <td>{{ $book->page_count }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('Description')</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>{{ $book->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
