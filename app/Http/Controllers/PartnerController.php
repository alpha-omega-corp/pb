<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Enums\PlanType;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Company;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PartnerController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard(Partner $partner): View
    {
        return view('app.partner.dashboard', [
            'partner' => $partner,
            'plans' => Plan::all(),
            'statistics' => $partner->company->statistic
        ]);
    }

    public function store(StorePartnerRequest $request)
    {
        $data = $request->validated();


        $company = Company::create([
            'name' => $data['company'],
            'languages' => $data['language'],
            'slug' => $data['company']
        ]);

        $payment = Payment::create([
            'type' => PaymentType::DEFAULT,
            'plan_id' => Plan::ofType(PlanType::from($data['plan']))->first()->id,
            'accepted_at' => now(),
            'expires_at' => now()->addYear(),
        ]);

        $partner = Partner::create([
            'company_id' => $company->id,
            'payment_id' => $payment->id
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'partner_id' => $partner->id
        ]);

        return redirect()->route('partner.dashboard', $partner);
    }

    public function plan(Partner $partner, UpdatePlanRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $plan = Plan::where('name', $validated['plan'])->first();

        $partner->payment->update([
            'plan_id' => $plan->id
        ]);

        return back()->with('success', 'Plan updated successfully');
    }

}
