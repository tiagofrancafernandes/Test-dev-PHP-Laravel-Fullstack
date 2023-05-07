@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ($title ?? null)
                    <h5>
                        {{ $title ?? '' }}
                    </h5>
                    @endif

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
                                        class="form-control"
                                        required
                                    >
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">@lang('Description')</label>

                                    <textarea
                                        name="description"
                                        id="description"
                                        placeholder="@lang('Description')"
                                        class="form-control"
                                        cols="30"
                                        rows="10"
                                        required
                                    >{{ old('description') ?? $book->description ?? '' }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="author_id">@lang('Author_id')</label>
                                    <select
                                        name="author_id"
                                        id="author_id"
                                        value="{{ old('author_id') ?? $book->author_id ?? '' }}"
                                        class="form-control"
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
                                </div>

                                <div class="form-group mb-3">
                                    <label for="page_count">@lang('Page_count')</label>
                                    <input
                                        type="number"
                                        name="page_count"
                                        id="page_count"
                                        value="{{ old('page_count') ?? $book->page_count ?? '' }}"
                                        placeholder="@lang('Page_count')"
                                        class="form-control"
                                        required
                                    >
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
