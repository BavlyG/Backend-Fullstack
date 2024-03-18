<?php

namespace App\Models;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\SiteLogo
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteLogo whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class SiteLogo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function logo()
    {
        return MediaHelper::mediaRelationship($this, 'site_logo');
    }
}
