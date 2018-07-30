<?php

namespace App\Service\Filesystem;

class DateFileName implements FileNameInterface
{
    public function getName(string $originName): string
    {
        return (new \DateTime())->format('Y-m-d_H-i-s');
    }
}
