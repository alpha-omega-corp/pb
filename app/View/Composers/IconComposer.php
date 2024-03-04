<?php

namespace App\View\Composers;

use Illuminate\View\View;

class IconComposer
{
    public function compose(View $view): void
    {
        $view->with('editIcon', 'heroicon-o-pencil-square');
        $view->with('deleteIcon', 'heroicon-o-trash');
        $view->with('galleryIcon', 'heroicon-o-photo');
        $view->with('keyIcon', 'heroicon-o-key');
        $view->with('navIcon', 'heroicon-s-bars-3-bottom-left');
        $view->with('linkIcon', 'heroicon-o-globe-alt');
        $view->with('searchIcon', 'heroicon-o-magnifying-glass');
        $view->with('infoIcon', 'heroicon-o-information-circle');
        $view->with('titleIcon', 'heroicon-o-ticket');
        $view->with('emailIcon', 'heroicon-o-envelope-open');
        $view->with('phoneIcon', 'heroicon-o-phone');
        $view->with('companyIcon', 'heroicon-o-home-modern');
        $view->with('pinIcon', 'heroicon-o-map-pin');
        $view->with('eyeIcon', 'heroicon-o-eye');
        $view->with('boxIcon', 'heroicon-o-archive-box');
    }
}
