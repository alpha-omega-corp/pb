@php use App\Models\Advert; @endphp
@php use App\Http\Middleware\LocaleMiddleware; @endphp

@extends('web.main')
@section('page')
    page="cp"
@endsection

@section('title')
    <title>CP | {{ __('partybooker-cp.www')}}</title>
@endsection

@section('content')
    <div class="tab" tab="main" style="display: block">

        @if (Auth::user()->type == 'admin')
            <x-dashboard.card title="Administration">
                @include('web.partner.partials.dashboard.discount')
            </x-dashboard.card>
        @endif

        <x-dashboard.card :title="__('partner.status')">
            @include('web.partner.partials.dashboard.payment-status')
        </x-dashboard.card>

        <x-dashboard.card :title="__('partner.plan_up')">
            @include('web.partner.partials.dashboard.active-plan')
        </x-dashboard.card>

        <x-dashboard.card :title="__('partner.statistics_data')">
            @include('web.partner.partials.dashboard.statistics')
        </x-dashboard.card>

        <x-dashboard.card :title="__('partner.rating')">
            @include('web.partner.partials.dashboard.evaluation')
        </x-dashboard.card>

        <div class="card">
            @if ($user->partnerInfo->discount)
                <ul>
                    <li><span>{{ __('partybooker-cp.discount') }}:</span>
                        {{ $user->partnerInfo->discount }} %
                    </li>
                </ul>
            @endif
        </div>


        @if ($user->partnerInfo->vipPlan)
            <ul>
                <li><span>{{ __('partner.plan_up') }}:</span>
                    VIP
                </li>
                <li><span>{{ __('partner.payment') }}: </span>
                    @if (
                        !$user->partnerInfo->vipPlan->is_payed ||
                            ($user->partnerInfo->vipPlan->end_date && date('Y-m-d') > $user->partnerInfo->vipPlan->end_date))
                        N/A
                    @else
                        {{ __('partner.paid_on') }} {{ $user->partnerInfo->vipPlan->start_date }}
                    @endif
                </li>
                <li><span>{{ __('partner.expire') }}: </span>
                    {{ $user->partnerInfo->vipPlan->end_date ?? 'N/A' }}
                </li>

                @if (
                    !$user->partnerInfo->vipPlan->is_payed ||
                        ($user->partnerInfo->vipPlan->end_date && date('Y-m-d') > $user->partnerInfo->vipPlan->end_date))
                    <li class="topay"><a href="#plan" class="button">{{ __('partner.make_payment') }}</a></li>
                @endif
            </ul>
        @endif
    </div>

@endsection
