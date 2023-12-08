<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apply
 * 
 * @property int|null $jid
 * @property int|null $uid
 * @property Carbon $time
 * @property string|null $cv
 * @property string|null $letter
 *
 * @package App\Models
 */
class Apply extends Model
{
	protected $table = 'applies';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'jid' => 'int',
		'uid' => 'int',
		'time' => 'datetime'
	];

	protected $fillable = [
		'jid',
		'uid',
		'time',
		'cv',
		'letter'
	];
}
