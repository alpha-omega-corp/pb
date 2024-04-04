<?php

namespace App\View\Components\Advert;

use App\Models\AdvertService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormGroup extends Component
{
    public string $accordion;

    public function __construct(
        public string        $name,
        public AdvertService $service,
        public string        $title,
        public array         $types,
    )
    {
        $this->accordion = "formAccordion_$name-$service->id";
    }

    public function render(): View|Closure|string
    {
        return view('components.advert.form-group');
    }
}
