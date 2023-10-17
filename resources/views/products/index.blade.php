<x-app-layout>

    
        <div class="row d-flex align-items-center justify-content-center my-3">
            <div class="col-10">
                {{ $dataTable->table() }}
            </div>
        </div>
        
    
    
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
