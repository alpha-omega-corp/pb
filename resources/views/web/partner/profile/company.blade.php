@if (!is_null($user->partnerInfo->logo) || strlen($user->partnerInfo->logo) > 0)
    <x-dashboard.card-item title="Logo">
        <img src="{{ asset('/storage/logos/'.$user->partnerInfo->logo)}}" alt="logo" width="100" class="mt-2">
    </x-dashboard.card-item>
@endif

<x-dashboard.card-item :title="__('become_partner.company_name')">
    @if (app()->getLocale() == 'en')
        {{$user->partnerInfo->en_company_name}}
    @else
        {{$user->partnerInfo->fr_company_name}}
    @endif
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('partner.link')">
    {{$user->partnerInfo->slug}}
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.location')">
    {{__('cantons.'.strtolower($user->partnerInfo->location_code).'_loc')}}
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.phone')">
    {{$user->partnerInfo->company_phone}}
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.fax')">
    {{$user->partnerInfo->fax}}
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.slogan')">
    @if (app()->getLocale() == 'en')
        {{$user->partnerInfo->en_slogan}}
    @else
        {{$user->partnerInfo->fr_slogan}}
    @endif
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.short_descr')">
    <div class="description-preview">
        <h6>
            {{__('main.preview')}}
        </h6>
        @if (app()->getLocale() == 'en')
            {!!$user->partnerInfo->en_short_descr!!}
        @else
            {!!$user->partnerInfo->fr_short_descr!!}
        @endif
    </div>
</x-dashboard.card-item>

<x-dashboard.card-item :title="__('become_partner.full_descr')">
    <div class="description-preview">
        <h6>
            {{__('main.preview')}}
        </h6>
        @if (app()->getLocale() == 'en')
            {!!$user->partnerInfo->en_full_descr!!}
        @else
            {!!$user->partnerInfo->fr_full_descr!!}
        @endif

    </div>
</x-dashboard.card-item>


<x-dashboard.card-item :title="__('become_partner.languages')">
    {{preg_replace('/[^a-zA-Z]/', ' ', $user->partnerInfo->language)}} {{$user->partnerInfo->other_lang}}
</x-dashboard.card-item>

@include('web.partner.popup.edit-company')




