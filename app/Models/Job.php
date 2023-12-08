<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
 * 
 * @property Employer $employer
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
		'eid' => 'int'
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
		'ename'
	];

	public function employer()
	{
		return $this->belongsTo(Employer::class, 'eid');
	}
}
