<?php

namespace Modules\Rest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\ValidationRuleHelper;
use Elattar\Prepare\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;

class RestRequest extends FormRequest
{
    use HttpResponse;

    public function rules()
    {
        return [
            'name' => ValidationRuleHelper::stringRules(),
            'price' => ValidationRuleHelper::integerRules(),
            'description' => ValidationRuleHelper::longTextRules(),
            'space' => ValidationRuleHelper::integerRules(),
            'images' => ValidationRuleHelper::arrayRules(),
            'images.*' => ValidationRuleHelper::storeOrUpdateImageRules(),
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
