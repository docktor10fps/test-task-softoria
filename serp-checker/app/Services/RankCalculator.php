<?php

namespace App\Services;

use App\DTO\SearchDTO;
use App\Services\Contracts\SearchProviderInterface;

class RankCalculator
{
    public function __construct(
        private SearchProviderInterface $searchProvider
    ) {}

    /**
     * Gets data and calculates site position
     */
    public function calculate(SearchDTO $dto): ?int
    {
        $response = $this->searchProvider->getSerpData($dto);

        $items = $response['tasks'][0]['result'][0]['items'] ?? [];

        foreach ($items as $item) {
            if (($item['type'] ?? '') !== 'organic') {
                continue;
            }

            if (str_contains($item['url'] ?? '', $dto->targetSite)) {
                return $item['rank_absolute'] ?? null;
            }
        }

        return null;
    }
}
