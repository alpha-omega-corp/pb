<x-modal.open
    :iterator="$item->id"
    :name="ModalName::APP_CONTENT"
    :type="ModalType::UPDATE"
    :icon="$editIcon"
    :fit="true"
    :radius="false"
    :background="true"
/>

<x-modal.index
    :iterator="$item->id"
    :name="ModalName::APP_CONTENT"
    :type="ModalType::UPDATE"
    :size="ModalSize::MD"
    :hidden="true"
    :route="route('admin.service.update', ['content' => $item])"
>

    <x-tab.locale>
        <x-slot:french>
            @php($locale = $item->ofLang(Language::FR)->first()->locale)

            <x-forms.input
                name="title_fr"
                label="Title"
                :value="$locale->title"
            >
                @svg($titleIcon)
            </x-forms.input>

            <x-forms.editor
                name="content_fr"
                label="Content"
                :value="$locale->content"/>
        </x-slot:french>

        <x-slot:english>
            @php($locale = $item->ofLang(Language::EN)->first()->locale)

            <x-forms.input
                name="title_en"
                label="Title"
                :value="$locale->title"
            >
                @svg($titleIcon)
            </x-forms.input>

            <x-forms.editor
                name="content_en"
                label="Content"
                :value="$locale->content"/>

        </x-slot:english>
    </x-tab.locale>
</x-modal.index>
