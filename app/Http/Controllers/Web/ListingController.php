<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\Category;
use App\Models\CategoryLocale;
use App\Models\EventType;
use App\Models\PartnersInfo;
use App\Models\PartnerVipPlan;
use App\Models\ServiceImage;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Torann\LaravelMetaTags\Facades\MetaTag as FacadesMetaTag;

class ListingController extends Controller
{

    protected $categories;

    protected $eventTypes = [];

    public function __construct()
    {
        $categories = Cache::get(App()->getLocale() . '_filter_categories');
        if ($categories) {
            $this->categories = $categories;
        } else {
            $this->categories = Category::with(['subcategories', 'lang', 'subcategories.lang'])->whereNull('parent_id')->get();
            Cache::put(App()->getLocale() . '_filter_categories', $this->categories, 60000);
        }

        $event = Cache::get(app()->getLocale() . '_filter_events');
        if ($event) {
            $this->eventTypes = $event;
        } else {
            $event = EventType::all();
            foreach ($event as $item) {
                $this->eventTypes[] = [
                    'slug' => $item->{app()->getLocale() . '_slug'},
                    'name' => $item->{app()->getLocale() . '_name'}
                ];
            }
            Cache::put(app()->getLocale() . '_filter_events', $this->eventTypes, 60000);
        }
    }

    public function index(Request $request)
    {
        $query_params = [];
        $query = PartnersInfo::where('public', 1)->where('payment_status', 1);

        //		if ($request->has('min_price') && $request->has('max_price')) {
        //			$query_params['min_price'] = $request->get('min_price');
        //			$query_params['max_price'] = $request->get('max_price');
        //			$query = $query->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        //		}

        if ($request->has('budget') && ((int)$request->get('budget') != 0 && $request->get('budget') != null && $request->get('budget') != 'null')) {
            $query->where('budget', $request->get('budget'));
        }


        if ($request->has('order_by') && in_array($request->get('order_by'), ['name', 'price'])) {
            $query_params['order_by'] = $request->get('order_by');
            $query_params['order_type'] = $request->get('order_type') ?? 'asc';

            if ($query_params['order_by'] == 'name') {
                $query = $query->orderBy(app()->getLocale() . '_company_name', $query_params['order_type']);
            }

            if ($query_params['order_by'] == 'price') {
                $query = $query->orderBy('price', $query_params['order_type']);
            }
        }

        if ($request->has('event_types')) {
            $query_params['event_types'] = $request->get('event_types');
            $query->whereHas('currentPlan', function ($q) {
                $q->where('name', 'Exclusif');
            })->whereHas('eventTypes', function ($q) use ($request) {
                $q->whereIn('en_slug', $request->get('event_types'))->orWhereIn('fr_slug', $request->get('event_types'));
            });
        }

        $query = $query->orderBy('priority');


        return view('web.listings.index', ['partners' => $query->paginate(8)->appends($query_params), 'categories' => $this->categories, 'eventTypes' => $this->eventTypes]);
    }

    public function category($category, Request $request)
    {
        $locale = CategoryLocale::where('slug', $category)
            ->where('lang', app()->getLocale())
            ->whereHas('category', function ($query) use ($category) {
                $query->whereNull('parent_id');
            })
            ->with(['category'])->first();
        if (!$locale)
            return view('404');

        $c = Category::where('id', $locale->categories_id)->whereNull('parent_id')->with(['parent', 'lang', 'parent.lang'])->first();
        if (!$c) {
            return view('404');
        }

        $query_params = [];
        $query = PartnersInfo::where('public', 1)->where('payment_status', 1)->whereHas('categories', function ($q) use ($c) {
            $q->where('category_id', $c->id);
        });

        //		if ($request->has('min_price') && $request->has('max_price')) {
        //			$query_params['min_price'] = $request->get('min_price');
        //			$query_params['max_price'] = $request->get('max_price');
        //			$query = $query->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        //		}

        if ($request->has('budget') && ((int)$request->get('budget') != 0 && $request->get('budget') != null && $request->get('budget') != 'null')) {
            $query->where('budget', $request->get('budget'));
            $query_params['budget'] = $request->get('budget');
        } else {
            unset($query_params['budget']);
        }

        if ($request->has('order_by') && in_array($request->get('order_by'), ['name', 'price'])) {
            $query_params['order_by'] = $request->get('order_by');
            $query_params['order_type'] = $request->get('order_type') ?? 'asc';

            if ($query_params['order_by'] == 'name') {
                $query = $query->orderBy(app()->getLocale() . '_company_name', $query_params['order_type']);
            }

            if ($query_params['order_by'] == 'price') {
                $query = $query->orderBy('price', $query_params['order_type']);
            }
        }

        if ($request->has('event_types')) {
            $query_params['event_types'] = $request->get('event_types');
            $query->whereHas('currentPlan', function ($q) {
                $q->where('name', 'Exclusif');
            })->whereHas('eventTypes', function ($q) use ($request) {
                $q->whereIn('en_slug', $request->get('event_types'))->orWhereIn('fr_slug', $request->get('event_types'));
            });
        }

        $query = $query->orderBy('priority', 'asc');

        FacadesMetaTag::set('title', $locale->meta_title ?? $locale->name . ' | Partybooker');
        if (!empty($locale->meta_description)) {
            FacadesMetaTag::set('description', $locale->meta_description);
        }
        if (!empty($locale->meta_keywords)) {
            FacadesMetaTag::set('keywords', $locale->meta_keywords);
        }


        return view('web.listings.category', [
            'partners' => $query->paginate(20)->appends($query_params),
            'categories' => $this->categories,
            'current' => $c,
            'banners' => $this->getBanners($c->code),
            'eventTypes' => $this->eventTypes,
            'description' => $locale->description
        ]);
    }

