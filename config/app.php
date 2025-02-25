<?php

use App\Enums\AppAboutType;
use App\Enums\AppColor;
use App\Enums\AppContentType;
use App\Enums\CategoryType;
use App\Enums\DateType;
use App\Enums\EnvironmentType;
use App\Enums\FormType;
use App\Enums\ModalName;
use App\Enums\ModalSize;
use App\Enums\ModalType;
use App\Enums\NotificationType;
use Buzz\LaravelGoogleCaptcha\CaptchaFacade;
use Buzz\LaravelGoogleCaptcha\CaptchaServiceProvider;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageServiceProvider;
use Laravel\Socialite\SocialiteServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'fr',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeders. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded AdvertService Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */


    'providers' => ServiceProvider::defaultProviders()->merge([
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\MetaTagsServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\TelescopeServiceProvider::class,
        SocialiteServiceProvider::class,
        CaptchaServiceProvider::class,
    ])->toArray(),


    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        'Vite' => Vite::class,
        'Socialite' => Laravel\Socialite\Facades\Socialite::class,
        'DateType' => DateType::class,
        'CategoryType' => CategoryType::class,
        'NetworkType' => App\Enums\NetworkType::class,
        'EnvironmentType' => EnvironmentType::class,
        'ModalPosition' => App\Enums\ModalPosition::class,
        'PlanType' => App\Enums\PlanType::class,
        'PartnerFilter' => App\Enums\PartnerFilter::class,
        'PartnerSort' => App\Enums\PartnerSort::class,
        'Language' => App\Enums\Language::class,
        'ModalType' => ModalType::class,
        'ModalSize' => ModalSize::class,
        'ModalName' => ModalName::class,
        'NotificationType' => NotificationType::class,
        'Breadcrumbs' => Breadcrumbs::class,
        'AppContentType' => AppContentType::class,
        'Captcha' => CaptchaFacade::class,
        'FormType' => FormType::class,
        'TitleSize' => App\Enums\TitleSize::class,
        'AppColor' => AppColor::class,
        'AppAboutType' => AppAboutType::class
    ])->toArray(),

    'tinymce' => env('TINYMCE_API_KEY'),

];
