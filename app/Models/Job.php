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
 * @property string|null $salary
 * @property float|null $salarymin
 * @property float|null $salarymax
 * @property string $reasons
 * @property string $descriptions
 * @property string $requirements
 * @property string $location
 * @property string $worktype
 * @property int $eid
 * @property string $elogo
 * @property string $ename
 * @property Carbon $createon
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
		'salarymin' => 'float',
		'salarymax' => 'float',
		'eid' => 'int',
		'createon' => 'datetime'
	];

	protected $fillable = [
		'name',
		'salary',
		'salarymin',
		'salarymax',
		'reasons',
		'descriptions',
		'requirements',
		'location',
		'worktype',
		'eid',
		'elogo',
		'ename',
		'createon'
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
