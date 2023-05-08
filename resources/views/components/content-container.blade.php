@props([
    'topTitle',
    'topActions',
])

<div {{ $attributes->merge(['class' => 'container-box px-2']) }}>
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6 col-sm-12 d-flex d-sm-flex justify-content-center justify-content-md-start">
                            @if ($topTitle ?? null)
                            <h5 {{ $topTitle->attributes->class(['mt-2', 'text-lg']) }}>
                                {{ $topTitle }}
                            </h5>
                            @endif
                        </div>

                        <div class="col-md-6 col-sm-12 d-flex d-sm-flex justify-content-center justify-content-md-end justify-content-between">
                            @if (!in_array(Route::currentRouteName(), [
                                'books.index',
                            ]))
                                <a href="{{ route('books.index') }}" class="btn btn-md btn-outline-primary mx-sm-2">
                                    <i class="bi bi-bookshelf"></i>
                                    @lang('Book list')
                                </a>
                            @endif

                            @if (!in_array(Route::currentRouteName(), [
                                'books.create',
                            ]))
                                <a href="{{ route('books.create') }}" class="btn btn-md btn-primary mx-sm-2">
                                    <i class="bi bi-plus-lg"></i>
                                    @lang('Add new book')
                                </a>
                            @endif

                            @if ($topActions ?? null)
                            {{ $topActions }}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
