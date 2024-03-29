<?php

namespace App\Enums;

use App\Models\ServiceBusiness;
use App\Models\ServiceCaterer;
use App\Models\ServiceEntertainment;
use App\Models\ServiceEquipment;
use App\Models\ServiceEvent;
use App\Models\ServiceWine;

enum CategoryType: string
{
    case EVENT = ServiceEvent::class;
    case BUSINESS = ServiceBusiness::class;
    case ENTERTAINMENT = ServiceEntertainment::class;
    case EQUIPMENT = ServiceEquipment::class;
    case CATERER = ServiceCaterer::class;
    case WINE = ServiceWine::class;
}
