<?php

namespace Modules\Rest\Entities;

use App\Helpers\MediaHelper;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Rest\Database\factories\RestFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Rest extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

    protected $fillable = [
        'name',
        'space',
        'description',
        'price',
    ];

    public static function newFactory(): RestFactory
    {
        return RestFactory::new();
    }

    public function images()
    {
        return MediaHelper::mediaRelationship($this, 'rests');
    }
}
