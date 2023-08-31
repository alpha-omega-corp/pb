<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'en_slug',
		'en_name',
		'fr_slug',
		'fr_name'
	];


}
