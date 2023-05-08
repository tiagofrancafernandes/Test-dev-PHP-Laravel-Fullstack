@extends('layouts.app')

@section('content')

<x-content-container>
    <x-slot:topTitle>{{ $title ?? '' }}</x-slot:topTitle>

    <div class="row">
        <div class="col-sm-12">
            <form
                action="{{ $action }}"
                method="POST"
            >
                @csrf
                @if (($type ?? '') === 'edit')
                    @method('PUT')
                @endif

                <div class="form-group mb-3">
                    <label for="title">@lang('Title')</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') ?? $book->title ?? '' }}"
                        placeholder="@lang('Title')"
                        class="form-control @error('title') is-invalid @enderror"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">@lang('Description')</label>

                    <textarea
                        name="description"
                        id="description"
                        placeholder="@lang('Description')"
                        class="form-control @error('description') is-invalid @enderror"
                        cols="30"
                        rows="10"
                        required
                    >{{ old('description') ?? $book->description ?? '' }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="author_id">@lang('Author_id')</label>
                    <select
                        name="author_id"
                        id="author_id"
                        value="{{ old('author_id') ?? $book->author_id ?? '' }}"
                        class="form-control @error('author_id') is-invalid @enderror"
                        required
                    >
                        <option value="">@lang('Select an author')</option>
                        @foreach (($authors ?? []) as $author)
                            <option
                                value="{{ $author->id }}"
                                {{ ($book ?? null) && ($book->author_id === $author->id) ? 'selected' : '' }}
                                >
                                {{ $author->name }}
                                {{ ($book ?? null) && ($book->author_id === $author->id) ? '(' . __("current") . ')' : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="page_count">@lang('Page total')</label>
                    <input
                        type="number"
                        name="page_count"
                        id="page_count"
                        value="{{ old('page_count') ?? $book->page_count ?? '' }}"
                        placeholder="@lang('Page total')"
                        class="form-control @error('page_count') is-invalid @enderror"
                        required
                    >
                    @error('page_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button
                        type="submit"
                        class="btn btn-outline-primary"
                    >@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</x-content-container>
@endsection
