<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Modules\Page\Entities\Page;

class SelectMenuController extends Controller
{
    use HttpResponse;

    public function pages()
    {
        return $this->resourceResponse(
            Page::latest()->whereNull('parent_page_id')->get(['id', 'name'])
        );
    }
}
