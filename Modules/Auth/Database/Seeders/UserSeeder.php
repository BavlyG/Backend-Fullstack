<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Auth\Enums\UserTypeEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach (UserTypeEnum::availableTypes() as $type) {
            User::create([
                'name' => $type,
                'email' => "$type@admin.com",
                'email_verified_at' => now(),
                'status' => true,
                'password' => $type,
                'type' => $type,
            ]);
        }
    }
}
