<?php

namespace App\Http\Controllers;


use App\Enums\Language;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertAccessRequest;
use App\Http\Requests\UpdateAdvertRequest;
use App\Interfaces\IFileService;
use App\Models\Advert;
use App\Models\Partner;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;

class AdvertController extends Controller
{
    private IFileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function store(Partner $partner, StoreAdvertRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (count($partner->company->adverts) >= $partner->payment->plan->advert_count) {
            return back()->with('error', 'You have reached the maximum number of adverts');
        }

        return back()->with('success', 'Advert created successfully');
    }

    public function status(Advert $advert): RedirectResponse
    {
        $advert->update(['is_public' => !$advert->is_public]);

        return back()->with('success', 'Advert status updated successfully');
    }

    public function update(Advert $advert, UpdateAdvertRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $advert->ofLang(Language::FR)->first()->locale->update([
            'title' => $data['title_fr'],
        ]);

        $advert->ofLang(Language::EN)->first()->locale->update([
            'title' => $data['title_en'],
        ]);

        $advert->update(['slug' => $data['slug']]);

        return back()->with('success', 'Advert updated successfully');
    }

    public function access(Advert $advert, UpdateAdvertAccessRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $advert->update(['slug' => $data['slug']]);

        return back()->with('success', 'Advert access updated successfully');
    }

    public function destroy(Advert $advert): RedirectResponse
    {
        $this->fileService->delete($advert->images);
        $advert->delete();

        return back()->with('success', 'Advert deleted successfully');
    }


}
