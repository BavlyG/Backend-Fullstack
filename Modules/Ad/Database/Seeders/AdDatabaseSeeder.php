<?php

namespace Modules\Ad\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Ad\Entities\Ad;

class AdDatabaseSeeder extends Seeder
{
    public static int $recordCount = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $ads = [];

        for ($i = 0; $i < static::$recordCount; $i++) {
            $ads[] = [
                'title' => fake()->name(),
                'description' => fake()->text(),
                'discount' => fake()->numberBetween(1, 95),
                'created_at' => now(),
            ];
        }

        foreach (array_chunk($ads, 1000) as $chunk) {
            Ad::insert($chunk);
        }
    }
}
