<x-tab
    :use-icons="true"
    :pages="[
         'heroicon-o-information-circle',
         'heroicon-o-clock',
         'heroicon-o-currency-dollar',
         'heroicon-o-video-camera'
     ]"
    :tooltips="[
        __('advert.information'),
        __('advert.schedule'),
        __('advert.price'),
        __('advert.video')
    ]">
    <x-tab.item>
        @include('app.listing.partials.service-detail', ['detail' => $advert->service->detail])
    </x-tab.item>

    <x-tab.item>
        @include('app.listing.partials.service-schedule', ['schedule' => $advert->service->schedule])
    </x-tab.item>

    <x-tab.item>
        @include('app.listing.partials.service-price', ['price' => $advert->service->price])
    </x-tab.item>
</x-tab>
<hr>