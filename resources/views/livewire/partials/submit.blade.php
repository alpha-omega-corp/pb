<div class="flex fixed bottom-0 left-0 w-full">
    <button wire:click.prevent="submit" @click="$dispatch('notify', { content: 'Updated', type: 'success' })"
            class="inline-flex w-full text-center bg-purple-600 text-white px-5 py-2.5">
        {{__('partner.save')}}
    </button>
    <a
        href="{{route(__('route.profile'), [
            'company' => $advert->company
        ])}}"
        class="bg-info-500 p-2 text-white flex-none w-40 text-center">
        Dashboard
    </a>
</div>

