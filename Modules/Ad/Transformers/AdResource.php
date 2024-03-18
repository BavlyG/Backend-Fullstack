<?php

namespace Modules\Ad\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    public function toArray($request)
    {
        $showAdDetails = ! preg_match('/.*(ads|ads\/for_clients|\/users\/ads)$/', $request->url());

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->whenHas('description'),
            'discount' => $this->discount.(! $showAdDetails ? '%' : ''),
            'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'image')),
        ];
    }
}
