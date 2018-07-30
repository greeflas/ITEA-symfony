<?php

namespace App\Service\Filesystem;

class OriginalName implements FileNameInterface, FileNamePrefixInterface
{
    private $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function getName(string $originName): string
    {
        return $this->getPrefix() . $originName;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
