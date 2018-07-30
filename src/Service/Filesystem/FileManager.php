<?php

namespace App\Service\Filesystem;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManager
{
    private $fileName;
    private $uploadDir;

    public function __construct(FileNameInterface $fileName, string $uploadDir)
    {
        $this->fileName = $fileName;
    }

    public function upload(UploadedFile $file): bool
    {
        try {
            $file->move($this->uploadDir, $this->fileName->getName($file->getClientOriginalName()));

            return true;
        } catch (FileException $e) {
            return false;
        }
    }
}
