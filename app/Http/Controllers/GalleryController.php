<?php

namespace App\Http\Controllers;

use App\Enums\Language;
use App\Http\Requests\StoreAdvertImageRequest;
use App\Http\Requests\UpdateAdvertImageRequest;
use App\Interfaces\IFileService;
use App\Models\Advert;
use App\Models\AdvertImage;
use App\Models\AdvertLocale;
use App\Services\FileService;

class GalleryController extends Controller
{
    private IFileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function store(Advert $advert, StoreAdvertImageRequest $request)
    {
        $data = $request->validated();

        $image = AdvertImage::create([
            'advert_id' => $advert->id,
            'is_thumbnail' => false,
            'path' => $this->fileService->advertImage($data['image']),
        ]);

        AdvertLocale::create([
            'translatable_type' => AdvertImage::class,
            'translatable_id' => $image->id,
            'lang' => Language::FR->value,
            'title' => $data['title_fr'],
            'description' => $data['description_fr']
        ]);

        AdvertLocale::create([
            'translatable_type' => AdvertImage::class,
            'translatable_id' => $image->id,
            'lang' => Language::EN->value,
            'title' => $data['title_en'],
            'description' => $data['description_en']
        ]);

        return back()->with('success', 'Image added successfully');
    }

    public function update(AdvertImage $image, UpdateAdvertImageRequest $request)
    {
        $data = $request->validated();
        $image->ofLang(Language::FR)->find($image->id)->locale->update([
            'title' => $data['title_fr'],
            'description' => $data['description_fr']
        ]);

        $image->ofLang(Language::EN)->find($image->id)->locale->update([
            'title' => $data['title_en'],
            'description' => $data['description_en']
        ]);

        return back()->with('success', 'Image updated successfully');
    }

    public function destroy(AdvertImage $image)
    {
        $this->fileService->delete($image->path);
        $image->delete();

        return back()->with('success', 'Image removed successfully');
    }


}
