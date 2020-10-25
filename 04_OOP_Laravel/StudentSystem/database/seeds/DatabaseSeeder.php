<?php

use App\User;
use App\Level;
use App\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//1        
    	Course::truncate();
    	Level::truncate();
    	
    	//2
    	$courseQuantity = 50;
    	$levelQuantity = 400;
    	$userQuantity = 100;

    	//3
    	factory(Course::class, $courseQuantity)->create();
    	factory(Level::class, $levelQuantity)->create();
    	factory(User::class, $userQuantity)->create();
    }
}
