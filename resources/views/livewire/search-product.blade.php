<div>
    <form class="form-subscribe" id="contactForm" wire:submit="search">
        <div class="row">
            <div class="col">

                <div class="form-floating">
                    <input class="form-control form-control-lg" id="categories-search" type="text"
                        placeholder="Categorias..." wire:model.live="query" wire:keydown.escape="resetInput" />
                    <label class="form-label" for="categories-search">{{ __('Categories') }}...</label>
                </div>
                
                    <ul class="list-group" id="dropdown-search">
                        <li wire:loading class="list-group-item"><p>Loading...</li>
                        @if (!$error)
                            @forelse ($categories as $category)
                                <li wire:click="search('{{ $category['categoria'] }}')"
                                    class="list-group-item link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                    {{ $category['categoria'] }}</li>
                            @empty
                                @if ($error)
                                    <li class="list-group-item">{{ __('An error has occurred, please try again later') }}</li>
                                @endif
                                @if ($query)
                                    <li class="list-group-item">{{ __('No Items Found') }}</li>
                                @endif
                            @endforelse
                        @else
                            <li class="list-group-item text-danger">{{ $error }}</li>
                        @endif
                    </ul>
                
            </div>
            <div class="col-auto">
                <button wire:click="search" class="btn btn-primary btn-lg">{{ __('Search') }}</button>
            </div>
        </div>
    </form>
</div>