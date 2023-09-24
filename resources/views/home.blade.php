@extends('main')

@section('page')
    page="home"
@endsection

@section('title')
    @if (app()->getLocale() == 'fr')
        <title>Partybooker - Les meilleures idéés d'événements</title>
        <meta name="description"
            content="Retrouvez notre sélection des meilleures idées d'événement à faire en Suisse romande. Pour les familles, les sorties entre amis ou entreprise et même les mariages. ">
        <meta name="keywords" content="événements, idées d'événements">
    @else
        <title>Partybooker - Best Event Ideas</title>
        <meta name="description"
            content="Find our selection of the best event ideas to do in French-speaking Switzerland. For families, outings with friends or business and even weddings.">
        <meta name="keywords" content="events, event ideas">
    @endif
@endsection

@section('content')
    <div class="wrapper">
        <div class="parallax__group_welcome hero-container hero">
            <div class="parallax__layer blob"></div>

            <div class="parallax__layer hero-text">
                <section>
                    <div class="welcome">
                        <div class="container my-auto">
                            <h1 class="text-white display-1 fw-bold">
                                {{ __('main.title_home_h1') }}
                            </h1>

                            <div class="accordion" id="welcomeAccordion">
                                <div class="card-group">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-text">
                                                        <div class="accordion-item">
                                                            <div class="d-flex">
                                                                <button class="accordion-button text-uppercase"
                                                                    id="controlOne" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne" aria-expanded="false"
                                                                    aria-controls="collapseOne">

                                                                    <img src="{{ asset('images/ape.svg') }}" class="d-block"
                                                                        alt="...">
                                                                </button>
                                                                <h2 class="accordion-header text-uppercase fw-bold"
                                                                    x-data="{ c: 'controlOne' }" @click="open(c)"
                                                                    id="headingOne">
                                                                    {{ __('main.info-block-title-1') }}
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#welcomeAccordion">
                                                                <div class="accordion-body body-one">
                                                                    <p>
                                                                        <span>{{ __('main.info-block-1') }}</span>

                                                                        <br>
                                                                        <hr>
                                                                        <span>{{ __('main.info-block-1-1') }}</span>
                                                                    <p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-xs-12">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-text">
                                                        <div class="accordion-item">


                                                            <div class="d-flex">

                                                                <button class="accordion-button text-uppercase"
                                                                    type="button" data-bs-toggle="collapse" id="controlTwo"
                                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    <img src="{{ asset('images/party-popper.svg') }}"
                                                                        class="d-block" alt="...">

                                                                </button>
                                                                <h2 class="accordion-header text-uppercase fw-bold"
                                                                    x-data="{ c: 'controlTwo' }" @click="open(c)"
                                                                    id="headingTwo">
                                                                    {{ __('main.info-block-title-2') }}
                                                                </h2>
                                                            </div>



                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#welcomeAccordion">
                                                                <div class="accordion-body">
                                                                    <p>
                                                                        <span>{{ __('main.info-block-2') }}</span>
                                                                        <b>{{ __('main.info-block-2-1') }}</b>
                                                                        <span>{{ __('main.info-block-2-2') }}</span>

                                                                        <br>
                                                                        <hr>
                                                                        <span>{{ __('main.info-block-2-3') }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-xs-12">

                                            <div class="card card-focus">
                                                <div class="card-body">
                                                    <div class="card-text">
                                                        <div class="accordion-item">

                                                            <div class="d-flex">

                                                                <button
                                                                    class="accordion-button accordion-button-register collapsed text-uppercase"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    id="controlThree" data-bs-target="#collapseThree"
                                                                    aria-expanded="false" aria-controls="collapseThree">
                                                                    <img src="{{ asset('images/heart.svg') }}"
                                                                        class="d-block" alt="...">
                                                                </button>

                                                                <h2 class="accordion-header text-uppercase fw-bold "
                                                                    x-data="{ c: 'controlThree' }" @click="open(c)"
                                                                    id="headingThree">
                                                                    {{ __('main.info-block-title-3') }}
                                                                </h2>
                                                            </div>

                                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#welcomeAccordion">
                                                                <div class="accordion-body">
                                                                    <p>
                                                                        <span>{{ __('main.info-block-at') }}</span>
                                                                        <b>{{ __('main.info-block-pb') }}</b>
                                                                        <span>{{ __('main.info-block-3') }}</span>

                                                                        <br>
                                                                        <hr>
                                                                        <i>{{ __('main.info-block-3-1') }}</i>
                                                                    </p>

                                                                    <a
                                                                        href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale() . '/' . __('urls.partner')) }}">
                                                                        <button type="button"
                                                                            class="btn btn-primary register">
                                                                            <i class="bi bi-arrow-right"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <div class="parallax__group_services hero-container hero">
            <div class="parallax__layer peaks"></div>

            <div class="parallax__layer hero-text-two shadow-lg">
                <section class="top-services">
                    @include('common.top-services')
                </section>
            </div>
        </div>

        <section class="categories d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                @foreach ($menuCats as $key => $category)
                    @php
                        $listKey = 'list-category-' . $key;
                        $listId = $listKey . '-list';

                    @endphp

                    <div class="scene scene--card ">
                        <div class="card shadow-lg">
                            <div class="card__face card__face--front">
                                {{ $category->lang->name }}
                            </div>
                            <div class="card__face card__face--back">
                                <ul>
                                    @foreach ($category->subCategories as $subCategory)
                                        <li>
                                            <a
                                                href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale() . '/' . __('urls.listings') . '/' . $category->lang->slug . '/' . $subCategory->lang->slug) }}">
                                                {{ $subCategory->lang->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    </div>
@endsection

<script>
    function open(i) {
        document.getElementById(i).click();
    }
</script>
