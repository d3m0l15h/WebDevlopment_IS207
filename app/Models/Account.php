<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $role
 * @property int|null $uid
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'uid' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'role',
		'uid'
	];
}
