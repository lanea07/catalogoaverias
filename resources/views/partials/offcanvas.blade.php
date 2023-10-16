<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <div class="accordion " id="accordionExample">
      
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button bg-danger-subtle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            {{ __('Products') }}
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('products.create') }}"><i class="fa-regular fa-file me-2"></i>{{ __('New') }}</a>
              </li>
              <li class="list-group-item">
                <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('products.index') }}"><i class="fa-solid fa-list-ol me-2"></i>{{ __('List') }}</a>
              </li>
              <li class="list-group-item">
                <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('massive-upload') }}"><i class="fa-solid fa-file-import me-2"></i>{{ __('Massive Upload') }}</a>
              </li>
            </ul>
            
          </div>
        </div>
      </div>

    </div>

  </div>
</div>