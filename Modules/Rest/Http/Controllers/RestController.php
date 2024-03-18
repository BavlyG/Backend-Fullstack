<?php

namespace Modules\Rest\Http\Controllers;

use App\Services\FileOperationService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rest\Entities\Rest;
use Modules\Rest\Http\Requests\RestRequest;
use Modules\Rest\Transformers\RestResource;

class RestController extends Controller
{
    use HttpResponse;

    public function index()
    {
        return $this->resourceResponse(
            RestResource::collection(Rest::latest()->with('images')->get())
        );
    }

    public function store(RestRequest $request)
    {
        $data = $request->validated();

        $rest = Rest::create($data);

        foreach($data['images'] as $image)
        {
            (new FileOperationService())->addMedia($rest, $image, 'rests');
        }
    }

    public function destroy(Rest $rest)
    {
        $rest->delete();

        return $this->okResponse(message: translate_success_message('rest', 'deleted'));
    }
}
