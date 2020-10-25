<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use App\Course;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
   return [
		'level_name' => $faker->sentence,
		// 'description' => $faker->paragraph(1),		
		'course_id' => Course::all()->random()->id
	];
});
