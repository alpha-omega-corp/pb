@extends('main')

@section('content')
    <x-card.panel
        :title="__('nav.partnership')"
        class="home-partnership"
    >
        <x-app.section>
            @include('app.home.partials.partnership.benefits')
        </x-app.section>

        <x-app.title
            :size="TitleSize::MEDIUM"
            :color="AppColor::BLUE"
            :value="__('home.plans')"
        />

        <x-app.section>
            @include('app.home.partials.partnership.plans')
            <div class="d-flex justify-content-center m-4">
                <x-modal.open
                    :name="ModalName::GUEST_PARTNERSHIP"
                    :custom-color="AppColor::PINK"
                    :singleton="true"
                    :text="strtoupper(__('form.join_title'))"
                />
            </div>
        </x-app.section>

        <x-app.title
            :size="TitleSize::MEDIUM"
            :color="AppColor::BLUE"
            :value="__('home.usp')"
        />

        <x-app.section>
            @include('app.home.partials.partnership.usp')
        </x-app.section>

        <x-app.title
            :size="TitleSize::MEDIUM"
            :color="AppColor::BLUE"
            :value="__('home.help_title')"
            class="partnership-help-title"
        />


        <x-app.section>
            <div class="container">

                <p class="app-help-text">{{ucfirst(__('home.help'))}}</p>

                <div class="d-flex justify-content-center">
                    <a id="contact">
                        <x-modal.open
                            :name="ModalName::APP_HELP"
                            :type="ModalType::CREATE"
                            :custom-color="AppColor::PINK"
                            :singleton="true"
                            :text="__('form.question')"
                            class="app-help-button"/>
                    </a>
                </div>
            </div>

        </x-app.section>
    </x-card.panel>

    @include('app.home.partials.partnership.join')
    @include('app.home.partials.partnership.help')

@endsection



