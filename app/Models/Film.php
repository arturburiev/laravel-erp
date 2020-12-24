<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use DB;

class Film extends Model
{
	use SoftDeletes;

 	protected $table = 'films';
	protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['title','description', 'genre_id'];

	public function genre()
	{
	  return $this->belongsTo(Genre::class, 'genre_id');
	}

	public static function getAll()
	{

		$cFilms = Film::join('genres', 'genres.id', 'films.genre_id')
		->select('films.title AS title', 'films.description AS description', 'genres.name AS genre_name')
		->get();

		return $cFilms;
	}

}
