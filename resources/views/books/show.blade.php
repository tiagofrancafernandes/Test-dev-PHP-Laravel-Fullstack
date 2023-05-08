@extends('layouts.app')

@section('content')
<x-content-container>
    <x-slot:topTitle>
        {{ __('Book') }}:
        {{ $book->title }}
        (ID: {{ $book->id }})
    </x-slot:topTitle>

    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <td colspan="100%">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 d-flex d-sm-flex justify-content-center justify-content-md-end justify-content-evenly justify-content-md-between">
                                    <a href="{{ route('books.edit', $book->id ) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil-square"></i>

                                        @lang('Edit')
                                    </a>

                                    <x-bs-confirm-modal
                                        :key="$book->id"

                                        class="btn btn-sm btn-outline-danger"
                                    >
                                        <x-slot:trigger>
                                            <i class="bi bi-trash"></i>

                                            @lang('Delete')
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
</x-content-container>
@endsection
