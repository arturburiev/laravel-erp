<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Film;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$iIdGenre = 0;
    	$iIdFilm = 0;

        for ($i=1; $i <= 10; $i++) { 
	      $iIdGenre = Genre::create([
	             'name' => "Genre_$i",
	         ])->id;

	      for ($j=1; $j <= random_int(1, 20); $j++) {
		      	Film::create([
		             'title' => "Film_$j",
		             'description' => "DescriptionFilm_$j",
		             'genre_id' => (int)$iIdGenre,
		         ]);
	      }

     	}
    }
}
