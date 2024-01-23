<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasWithBothOptionsLabel">
  
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ __('Menu') }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
    <div class="accordion " id="accordion">
      
      @if (auth()->user() && auth()->user()->hasRoles(['Admin','Supervisor de Catálogo']))
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
              {{ trans_choice('Product|Products', 2) }}
            </button>
          </h2>
          <div id="collapseProducts" class="accordion-collapse collapse" data-bs-parent="#accordion">
            <div class="accordion-body">
              <div class="list-group ">
                <a class="list-group-item list-group-item-action {{ setActive('products.create') }}" href="{{ route('products.create') }}"><i class="fa-regular fa-file me-2"></i>{{ __('New') }}</a>
                <a class="list-group-item list-group-item-action {{ setActive('products.index') }}" href="{{ route('products.index') }}"><i class="fa-solid fa-list-ol me-2"></i>{{ __('List') }}</a>
                <a class="list-group-item list-group-item-action {{ setActive('massive-upload') }}" href="{{ route('massive-upload') }}"><i class="fa-solid fa-file-import me-2"></i>{{ __('Massive Upload') }}</a>
              </div>
            </div>
          </div>
        </div>
      @endif
      
      @if (auth()->user() && auth()->user()->hasRoles(['Admin']))
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
              {{ trans_choice('Role|Roles', 2) }}
            </button>
          </h2>
          <div id="collapseRoles" class="accordion-collapse collapse" data-bs-parent="#accordion">
            <div class="accordion-body">
              <div class="list-group ">
                <a class="list-group-item list-group-item-action {{ setActive('roles.create') }}" href="{{ route('roles.create') }}"><i class="fa-regular fa-file me-2"></i>{{ __('New') }}</a>
                <a class="list-group-item list-group-item-action {{ setActive('roles.index') }}" href="{{ route('roles.index') }}"><i class="fa-solid fa-list-ol me-2"></i>{{ __('List') }}</a>
              </div>
            </div>
          </div>
        </div>
      @endif

      @if (auth()->user() && auth()->user()->hasRoles(['Admin']))
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
              {{ trans_choice('User|Users', 2) }}
            </button>
          </h2>
          <div id="collapseUsers" class="accordion-collapse collapse" data-bs-parent="#accordion">
            <div class="accordion-body">
              <div class="list-group ">
                <a class="list-group-item list-group-item-action {{ setActive('users.create') }}" href="{{ route('users.create') }}"><i class="fa-regular fa-file me-2"></i>{{ __('New') }}</a>
                <a class="list-group-item list-group-item-action {{ setActive('users.index') }}" href="{{ route('users.index') }}"><i class="fa-solid fa-list-ol me-2"></i>{{ __('List') }}</a>
              </div>
            </div>
          </div>
        </div>
      @endif

    </div>
  </div>
</div>