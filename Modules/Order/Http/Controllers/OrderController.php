<?php

namespace Modules\Order\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Emails\OrderEmail;
use Modules\Order\Entities\Order;
use Modules\Order\Transformers\OrderResource;
use Modules\Rest\Entities\Rest;

class OrderController extends Controller
{
    use HttpResponse;

    public function index()
    {
        return $this->resourceResponse(
            OrderResource::collection(
                Order::latest()->with(['rest:id,name,description,space', 'rest.images'])->get()
            )
        );
    }

    public function store($rest)
    {
        $rest = Rest::whereId($rest)->firstOrFail();

        $order = Order::create([
            'user_id' => auth()->id(),
            'rest_id' => $rest->id,
            'price' => $rest->price,
        ]);

        Mail::to(auth()->user()->email)->send(new OrderEmail($order, auth()->user()));

        return $this->createdResponse(message: 'Order Created Successfully');
    }
}
