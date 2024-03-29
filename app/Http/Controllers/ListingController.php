<?php

namespace App\Http\Controllers;

use App\Interfaces\ICategoryService;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Company;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class ListingController extends Controller
{
    private ICategoryService $categoryService;
    private Collection $categories;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->categories = Category::all();
    }

    public function index(?string $category = null, ?string $child = null)
    {
        $adverts = $this->categoryService->filterCategory($category, $child);

        return view('app.listing.index', [
            'categories' => $this->categories,
            'adverts' => $adverts->paginate(6)
                ->fragment('adverts'),
        ]);
    }

    public function advert(Company $company, Advert $advert): View
    {
        return view('app.listing.advert', [
            'advert' => $advert,
            'company' => $company
        ]);
    }


}
