<x-app-layout>

    <div class="container pt-5 ">
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($categories as $category)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('search', [ 'q' => $category['categoria']]) }}">
                        <div class="card" style="width: 18rem;">
                            {{-- <img src="https://placehold.co/300x180" class="card-img-top" alt="..."> --}}
                            <div class="card-body bg-body-tertiary">
                                <h5 class="card-title">{{ $category['categoria'] }}</h5>
                                
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>