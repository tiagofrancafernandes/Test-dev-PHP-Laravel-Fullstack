<div {{ $attributes->merge([
    'class' => "alert alert-" . ($color ?? 'info')
]) }} role="alert">
    {{ $slot }}
</div>
