<section class="home-category">
    
    <div class="animation-side">
        <div class="home-category-container">
            @foreach ($categories as $category)

                @php
                    $icon = match ($category->service) {
                        CategoryType::EVENT->value => 'heroicon-s-map-pin',
                        CategoryType::CATERER->value => 'heroicon-s-cake',
                        CategoryType::WINE->value => 'heroicon-s-trophy',
                        CategoryType::EQUIPMENT->value => 'heroicon-s-shopping-cart',
                        CategoryType::ENTERTAINMENT->value => 'heroicon-s-musical-note',
                    };
                @endphp

                <a href="{{route(__('route.listing'), [
                'category' => $category->locale->slug,
            ])}}">

                    <div class="home-category-card animation shadow-lg">
                        <div class="category-card-icon">
                            @svg($icon)
                        </div>
                        <div class="category-card-header">
                            <h6 class="category-card-title">{{$category->locale->title}}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('app.home.partials.home.top', [
            'showTitle' => true,
        ])
</section>
