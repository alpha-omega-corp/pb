<x-service.list>
    <div class="position-relative">
        {{$slot}}
        <h6 class="text-uppercase">{{__('service.rates')}}</h6>

        <x-service.price :details="$details"/>
        <x-service.payment :details="$details"/>
        <x-service.budget :details="$details->budget"/>
        <x-service.deposit :details="$details->deposit"/>

        <x-service.list-item :title="__('partner.delivery_charge')">
            <p>{{$details->delivery}}</p>
        </x-service.list-item>

        <x-service.list-item :title="__('partner.additional_expenses')">
            <p>{{$details->expences}}</p>
        </x-service.list-item>
    </div>
</x-service.list>


