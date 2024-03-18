<?php

namespace App\Helpers;

class ValidationRuleHelper extends \Elattar\Prepare\Helpers\ValidationRuleHelper
{
    public static function fileRules(bool $inUpdate = false, array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => $inUpdate ? 'sometimes' : 'required',
            'file' => 'file',
            'mimes' => 'mimes:jpeg,png,jfif,gif,mp3,m4a,3gp,mpga,x-aac,webp,wav,webm,wma,mp4,x-m4a',
            'max' => 'max:500000', // 2 MB
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);

    }
}
