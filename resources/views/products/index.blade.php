<x-app-layout  :title="__('Products')">

    <div class="container mt-3">
        {{ $dataTable->table() }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
    
</x-app-layout>
