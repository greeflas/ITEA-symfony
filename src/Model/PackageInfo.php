<?php

namespace App\Model;

class PackageInfo
{
    private $name;
    private $downloadsDaily;
    private $downloadsMonthly;
    private $downloadsTotal;

    public static function fromArray(array $data)
    {
        return new self(
            $data['name'] ?? '',
            $data['daily'] ?? 0,
            $data['monthly'] ?? 0,
            $data['total'] ?? 0
        );
    }

    public function __construct(string $name, int $downloadsDaily, int $downloadsMonthly, int $downloadsTotal)
    {
        $this->name = $name;
        $this->downloadsDaily = $downloadsDaily;
        $this->downloadsMonthly = $downloadsMonthly;
        $this->downloadsTotal = $downloadsTotal;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDownloadsDaily(): int
    {
        return $this->downloadsDaily;
    }

    public function getDownloadsMonthly(): int
    {
        return $this->downloadsMonthly;
    }

    public function getDownloadsTotal(): int
    {
        return $this->downloadsTotal;
    }
}
