@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Books') }}</h5>

                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('books.create') }}" class="btn btn-md btn-outline-primary">
                                @lang('Create')
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
                                        <th>
                                            <a href="#order_by-ID">
                                                @lang('ID')
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#order_by-Title">
                                                @lang('Title')
                                            </a>
                                        </th>
                                        {{-- <th>
                                            <a href="#order_by-Description">
                                                @lang('Description')
                                            </a>
                                        </th> --}}
                                        <th>
                                            <a href="#order_by-Author">
                                                @lang('Author')
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#order_by-Pages">
                                                @lang('Pages')
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#order_by-Actions">
                                                @lang('Actions')
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    {{-- <td>{{ $book->description }}</td> --}}
                                    <td>
                                        <a href="{{ route('authors.show', $book->author_id ) }}">
                                            {{ $book->author?->name }}
                                        </a>
                                    </td>
                                    <td>{{ $book->page_count }}</td>
                                    <td>
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

                                        <a href="{{ route('books.show', $book->id ) }}" class="btn btn-sm btn-outline-info">
                                            @lang('Show')
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                @if ($books->count())
                                <tfoot>
                                    <tr>
                                        <td colspan="100%">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>@lang('Items per page')</span>
                                                    <select name="per_page" class="form-control">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6">
                                                    {{ $books->links('pagination::bootstrap-5') }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
