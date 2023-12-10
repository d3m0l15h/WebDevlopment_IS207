<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Account
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 * @property int|null $userid
 * @property int|null $employerid
 * @property int|null $adminid
 * @property int|null $uid
 * 
 * @property Admin|null $admin
 * @property Employer|null $employer
 * @property User|null $user
 *
 * @package App\Models
 */
class Account extends Authenticatable
{
	protected $table = 'accounts';
	public $timestamps = false;

	protected $casts = [
		'userid' => 'int',
		'employerid' => 'int',
		'adminid' => 'int',
		'uid' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'role',
		'userid',
		'employerid',
		'adminid',
		'uid'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'adminid');
	}

	public function employer()
	{
		return $this->belongsTo(Employer::class, 'employerid');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'userid');
	}
}
