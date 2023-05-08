@extends('layouts.app')

@section('content')
<x-content-container>
    <x-slot:topTitle>{{ __('Books') }}</x-slot:topTitle>

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
                        <th>
                            <a href="#order_by-Description">
                                @lang('Description')
                            </a>
                        </th>
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
                    <td
                        class="text-truncate" style="max-width: 20vw;"
                        title="{{ $book->title }}"
                    >{{ $book->title }}</td>
                    <td
                        class="text-truncate" style="max-width: 20vw;"
                        title="{{ $book->description }}"
                    >{{ $book->description }}</td>
                    <td
                        class="text-truncate" style="max-width: 20vw;"
                        title="{{ $book->author?->name }}"
                    >
                        <a href="{{ route('authors.show', $book->author_id ) }}">
                            {{ $book->author?->name }}
                        </a>
                    </td>
                    <td>{{ $book->page_count }}</td>
                    <td>
                        <div class="btn-group d-flex" style="min-width: 22vw;overflow: hidden;white-space: nowrap;">
                            <x-bs-confirm-modal
                                :key="$book->id"
                                class="btn btn-sm btn-danger px-3 px-md-1 show-label-on-hover"
                            >
                                <x-slot:trigger>
                                    <i class="bi bi-trash"></i>
                                    <span class="hover-label mx-1">@lang('Delete')</span>
                                </x-slot:trigger>

                                <x-slot:message>
                                    <p>
                                        @lang('Are you sure you want to delete this :item?', ['item' => __('book')])
                                    </p>
                                    <p>
                                        @lang('Book'):
                                        <a
                                            href="{{ route('books.show', $book->id ) }}"
                                            class="text-info px-3 px-md-1"
                                        >
                                            {{ $book->title }} (#{{ $book->id }})
                                        </a>
                                    </p>

                                    <form
                                        id="books_destroy_{{ $book->id }}"
                                        action="{{ route('books.destroy', $book->id ) }}"
                                        method="POST"
                                        class="d-none"
                                    >
                                        @csrf
                                        @method('delete')
                                    </form>
                                </x-slot:message>

                                <x-slot:yes
                                    onclick="event.preventDefault();
                                        document.getElementById('books_destroy_{{ $book->id }}').submit();"
                                    class="btn-danger"
                                >
                                    @lang('Yes, delete!')
                                </x-slot:yes>
                            </x-bs-confirm-modal>

                            <a
                                href="{{ route('books.edit', $book->id ) }}"
                                class="btn btn-sm btn-outline-primary px-3 px-md-1 show-label-on-hover"
                            >
                                <i class="bi bi-pencil-square"></i>
                                <span class="hover-label mx-1">@lang('Edit')</span>
                            </a>

                            <a
                                href="{{ route('books.show', $book->id ) }}"
                                class="btn btn-sm btn-outline-info px-3 px-md-1 show-label-on-hover">
                                <i class="bi bi-cursor"></i>
                                <span class="hover-label mx-1">@lang('Show')</span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
                @if ($books->count())
                <tfoot>
                    <tr>
                        <td colspan="100%">
                            <div class="row">
                                <div class="col-md-2 col-sm-12">
                                    <span>@lang('Items per page')</span>
                                    <select name="per_page" class="form-control">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <div class="col-md-10 col-sm-12 mt-2 pt-3">
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
</x-content-container>
@endsection
