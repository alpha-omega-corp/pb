@php use App\Models\Plan; @endphp
<x-card :title="__('dashboard.plan')">
    @if($partner->payment)
        <x-plans.badge :plan="$partner->payment->plan"/>
    @endif

    <x-modal
        id="planModal"
        name="plan"
        :type="ModalType::UPDATE"
        :size="ModalSize::MD"
        :route="route('partner.plan', ['partner' => $partner])"
    >
        <x-forms.radio
            :colorize="true"
            :items="$plans->map(fn(Plan $plan) => $plan->name)"
            id="updatePlan"
            name="plan"
        />
    </x-modal>
</x-card>



