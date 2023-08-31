@extends('main')

@section('page')
page="blog"
@endsection

@section('title')
	@if (app()->getLocale() == 'en')
		<title>{{$post[0]->title_en}} | {{ __('partybooker-cp.www')}}</title>
	@else
		<title>{{$post[0]->title_fr}} | {{ __('partybooker-cp.www')}}</title>
	@endif
@endsection

@section('content')
<section class="header not-full">
        @include('common.header-nav')
        <div class="cover abs">
            <img src="/images/home-header-bg.jpg" class="bg abs" alt="Partybooker sélectionne les meilleures idées d'événements, de lieux et de services de Suisse romande.">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
					@if (app()->getLocale() == 'en')
						<h1 class="m-145">{{$post[0]->title_en}}</h1>
					@else
						<h1 class="m-145">{{$post[0]->title_fr}}</h1>
					@endif
                </div>
            </div>
        </div>
        @include('common.social')
    </section>

    <section class="post-section">

        <div class="container">
            <div class="post-author-wrapper">
                <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/blog/')}}" class="btn-back" style="margin-right: 27px;"> Back</a>
                <div class="post-author-date">
                    By <span>{{($post[0]->author)?$post[0]->author:'Admin'}}</span>, {{ date((app()->getLocale() == 'en')?'m/d/Y':'d/m/Y',strtotime($post[0]->created))}}
                </div>
            </div>
            <div class="row justify-content-center">
                
                <div class="col-md-11 col-lg-10">
                    <?php $locale = (app()->getLocale()=='en')?'main_img_alt':'main_img_alt_fr';?>
                    <img class="right-img" src="{{ asset('storage/posts/'.$post[0]->main_img) }}" alt="<?php echo $post[0]->$locale?>">
					@if (app()->getLocale() == 'en')
						{!!$post[0]->article_en!!}
					@else
						{!!$post[0]->article_fr!!}
					@endif
					<!--@if ($post[0]->sec_img) 
						<img class="left-img" src="{{ asset('storage/posts/'.$post[0]->sec_img) }}" alt="">
					@endif-->
                <div id="share" class="post-sharing">
                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><i class="icon-facebook"></i></a>
                    <a class="twitter" href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="icon-twitter"></i></a>
                    <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="icon-linkedin"></i></a>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection