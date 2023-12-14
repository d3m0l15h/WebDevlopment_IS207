<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employer
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $location
 * @property string|null $workingtime
 * @property string|null $quality
 * @property string|null $ownproject
 * @property string|null $prize
 * @property string $phone
 * @property string|null $introduce
 * @property string|null $logo
 * @property string $status
 * @property string|null $email
 * 
 * @property Collection|Account[] $accounts
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class Employer extends Model
{
	protected $table = 'employers';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'location',
		'workingtime',
		'quality',
		'ownproject',
		'prize',
		'phone',
		'introduce',
		'logo',
		'status',
		'email'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class, 'employerid');
	}

	public function jobs()
	{
		return $this->hasMany(Job::class, 'eid');
	}
}
