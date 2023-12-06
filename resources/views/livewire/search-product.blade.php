<div>
    <form class="form-subscribe" id="contactForm" wire:submit="search">
        <div class="row d-flex align-items-center">
            <div class="col">

                <div class="form-floating">
                    <input class="form-control form-control-lg @error('query') is-invalid @enderror" id="categories-search" type="text"
                        placeholder="Categorias..." wire:model.live="query" wire:keydown.escape="resetInput" />
                    <label class="form-label" for="categories-search">{{ trans_choice('Category|Categories', 2) }}...</label>
                </div>
                
                    <ul class="list-group" id="dropdown-search">
                        <li wire:loading class="list-group-item link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Loading...</li>
                        @if (!$error)
                            @forelse ($categories as $category)
                                <li wire:click="search('{{ $category['categoria'] }}')"
                                    class="list-group-item link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                    <small>Categoría: </small>{!! $category['categoria'] !!} | <small>Descripción: </small>{!! $category['descripcion'] !!}
                                </li>
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