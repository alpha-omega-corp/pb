@props([
    'partner',
])

@php($advert = $partner->company->adverts()->main()->first())

<a class="top-card" href="{{route('guest.listing.advert', [
    'company' => $partner->company,
    'advert' => $advert
])}}">
    <img src="{{$advert->images()->thumbnail()->first()->path}}"
         alt="{{$partner->company->name}}"/>

    <h6 class="top-card-title">{{$partner->company->name}}</h6>

    <div class="top-card-content">
        <span>{{$partner->company->address->address}}</span>
        <span>{{$partner->company->loc}}</span>
    </div>
</a>
