<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRankRequest;
use App\DTO\SearchDTO;
use App\Services\RankCalculator;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(
        private readonly RankCalculator $rankCalculator
    ) {}

    public function index(): View
    {
        return view('search.index');
    }

    public function store(SearchRankRequest $request): View
    {
        $dto = new SearchDTO(
            keyword: $request->validated('keyword'),
            targetSite: $request->validated('target_site'),
            locationName: $request->validated('location_name'),
            languageName: $request->validated('language_name'),
            depth: $request->validated('depth')
        );

        $rank = $this->rankCalculator->calculate($dto);

        return view('search.index', [
            'rank' => $rank,
            'searched' => true,
            'targetSite' => $dto->targetSite
        ]);
    }
}
