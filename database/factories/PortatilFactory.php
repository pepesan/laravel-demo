<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Portatil;
use Faker\Generator as Faker;

$factory->define(Portatil::class, function (Faker $faker) {

    return [
        'marca' => $faker->word,
        'modelo' => $faker->word,
        'descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
