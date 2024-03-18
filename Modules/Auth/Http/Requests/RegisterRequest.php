<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\ValidationMessageHelper;
use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Facades\Captcha;
use Modules\Auth\Facades\IsEnabled;

class RegisterRequest extends FormRequest
{
    use HttpResponse;

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            AuthEnum::UNIQUE_COLUMN => AuthEnum::isUniqueKeyEmail()
                ? ValidationRuleHelper::emailRules()
                : ValidationRuleHelper::phoneRules(),

            'name' => ValidationRuleHelper::stringRules(),
            'password' => ValidationRuleHelper::defaultPasswordRules(),
            // 'approve_terms' => ValidationRuleHelper::booleanRules(),
        ];
    }

    public function messages(): array
    {
        return array_merge(
            (
                IsEnabled::captcha()
                    ? Captcha::getCaptchaErrorMessages()
                    : []
            )
        );
    }

    /**
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
