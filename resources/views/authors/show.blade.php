@extends('layouts.app')

@section('content')
<x-content-container>
    <x-slot:topTitle>
        {{ __('Author profile') }}:
        {{ $author->name }}
        (ID: {{ $author->id }})
    </x-slot:topTitle>

    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <td colspan="100%">


                            <x-bs-confirm-modal
                                :key="$author->id"

                                class="btn btn-sm btn-outline-danger"
                            >
                                <x-slot:trigger>
                                    <i class="bi bi-trash"></i>

                                    @lang('Delete')
                                </x-slot:trigger>

                                <x-slot:message>
                                    <p>
                                        @lang('Are you sure you want to delete this :item?', ['item' => __('author')])
                                    </p>
                                    <p>
                                        @lang('Author'):
                                        <a
                                            href="{{ route('authors.show', $author->id ) }}"
                                            class="text-info px-3 px-md-1"
                                        >
                                            {{ $author->name }} (#{{ $author->id }})
                                        </a>
                                    </p>

                                    @if ($author?->books_count)
                                    <p>
                                        <strong>
                                        @lang('This author has :count :items', [
                                            'count' => $author?->books_count,
                                            'items' => __('books'),
                                        ]).
                                        </strong>
                                    </p>
                                    @endif

                                    <form
                                        id="authors_destroy_{{ $author->id }}"
                                        action="{{ route('authors.destroy', $author->id ) }}"
                                        method="POST"
                                        class="d-none"
                                    >
                                        @csrf
                                        @method('delete')
                                    </form>
                                </x-slot:message>

                                <x-slot:yes
                                    onclick="event.preventDefault();
                                        document.getElementById('authors_destroy_{{ $author->id }}').submit();"
                                    class="btn-danger"
                                >
                                    @lang('Yes, delete!')
                                </x-slot:yes>
                            </x-bs-confirm-modal>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>@lang('ID')</th>
                        <td>{{ $author->id }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Name')</th>
                        <td>{{ $author->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Total of books')</th>
                        <td>{{ $author?->books_count }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-content-container>
@endsection
