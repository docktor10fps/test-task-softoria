<?php

namespace App\Services\Contracts;

use App\DTO\SearchDTO;

interface SearchProviderInterface
{
/**
* Sends a request to the API
*/
public function getSerpData(SearchDTO $data): array;
}
