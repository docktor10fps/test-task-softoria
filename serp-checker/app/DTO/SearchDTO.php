<?php

namespace App\DTO;

readonly class SearchDTO
{
    public function __construct(
        public string $keyword,
        public string $targetSite,
        public string $locationName = 'Ukraine',
        public string $languageName = 'Ukrainian',
        public int $depth = 100
    ) {}

    public function toApiArray(): array
    {
        return [
            [
                'keyword' => $this->keyword,
                'location_name' => $this->locationName,
                'language_name' => $this->languageName,
                'device' => 'desktop',
                'os' => 'windows',
                'depth' => $this->depth,
            ]
        ];
    }
}
