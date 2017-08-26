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
 * Labels Model
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Entities\Label::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName
    ];
});

/**
 * Links Factory
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Entities\Link::class, function () {
    return [];
});

/**
 * Links Details Factory
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Entities\LinkDetails::class, function (Faker\Generator $faker) {
    return [
        //'link_id' => $faker->numberBetween(1, 1000),
        'name' => $faker->name,
        'locale' => $faker->locale,
        'external_link_id' => $faker->uuid
    ];
});

/**
 * Links Details Fqdn Model
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(\App\Entities\LinkFqdn::class, function (Faker\Generator $faker) {
    return [
        //'link_id' => $faker->numberBetween(1, 1000),
        'scheme' => $faker->randomElement(['http', 'https']),
        'host' => $faker->domainName,
        'deeplink' => 'emtii-digital',
        'full_qualified_link' => $faker->url
    ];
});

/**
 * NewsFeed Model
 */
$factory->define(\App\Entities\NewsFeed::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'website' => $faker->domainName,
        'locale' => $faker->locale,
        'deeplink' => $faker->url,
        'local_file' => 'local_filename.' . $faker->fileExtension,
        'local_file_name' => $faker->name,
        'local_file_format' => $faker->fileExtension
    ];
});
