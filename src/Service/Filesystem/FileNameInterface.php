<?php

namespace App\Service\Filesystem;

interface FileNameInterface
{
    public function getName(string $originName): string;
}
