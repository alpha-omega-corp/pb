<?php


namespace App\Http\Controllers;


use App\Interfaces\ICategoryService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class LocaleController extends Controller
{
    private ICategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function setLocale(string $lang)
    {
        App::setLocale($lang);
        $referer = Redirect::back()->getTargetUrl();
        $segments = explode('/', $referer);

        $route = match (true) {
            Str::contains($referer, ['partenaires', 'partners']) => route(__('route.listing')),
            Str::contains($referer, ['partenaire', 'partner']) => route(__('route.advert'), [
                'company' => $segments[count($segments) - 2],
                'category' => $this->categoryService->getFromSlug($segments[count($segments) - 1])->locale->slug
            ]),

            Str::contains($referer, ['a-propos', 'about']) => route(__('route.about')),
            Str::contains($referer, ['partenariat', 'partnership']) => route(__('route.partnership')),
            Str::contains($referer, ['blog']) => route(__('route.blog')),
            Str::contains($referer, ['faq']) => route(__('route.faq')),
            Str::contains($referer, ['contenu', 'content']) => route(__('route.admin-content')),
            Str::contains($referer, ['categories']) => route(__('route.admin-categories')),
            Str::contains($referer, ['formules', 'plans']) => route(__('route.admin-plans')),
            Str::contains($referer, ['formulaires', 'forms']) => route(__('route.admin-forms')),
            Str::contains($referer, ['messages']) => route(__('route.admin-messages')),

            Str::contains($referer, ['profile']) => route(__('route.profile'), [
                'company' => $segments[count($segments) - 1]
            ]),
            default => route(__('route.home')),
        };

        return redirect($route)->with('success', __('notification.locale'));
    }
}
