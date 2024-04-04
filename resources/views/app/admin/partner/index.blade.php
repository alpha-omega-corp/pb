@php use App\Models\Company; @endphp
@extends('main')

@section('title')
    <title>Partners | {{ __('partybooker-cp.www')}}</title>
@endsection


@section('content')
    <x-card.dashboard :title="__('admin.partners')">
        <div class="admin-listing">
            <!-- Top Services -->
            <x-dashboard.accordion title="Top Services" name="partner-tops">
                @include('app.admin.partner.partials.tops')
            </x-dashboard.accordion>

            <hr>

            <div x-data="partners">
                <x-forms.input
                    name="input"
                    model="input"
                    label="Search"
                    type="text">
                    @svg('heroicon-o-magnifying-glass')
                </x-forms.input>
                <hr>

                <div class="d-flex">
                    <div class="admin-listing-filters">

                        <!-- Create Partner -->
                        @include('app.admin.partner.partials.create')

                        <x-dashboard.accordion title="Plan" name="plan" :open="true">
                            <x-admin.filter-group
                                name="plan"
                                :model="PartnerFilter::PLAN"
                                :filters="$planFilters"/>
                        </x-dashboard.accordion>

                        <x-dashboard.accordion title="Category" name="category">
                            <x-admin.filter-group
                                name="category"
                                :model="PartnerFilter::CATEGORY"
                                :filters="$categoryFilters"/>
                        </x-dashboard.accordion>

                        <hr>
                        <x-dashboard.accordion title="Sort" name="filter">
                            <x-admin.sort
                                name="sorts"
                                :sorts="$partnerSorts"/>
                        </x-dashboard.accordion>
                    </div>

                    <div class="admin-listing-content">
                        <template x-for="item in filteredPartners()">
                            <div class="admin-listing-item shadow-lg" x-bind:class="'border-' + item.plan">
                                <h5 x-text="item.company" class="fw-bold"></h5>

                                <p x-text="item.id"></p>
                                <div class="d-flex gap-4">
                                    <small>Created <span x-text="item.created"></span></small>
                                </div>

                                <hr>

                                <div class="admin-listing-action">
                                    <a :href="item.url" class="btn btn-orange text-white">
                                        <span>View @svg('heroicon-o-arrow-up-right')</span>
                                    </a>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <x-admin.listing-info title="User" icon="heroicon-o-user-circle">
                                        <p x-text="item.name"></p>
                                        <p x-text="item.email"></p>
                                    </x-admin.listing-info>

                                    <x-admin.listing-info title="Billing" icon="heroicon-o-currency-dollar">
                                        <p x-text="item.paymentType"></p>
                                        <p x-text="item.paymentStart"></p>
                                        <p x-text="item.paymentEnd"></p>
                                    </x-admin.listing-info>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <x-admin.listing-info title="Company" icon="heroicon-o-home-modern">
                                        <p x-text="item.company"></p>
                                        <p x-text="item.address"></p>
                                    </x-admin.listing-info>

                                    <x-admin.listing-info title="Adverts" icon="heroicon-o-archive-box">
                                        <ul>
                                            <template x-for="category in item.categories">
                                                <li>
                                                    <p x-text="category"></p>
                                                </li>
                                            </template>
                                        </ul>
                                    </x-admin.listing-info>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </x-card.dashboard>
@endsection

