<x-modal.index
    :name="ModalName::PARTNER_ADVERT_REQUEST"
    :type="ModalType::CREATE"
    :size="ModalSize::MD"
    :singleton="true"
    :action="false"
    :validation="true"
    :hidden="true"
    :title="__('advert.request')"
    :route="route('guest.company.request', ['advert' => $advert])"
>
    <x-slot:body>
        <x-forms.input
            name="email"
            :label="__('form.email')">
            @svg('heroicon-o-envelope')
        </x-forms.input>

        <x-forms.input
            name="phone"
            :label="__('form.phone')">
            @svg('heroicon-m-device-phone-mobile')
        </x-forms.input>

        <div class="d-flex gap-2">
            <x-forms.input
                name="guests"
                type="number"
                :label="__('form.participants')">
                @svg('heroicon-o-user-group')
            </x-forms.input>

            <x-forms.input
                name="date"
                type="date"
                :label="__('form.date')">
                @svg('heroicon-o-calendar-days')
            </x-forms.input>
        </div>

        <x-forms.textarea
            name="message"
            :label="__('form.message')"
        />
    </x-slot:body>
</x-modal.index>
