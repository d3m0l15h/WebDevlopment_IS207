<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string $name
 * @property float $salary
 * @property float|null $salary_min
 * @property float|null $salary_max
 * @property string $strength
 * @property string $reasons
 * @property string $descriptions
 * @property string $requirements
 * @property string $location
 * @property string $working_type
 * @property int $eid
 * @property Carbon $create_on
 * 
 * @property Employer $employer
 * @property Collection|Apply[] $applies
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';
	public $timestamps = false;

	protected $casts = [
		'salary' => 'float',
		'salary_min' => 'float',
		'salary_max' => 'float',
		'eid' => 'int',
		'create_on' => 'datetime'
	];

	protected $fillable = [
		'name',
		'salary',
		'salary_min',
		'salary_max',
		'strength',
		'reasons',
		'descriptions',
		'requirements',
		'location',
		'working_type',
		'eid',
		'create_on'
	];

	public function employer()
	{
		return $this->belongsTo(Employer::class, 'eid');
	}

	public function applies()
	{
		return $this->hasMany(Apply::class, 'jid');
	}
}
