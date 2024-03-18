<?php

namespace App\Http\Resources;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteLogoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'url' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'logo')),
        ];
    }
}
