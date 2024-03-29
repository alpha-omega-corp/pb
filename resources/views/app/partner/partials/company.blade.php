<x-card :title="__('dashboard.company')">

    <x-modal
        id="companyModal"
        name="company"
        :type="ModalType::UPDATE"
        :size="ModalSize::MD"
        :route="route('partner.company', ['partner' => $partner])"
    >

        <x-forms.list>
            <x-forms.input
                name="name"
                :label="__('company.name')"
                :value="$partner->company->name">
                @svg('heroicon-o-guest-modern')
            </x-forms.input>

            <x-forms.input
                name="phone"
                :label="__('company.phone')"
                :value="$partner->company->phone">
                @svg('heroicon-o-phone')
            </x-forms.input>

            <x-forms.input
                name="phone"
                :label="__('company.email')"
                :value="$partner->company->email">
                @svg('heroicon-o-envelope-open')
            </x-forms.input>

            <x-forms.input
                name="phone"
                :label="__('company.slug')"
                :value="$partner->company->slug">
                @svg('heroicon-o-globe-alt')
            </x-forms.input>
        </x-forms.list>
    </x-modal>
</x-card>