    private function getBanners($categoryCode)
    {
        return PartnerVipPlan::where('is_payed', 1)
            ->whereDate('created_at', '<=', date('Y-m-d'))
            ->whereHas('categories', function ($query) use ($categoryCode) {
                $query->where('category', $categoryCode);
            })->get();
    }

    public function subcategory($cat, $subcat, Request $request)
    {
        $categoriesList = Category::whereNull('parent_id')->pluck('id')->toArray();
        $categ = CategoryLocale::where('slug', $cat)->whereIn('categories_id', $categoriesList)->where('lang', app()->getLocale())->first();
        if (!$categ) {
            return view('404');
        }

        $subs = Category::where('parent_id', $categ->categories_id)->pluck('id')->toArray();

        $locale = CategoryLocale::whereIn('categories_id', $subs)
            ->where('slug', $subcat)
            ->where('lang', app()->getLocale())->with(['category'])->first();
        if (!$locale) {
            return view('404');
        }

        $category = Category::where('id', $locale->categories_id)->with(['lang', 'parent', 'parent.lang'])->first();

        if (!$category)
            return view('404');

        $query_params = [];
        $query = PartnersInfo::where('public', 1)->where('payment_status', 1)->whereHas('categories', function ($q) use ($category) {
            $q->where('sub_category_id', $category->id);
        });

        //		if ($request->has('min_price') && $request->has('max_price')) {
        //			$query_params['min_price'] = $request->get('min_price');
        //			$query_params['max_price'] = $request->get('max_price');
        //			$query = $query->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        //		}

        if ($request->has('budget') && ((int)$request->get('budget') != 0 && $request->get('budget') != null && $request->get('budget') != 'null')) {
            $query->where('budget', $request->get('budget'));
            $query_params['budget'] = $request->get('budget');
        } else {
            unset($query_params['budget']);
        }

        if ($request->has('order_by') && in_array($request->get('order_by'), ['name', 'price'])) {
            $query_params['order_by'] = $request->get('order_by');
            $query_params['order_type'] = $request->get('order_type') ?? 'asc';

            if ($query_params['order_by'] == 'name') {
                $query = $query->orderBy(app()->getLocale() . '_company_name', $query_params['order_type']);
            }

            if ($query_params['order_by'] == 'price') {
                $query = $query->orderBy('price', $query_params['order_type']);
            }
        }

        if ($request->has('event_types')) {
            $query_params['event_types'] = $request->get('event_types');
            $query->whereHas('currentPlan', function ($q) {
                $q->where('name', 'Exclusif');
            })->whereHas('eventTypes', function ($q) use ($request) {
                $q->whereIn('en_slug', $request->get('event_types'))->orWhereIn('fr_slug', $request->get('event_types'));
            });
        }

        $query = $query->orderBy('priority', 'asc');

        FacadesMetaTag::set('title', $locale->meta_title ?? $locale->name . ' | Partybooker');

        if (!empty($locale->meta_description)) {
            FacadesMetaTag::set('description', $locale->meta_description);
        }
        if (!empty($locale->meta_keywords)) {
            FacadesMetaTag::set('keywords', $locale->meta_keywords);
        }

        return view('web.listings.sub-category', [
            'partners' => $query->paginate(20)->appends($query_params),
            'categories' => $this->categories,
            'current' => $category,
            'banners' => $this->getBanners($category->code),
            'eventTypes' => $this->eventTypes,
            'description' => $locale->description
        ]);
    }

