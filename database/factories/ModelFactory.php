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

/**
 * Links Factory
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\LinksModel::class, function () {
    return [];
});

/**
 * Links Details Factory
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Models\LinksDetailsModel::class, function (Faker\Generator $faker) {
    return [
        //'link_id' => $faker->numberBetween(1, 1000),
        'name' => $faker->name,
        'locale' => $faker->locale
    ];
});

/**
 * Links Details Fqdn Model
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Models\LinksDetailsFqdnModel::class, function (Faker\Generator $faker) {
    return [
        //'link_id' => $faker->numberBetween(1, 1000),
        'protocol' => $faker->randomElement(['http', 'https']),
        'third_level_label' => $faker->randomElement(['www', '']),
        'second_level_label' => $faker->domainName,
        'top_level_domain' => $faker->tld,
        'deeplink' => 'emtii-digital',
        'full_qualified_link' => $faker->url
    ];
});

/**
 * Links Labels Model
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Models\LinksLabelsModel::class, function (Faker\Generator $faker) {
    return [
        //'link_id' => $faker->numberBetween(1, 1000),
        'label_id' => $faker->numberBetween(1, 10)
    ];
});

/**
 * Labels Model
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Models\LabelsModel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName
    ];
});
