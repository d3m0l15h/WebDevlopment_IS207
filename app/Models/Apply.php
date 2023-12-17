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
 * @property int $jid
 * @property int $uid
 * @property Carbon $time
 * @property string|null $cv
 * @property string|null $letter
 * @property string $status
 * 
 * @property Job $job
 * @property User $user
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
		'time',
		'cv',
		'letter',
		'status'
	];

	public function job()
	{
		return $this->belongsTo(Job::class, 'jid');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'uid');
	}
}
