<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\estudiante::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->firstname,
        'apellido' => $faker->lastname,
        'telefono' => $faker->phonenumber,
        'email' => $faker->unique()->safeEmail,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\docente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->firstname,
        'cargo' => $faker->randomElement(['Administrativo','Catedra','Ocacional','planta']),
        'email' => $faker->unique()->safeEmail,
        'telefono' => $faker->phonenumber,
        'apellido' => $faker->lastname,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\materia::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->randomElement(['matematica','ingles','informatica','español','sociales','artistica']),
        'creditos' => $faker->numberBetween(1,4),
        'horas' => $faker->randomElement([2,3,4,5]),
        'descripcion' => $faker->paragraph(1),
        'docente_id' => App\docente::inRandomOrder()->first()->id,
    ];
});