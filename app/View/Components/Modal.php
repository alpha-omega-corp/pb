<?php

namespace App\View\Components;

use App\Enums\ModalSize;
use App\Enums\ModalType;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $color;

    public function __construct(
        public string    $id,
        public string    $name,

        public ModalType $type,
        public ModalSize $size,
        public string    $route,
        public bool      $multipart = false,
        public bool      $absolute = false,
    )
    {
        $this->color = match ($this->type) {
            ModalType::CREATE => 'orange',
            ModalType::DELETE => 'danger',
            ModalType::UPDATE => 'info',
            default => 'secondary',
        };
    }

    public function render(): View
    {
        return view('components.modal');
    }
}
