<x-modal.index
    :name="ModalName::APP_CONTACT"
    :type="ModalType::UPDATE"
    :size="ModalSize::MD"
    :hidden="true"
    :route="route('admin.contacts')"
>
    <x-slot:body>
        <x-forms.input
            name="address"
            :value="$contacts->address"
        >
            @svg($pinIcon)
        </x-forms.input>
        <x-forms.input
            name="email"
            :value="$contacts->email"
        >
            @svg($emailIcon)
        </x-forms.input>
        <x-forms.input
            name="phone"
            :value="$contacts->phone"
        >
            @svg($phoneIcon)
        </x-forms.input>
        <x-forms.input
            name="instagram"
            :value="$contacts->instagram"
            :background="false"
        >
            <img src="{{Vite::social('instagram')}}" alt="instagram">
        </x-forms.input>
        <x-forms.input
            name="facebook"
            :value="$contacts->facebook"
            :background="false"
        >
            <img src="{{Vite::social('facebook')}}" alt="facebook">
        </x-forms.input>
        <x-forms.input
            name="x"
            :value="$contacts->x"
            :background="false"
        >
            <img src="{{Vite::social('twitter')}}" alt="twitter">
        </x-forms.input>
        <x-forms.input
            name="linkedin"
            :value="$contacts->linkedin"
            :background="false"
        >
            <img src="{{Vite::social('linkedin')}}" alt="linkedin">
        </x-forms.input>
    </x-slot:body>
</x-modal.index>
