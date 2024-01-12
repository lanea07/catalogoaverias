<x-app-layout  :title="trans_choice('Product|Products', 2)">

    <div class="container mt-3">
        {{ $dataTable->table([], false) }}
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
    
</x-app-layout>
