<?php

namespace App\Service\Filesystem;

class OriginalName implements FileNameInterface
{
    public function getName(string $originName): string
    {
        return $originName;
    }
}
