<?php

namespace App\Http\Controllers;

use App\Actions\ChangeRecordStatus;
use App\Http\Requests\ChangeRecordStatusRequest;
use App\Traits\HttpResponse;
use Illuminate\Http\JsonResponse;
use Modules\Page\Entities\Page;
use Modules\Page\Entities\Section;
use Modules\Page\Entities\SectionFile;
use Modules\Page\Entities\Slider;

class ChangeStatusController extends Controller
{
    use HttpResponse;

    private array $allowedList = [
        'section' => ['model' => Section::class],
        'section_file' => ['model' => SectionFile::class],
        'slider' => ['model' => Slider::class],
        'page' => ['model' => Page::class],
    ];

    public function handle(
        ChangeRecordStatusRequest $request,
        ChangeRecordStatus $changeRecordStatus,
        string $type,
        int $id
    ): JsonResponse {
        if (isset($this->allowedList[$type])) {
            $updated = $changeRecordStatus->handle(
                $this->allowedList[$type]['model'],
                $id,
                $request->validated()['status']
            );

            if ($updated) {
                return $this->okResponse(
                    message: translate_success_message('status', 'updated')
                );
            }

            return $this->notFoundResponse(translate_error_message('id', 'not_exists'));
        }

        return $this->notFoundResponse(translate_error_message('type', 'not_exists'));

    }
}
