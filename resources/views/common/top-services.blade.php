@if (count($top))
    <div class="d-flex justify-content-center position-relative title">

        <div class="flex-column">

            <div class="d-flex ">
                <div class="title-img mx-auto">
                    <img src="/images/logoPB.png"
                        alt="Partybooker sélectionne les meilleures idées d'événements, de lieux et de services de Suisse romande.">
                </div>
            </div>

            <h2 class="display-1 fw-bold">
                {{ __('main.top_services') }}
            </h2>


        </div>
    </div>

    <div x-ref="glide" class="glide block relative px-12">
        <div class="position-relative">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <!-- Carousel Item -->

                    @foreach ($top as $key => $service)
                        <li class="glide__slide">
                            <div class="d-flex flex-column align-items-center">
                                <div class="card">

                                    <div class="card-img">
                                        <img src="/images/logoPB.png"width="50"
                                            class="position-absolute top-0 card-logo"
                                            alt="Partybooker sélectionne les meilleures idées d'événements, de lieux et de services de Suisse romande.">

                                        @if ($service->main_img)
                                            <img src="{{ asset('storage/images/thumbnails/' . $service->main_img) }}"
                                                alt="{{ $service->main_img }}" class="card-img-top">
                                        @else
                                            <img src="//via.placeholder.com/700x1000/fc0?text=6" width="500"
                                                height="500" class="card-img-top" alt="...">
                                        @endif

                                    </div>


                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase text-truncate fw-bold">
                                            @if (app()->getLocale() == 'en')
                                                {{ $service->en_company_name }}
                                            @else
                                                {{ $service->fr_company_name }}
                                            @endif
                                        </h5>

                                        <p class="card-text">
                                            @if (app()->getLocale() == 'en')
                                                {!! $service->en_short_descr !!}
                                            @else
                                                {!! $service->fr_short_descr !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Controls -->
            <div class="glide__arrows pointer-events-none" data-glide-el="controls">
                <!-- Previous Button -->
                <button class="glide__arrow glide__arrow--left pointer-events-auto disabled:opacity-50 btn btn-primary"
                    data-glide-dir="<">
                    <span aria-hidden="true">
                        <img class="previous-arrow" src="{{ asset('images/right-arrow.svg') }}" />
                    </span>
                    <span class="sr-only">PREVIOUS</span>
                </button>

                <!-- Next Button -->
                <button class="glide__arrow glide__arrow--right pointer-events-auto disabled:opacity-50 btn btn-primary"
                    data-glide-dir=">">
                    <span class="sr-only">NEXT</span>
                    <span aria-hidden="true">
                        <img class="next-arrow" src="{{ asset('images/right-arrow.svg') }}" />
                    </span>
                </button>
            </div>
        </div>

        <!-- Bullets -->
        <div class="d-flex justify-content-center">
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @foreach ($top as $key => $service)
                    <button class="glide__bullet btn btn-opaque  transition-colors"
                        data-glide-dir="{{ '=' . $key }}">
                        <p class="text-uppercase">
                            @if (app()->getLocale() == 'en')
                                {{ $service->en_company_name }}
                            @else
                                {{ $service->fr_company_name }}
                            @endif
                        </p>
                    </button>
                @endforeach

            </div>
        </div>
    </div>


@endif
