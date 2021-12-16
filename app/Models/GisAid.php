<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GisAid extends Model
{
	protected $table = 'gisaid';
	protected $primaryKey = 'id';

	public static function insertData($data) {
		//$value = DB::table('gisaid')->where('username', $data['username'])->get();
		//if ($value->count() == 0) {
		DB::table('gisaid')->insert($data);
		//}
	}
}
