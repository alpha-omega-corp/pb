<?php

namespace App\Http\Controllers\App;

use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\IFileService;
use App\Models\AppPost;
use App\Models\AppPostLocale;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    private IFileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $post = AppPost::create([
            'image' => $this->fileService->blogThumbnail($data['thumbnail']),
            'status' => false
        ]);

        AppPostLocale::create([
            'app_post_id' => $post->id,
            'lang' => Language::FR,
            'slug' => $data['slug_fr'],
            'alt' => $data['alt_fr'],
            'title' => $data['title_fr'],
            'content' => $data['content_fr'],
        ]);

        AppPostLocale::create([
            'app_post_id' => $post->id,
            'lang' => Language::EN,
            'slug' => $data['slug_en'],
            'alt' => $data['alt_en'],
            'title' => $data['title_en'],
            'content' => $data['content_en'],
        ]);

        return back()->with('success', 'Blog post created successfully');
    }

    public function destroy(AppPost $post): RedirectResponse
    {
        $this->fileService->delete($post->image);
        $post->locales()->delete();
        $post->delete();

        return redirect()->back()->with('success', 'Blog post deleted successfully');
    }

    public function status(AppPost $post): RedirectResponse
    {
        $post->update([
            'status' => !$post->status
        ]);

        return redirect()->back()->with('success', 'AppPost status changed');
    }

    public function update(AppPost $post, UpdatePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['thumbnail'])) {
            $image = $this->fileService->blogThumbnail($data['thumbnail']);
        }

        $post->update([
            'image' => $image ?? $post->image,
        ]);

        $post->ofLang(Language::FR)->first()->locale->update([
            'slug' => $data['slug_fr'],
            'alt' => $data['alt_fr'],
            'title' => $data['title_fr'],
            'content' => $data['content_fr'],
        ]);

        $post->ofLang(Language::EN)->first()->locale->update([
            'slug' => $data['slug_en'],
            'alt' => $data['alt_en'],
            'title' => $data['title_en'],
            'content' => $data['content_en'],
        ]);

        return back()->with('success', 'Blog post updated successfully');
    }
}
