@if ($errors->any())
    <div class="alert alert-danger px-4 mx-5 pb-1 mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
<x-bs-alert color="success" class="mb-2">
    {{ session('status') }}
</x-bs-alert>
@endif

@if (session('success'))
<x-bs-alert color="success" class="mb-2">
    {{ session('success') }}
</x-bs-alert>
@endif

@if (session('error'))
<x-bs-alert color="danger" class="mb-2">
    {{ session('error') }}
</x-bs-alert>
@endif

@if (session('warning'))
<x-bs-alert color="warning" class="mb-2">
    {{ session('warning') }}
</x-bs-alert>
@endif
