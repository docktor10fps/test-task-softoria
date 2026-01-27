<?php

namespace App\Services\Search\Contracts;

use App\DTO\SearchDTO;

interface SearchProviderInterface
{
/**
* Sends a request to the API
*/
public function getSerpData(SearchDTO $data): array;
}
