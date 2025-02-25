<div class="app-listing-filters">
    <div class="sticky-listing-search listing-search-container">

        <div x-data="listingFilters(['search', 'category', 'location'])" class="mobile-listing-filters shadow-lg">

            <div class="mobile-listing-filters__buttons">

                <template x-for="filter in getFilters()">
                    <div @click="open(filter)"
                         class="mobile-listing-filters__buttons--item">

                        <button type="button"
                                class="btn btn-outline-info position-relative"
                                :class="isOpen(filter.name) ? 'btn-info' : 'btn-outline-info'">

                            <span x-text="filter.name"></span>

                        </button>
                    </div>
                </template>
            </div>

            <div x-show="selected()">
                <div @click="close()" class="mobile-listing-filters__header">

                    <div class="mobile-listing-filters__header--title">
                        <span x-text="$store.listingFilters.selected ? $store.listingFilters.selected.name : ''"></span>
                    </div>

                    <div class="mobile-listing-filters__header--close">
                        @svg($xIcon)
                    </div>
                </div>

                <div :class="selected()
                    ? 'mobile-listing-filters__content mobile-listing-filters__content-bg'
                    : 'mobile-listing-filters__content'"
                >
                    <div class="mobile-listing-filters__active">
                        <div x-show="isOpen('search')">
                            @include('app.listing.partials.filters.search')
                        </div>
                        <div x-show="isOpen('category')">
                            @include('app.listing.partials.filters.category')
                        </div>
                        <div x-show="isOpen('location')">
                            @include('app.listing.partials.filters.state')
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
