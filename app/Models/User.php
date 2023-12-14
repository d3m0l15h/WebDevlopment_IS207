<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $introduce
 * @property string|null $education
 * @property string|null $experience
 * @property string|null $skill
 * @property string|null $ownproject
 * @property string|null $certificate
 * @property string|null $prize
 * @property string $status
 * @property string|null $location
 * @property string|null $avatar
 * @property string|null $phone
 * @property string|null $email
 * 
 * @property Collection|Account[] $accounts
 * @property Collection|Apply[] $applies
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'introduce',
		'education',
		'experience',
		'skill',
		'ownproject',
		'certificate',
		'prize',
		'status',
		'location',
		'avatar',
		'phone',
		'email'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class, 'userid');
	}

	public function applies()
	{
		return $this->hasMany(Apply::class, 'uid');
	}
}
