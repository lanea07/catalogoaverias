<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <input
        class="form-control form-control-lg"
        id="emailAddress"
        type="text"
        placeholder="Email Address"
        data-sb-validations="required,email" 
        wire:model.live="query"
        wire:keydown.escape="resetInput"/>

    <ul class="list-group">
        @forelse ($products as $product)
            <li class="list-group-item">{{ $product }}</li>
        @empty
            @if($query)
                <li class="list-group-item">No hay Items</li>
            @endif
        @endforelse
    </ul>
</div>
