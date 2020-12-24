<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
use DB;

class Genre extends Model
{

	use SoftDeletes;

 	protected $table = 'genres';
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name'];

    public function films()
    {
      return $this->hasMany(Film::class, 'genre_id');
    }    

	public static function getAll()
	{

		$cFilms = Genre::join('films', 'films.genre_id', 'genres.id')
		->groupBy('genres.id')
		->select('genres.name AS name', DB::raw('COUNT(films.id) as film_count'))
		->get();

		return $cFilms;
	}

}
