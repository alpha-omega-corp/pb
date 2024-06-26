<?php

namespace App\View\Composers;

use App\Http\Middleware\LocaleMiddleware;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingComposer
{
    public function __construct()
    {
    }

    public function compose(View $view): void
    {
        $settings = DB::select('select * from settings');
        $view->with('settings', $settings);
    }

    private function getFooterCategories()
    {
        $lang = LocaleMiddleware::getLocale() ? 'en' : 'fr';
        $categories = $value = Cache::get($lang . '_footer_categories');
        if (!$categories) {
            $categories = Category::with(['lang'])->whereNull('parent_id')->get();
            Cache::put($lang . '_footer_categories', $categories, 60000);
        }
        return $categories;
    }

}
