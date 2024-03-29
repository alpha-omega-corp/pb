<?php


namespace App\Services;

use App\Interfaces\IAdvertService;
use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\Partner;

class AdvertService implements IAdvertService
{
    public function canPublish(string $partnerUid): bool
    {
        return !in_array(false, $this->canPublishMatrix($partnerUid));
    }

    public function canPublishMatrix(string $partnerUid): array
    {
        $partnerInfo = Partner::where('id_partner', $partnerUid)->first();
        $advertCategory = AdvertCategory::where('id_partner', $partnerInfo->id_partner);
        $advert = Advert::where('partners_info_id', $partnerInfo->id);

        $requiredCompanyDetails = [
            $partnerInfo->en_slogan,
            $partnerInfo->en_full_descr,
            $partnerInfo->en_short_descr,
            $partnerInfo->fr_slogan,
            $partnerInfo->fr_full_descr,
            $partnerInfo->fr_short_descr,
        ];

        return [
            'choosePlan' => !in_array(strtolower($partnerInfo->plan), ['commission', 'basic']),
            'chooseThumbnail' => $partnerInfo->main_img !== null,
            'chooseCategory' => $advertCategory->exists(),
            'serviceDetails' => $advert->exists() && $advert->first()->status !== Advert::STATUS_DRAFT,
            'companyDetails' => !in_array(null, $requiredCompanyDetails),
        ];
    }
}
