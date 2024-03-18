<?php

namespace Modules\Auth\Services;

use App\Models\User;
use DB;
use Exception;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Emails\VerifyUserEmail;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserStatusEnum;
use Modules\Auth\Enums\UserTypeEnum;

class RegisterService
{
    public function registerNewUser(array $data)
    {
        $errors = [];
        $alphaType = UserTypeEnum::CLIENT;

        $data['type'] = $alphaType;
        User::create(
            $data +
            [
                'status' => UserStatusEnum::ACTIVE,
                AuthEnum::VERIFIED_AT => now(),
                'price_plan_expires_at' => now()->addMonth(),
            ]
        );

//        try {
//            DB::transaction(function () use ($data) {
//                $user =

//                $userInfo = (new VerifyEmailService())->verifyUserInfo($user);
//
//                Mail::to($user->email)->send(new VerifyUserEmail($userInfo));
//            });
//        } catch (Exception $e) {
//            $errors['operation_failed'] = $e->getMessage();
//
//            return $errors;
//        }
//
        return true;
    }
}