    public function filtered(Request $request)
    {
        $query_params = [];
        $query = PartnersInfo::where('public', 1)->where('payment_status', 1);
        //		if ($request->has('min_price') && $request->has('max_price')) {
        //			$query_params['min_price'] = $request->get('min_price');
        //			$query_params['max_price'] = $request->get('max_price');
        //			$query = $query->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        //		}

        if ($request->has('budget') && ((int)$request->get('budget') != 0 && $request->get('budget') != null && $request->get('budget') != 'null')) {
            $query->where('budget', $request->get('budget'));
        }

        if ($request->has('order_by') && in_array($request->get('order_by'), ['name', 'price'])) {
            $query_params['order_by'] = $request->get('order_by');
            $query_params['order_type'] = $request->get('order_type') ?? 'asc';

            if ($query_params['order_by'] == 'name') {
                $query = $query->orderBy(app()->getLocale() . '_company_name', $query_params['order_type']);
            }

            if ($query_params['order_by'] == 'price') {
                $query = $query->orderBy('price', $query_params['order_type']);
            }
        }

        $name = $this->clearValue($request->get('name'));
        if ($name) {
            $query_params['name'] = $name;
            $query = $query->where(function ($q) use ($name) {
                return $q->where('en_company_name', 'LIKE', '%' . $name . '%')
                    ->orWhere('fr_company_name', 'LIKE', '%' . $name . '%');
            });
        }

        $categoryCode = $this->clearValue($request->get('cat'));
        if ($categoryCode) {
            $query_params['cat'] = $categoryCode;
            $category = Category::where('code', $categoryCode)->first();
            if ($category->parent_id) {
                $query = $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('sub_category_id', $category->id)->where('category_id', $category->parent_id);
                });
            } else {
                $query = $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('category_id', $category->id);
                });
            }
        }

        $budget = $this->clearValue($request->get('budget'));
        if ($budget) {
            $query_params['budget'] = $budget;
            $query = $query->where('budget', $budget);
        }

        $place = $this->clearValue($request->get('place'));
        if ($place) {
            $query_params['place'] = $place;
            $query = $query->where('location_code', $place);
        }

        if ($request->has('event_types')) {
            $query_params['event_types'] = $request->get('event_types');
            $query->whereHas('currentPlan', function ($q) {
                $q->where('name', 'Exclusif');
            })->whereHas('eventTypes', function ($q) use ($request) {
                $q->whereIn('en_slug', $request->get('event_types'))->orWhereIn('fr_slug', $request->get('event_types'));
            });
        }

        $query = $query->orderBy('priority', 'asc');


        return view('web.listings.index', ['partners' => $query->paginate(20)->appends($query_params), 'categories' => $this->categories, 'eventTypes' => $this->eventTypes]);
    }

    private function clearValue($value)
    {
        if ($value == null || $value == 'null' || strlen($value) == 0) {
            return null;
        }
        return $value;
    }

    public function service(Request $request, $slug)
    {
        $partner = PartnersInfo::where('slug', $slug)->with(['currentPlan', 'user', 'categories', 'categories.primaryCategory'])->with(['services' => function ($query) {
            $query->where('status', Advert::STATUS_ACTIVE);
        }])->first();

        if (!$partner || !$partner->public) {
            abort(404);
        }

        if (!Auth::user() || (Auth::user()->id_partner && Auth::user()->id_partner != $partner->id_partner)) {
            Statistic::where('id_partner', $partner->id_partner)->increment('view');
        }

        $images = ServiceImage::where('id_partner', $partner->id_partner)->get();
        $subCategoriesId = AdvertCategory::where('partners_info_id', $partner->id)->pluck('sub_category_id')->toArray();
        $subCategories = Category::whereIn('id', $subCategoriesId)->pluck('code')->toArray();

        $locale = app()->getLocale();
        $locale_title = $locale . '_company_name';
        $locale_desc = $locale . '_full_descr';

        $locale_seo_title = $locale . '_seo_title';
        $locale_seo_desc = $locale . '_seo_desc';
        $locale_seo_keywords = $locale . '_seo_keywords';

        FacadesMetaTag::set('title', $partner->{$locale_seo_title} ?? $partner->{$locale_title});
        FacadesMetaTag::set('description', $partner->{$locale_seo_desc} ?? $partner->{$locale_desc});

        if (!empty($partner->{$locale_seo_keywords})) {
            FacadesMetaTag::set('keywords', $partner->{$locale_seo_keywords});
        }


        return view('service', [
            'partner' => $partner,
            'email' => $partner->user->email,
            'images' => $images,
            'subCategories' => $subCategories,
            'rates' => count($partner->rates),
            'adverts' => PartnersInfo::where('public', 1)
                ->where('payment_status', 1)
                ->orderBy('priority')
                ->orderBy('average_rate', 'desc')
                ->get()
                ->all()
        ]);
    }
}
