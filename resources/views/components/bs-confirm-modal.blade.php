@props([
    'trigger',
    'key',
    'title',
    'message',
    'yes',
    'no',
    'dismiss',
])

@php
    $elementKey = rand(10, 800) . '-' . $key;
@endphp

<button
    {{ $attributes->merge(['class' => 'btn']) }}
    data-bs-toggle="modal" data-bs-target="[modal-content-content='{{ $elementKey }}']"
>
{{ $trigger ?? __('Confirm?') }}
</button>

<!-- Modal -->
<div class="modal fade" modal-content-content="{{ $elementKey }}" tabindex="-1" aria-labelledby="{{ $elementKey }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1
                    @isset ($title)
                    {{ $title->attributes->merge([ 'class' => '']) }}
                    @endif
                    class="modal-title fs-5"
                    id="{{ $elementKey }}">
                    {{ $title ?? __('Confirm?') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($message ?? null)
            <div class="modal-body">
                {{ $message }}
            </div>
            @endif
            <div class="modal-footer">
                <div class="w-100 d-flex justify-content-center  justify-content-between">
                    @isset ($yes)
                    <button type="button" {{ $yes->attributes->class(['btn', 'btn-primary']) }}>
                        {{ $yes ?? __('Yes') }}
                    </button>
                    @endif

                    @isset ($no)
                    <button
                        type="button"
                        {{ $no->attributes->class(['btn', 'btn-outline-primary']) }}
                        data-bs-dismiss="modal"
                    >
                        {{ $no ?? __('No') }}
                    </button>
                    @endif

                    <button
                        type="button"
                        data-bs-dismiss="modal"
                        class="btn btn-secondary"
                        @isset ($dismiss)
                        {{ $dismiss->attributes->merge([ 'class' => '']) }}
                        @endif
                    >
                        {{ $dismiss ?? __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
