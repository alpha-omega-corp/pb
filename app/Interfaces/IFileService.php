<?php

namespace App\Interfaces;

use Illuminate\Http\UploadedFile;

interface IFileService
{
    public function blogThumbnail(UploadedFile $file): string;

    public function companyLogo(UploadedFile $file): string;

    public function advertImage(UploadedFile $file): string;

    public function advertFile(UploadedFile $file, string $dest): string;


}
