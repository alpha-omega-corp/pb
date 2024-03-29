<?php

namespace App\Services;

use App\Interfaces\IRequestService;
use App\Mails\ServiceRequestCaterer;
use App\Mails\ServiceRequestGeneral;
use App\Models\DirectMessage;
use App\Models\Partner;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RequestService implements IRequestService
{
    public function sendRequest(Partner $partner, array $formData, string $type): void
    {
        $directMessage = new DirectMessage();
        $directMessage->partners_info_id = $partner->id;
        $directMessage->partners_name = $partner->en_company_name;
        $directMessage->type = $type;
        $directMessage->client_name = $formData['name'];
        $directMessage->client_email = $formData['email'];
        $directMessage->client_phone = $formData['phone'];
        $directMessage->message = $formData['message'];
        $directMessage->data = json_encode($formData);
        $directMessage->save();

        $this->updateCount($partner->id_partner);
        $user = User::where('id_partner', $partner->id_partner)->first();

        switch ($type) {
            case DirectMessage::TYPE_GENERAL:
                Mail::to($user->email)
                    ->cc(config('mail.from.address'))
                    ->send(new ServiceRequestGeneral($partner, $formData));
                Mail::to(config('mail.from.address'))->send(new ServiceRequestGeneral($partner, $formData));
                Mail::to($formData['email'])->send(new ServiceRequestGeneral($partner, $formData));
                break;
            case DirectMessage::TYPE_CATERER:
                Mail::to($user->email)
                    ->cc(config('mail.from.address'))
                    ->send(new ServiceRequestCaterer($partner, $formData));
                Mail::to(config('mail.from.address'))->send(new ServiceRequestCaterer($partner, $formData));
                Mail::to($formData['email'])->send(new ServiceRequestCaterer($partner, $formData));
                break;
        }
    }

    public function updateCount(string $partnerId): void
    {
        $statistic = Statistic::where('id_partner', $partnerId)->first();
        if (!$statistic) {
            $statistic = new Statistic();
            $statistic->id_partner = $partnerId;
        } else {
            $statistic->increment('direct');
        }

        $statistic->save();
    }
}
