<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteLogoRequest;
use App\Http\Resources\SiteLogoResource;
use App\Models\SiteLogo;
use App\Services\FileOperationService;
use App\Traits\HttpResponse;

class SiteLogoController extends Controller
{
    use HttpResponse;

    public function show()
    {
        return $this->resourceResponse(SiteLogoResource::make(SiteLogo::with('logo')->first()));
    }

    public function update(SiteLogoRequest $request, FileOperationService $fileOperationService)
    {
        $siteLogo = SiteLogo::first();

        $siteLogo->getFirstMedia('site_logo')?->delete();

        $fileOperationService->storeImageFromRequest($siteLogo, 'site_logo', 'logo');

        return $this->show();
    }
}
