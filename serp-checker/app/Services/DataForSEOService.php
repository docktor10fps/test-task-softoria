<?php

namespace App\Services;

use App\DTO\SearchDTO;
use App\Services\Contracts\SearchProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class DataForSEOService implements SearchProviderInterface
{
    /**
     * Sends a request to the DataForSEO API
     */
    public function getSerpData(SearchDTO $data): array
    {
        $config = Config::get('services.dataforseo');

        $response = Http::withBasicAuth($config['login'], $config['password'])
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($config['url'], $data->toApiArray());

        if ($response->failed()) {
            throw new \Exception("Error API DataForSEO: " . $response->status());
        }

        return $response->json();
    }
}
