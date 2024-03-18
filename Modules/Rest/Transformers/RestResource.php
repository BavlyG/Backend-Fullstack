<?php

namespace Modules\Rest\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'space' => $this->space,
            'price' => $this->whenHas('price', number_format($this->price)),
            'description' => $this->description,
            'images' => $this->whenLoaded('images', function(){
                $images = [];

                if($this->images->first())
                {
                    return $this->images->map(fn($image) => $image->original_url);
                }

                return [
                    asset('/storage/default/store.png'),
                    asset('/storage/default/store.png'),
                    asset('/storage/default/store.png'),
                ];
            }),
        ];
    }
}
