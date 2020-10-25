<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
	return [
        'course_name'	=> $faker->word,
        'date_start' 	=> $faker->date,
        'date_end' 		=> $faker->date
    ];   
});
