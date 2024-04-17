<x-app.title
    :size="TitleSize::SMALL"
    :color="AppColor::PINK"
    :value="__('listing.categories')"
    class="listing-category-title"
/>

<div class="listing-category-content">
    <x-accordion name="listing">
        @foreach ($categories as $key => $category)
            <x-accordion.item
                accordion="listing"
                :name="$category->id"
                :show="$active && $active->id === $category->id"
            >
                <x-slot:title>
                    <h6 class="category-item-title">
                        {{ $category->locale->title }}
                    </h6>
                </x-slot:title>

                <x-slot:content>
                    <div class="listing-category-tags">
                        <x-advert.tag
                            :category="$category"
                            :tag="null"
                        />

                        @foreach ($category->tags as $tag)
                            @if($tag->locale)
                                <x-advert.tag
                                    :category="$category"
                                    :tag="$tag"
                                />
                            @endif
                        @endforeach
                    </div>
                </x-slot:content>
            </x-accordion.item>
        @endforeach
    </x-accordion>
</div>
