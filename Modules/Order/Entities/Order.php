<?php

namespace Modules\Order\Entities;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Rest\Entities\Rest;

class Order extends Model
{
    use HasFactory, UUID;

    protected $fillable = ['user_id', 'rest_id', 'price'];

    public static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }

    public function rest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Rest::class);
    }
}
