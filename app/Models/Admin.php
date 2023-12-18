<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string|null $username
 * @property string $status
 * 
 * @property Collection|Account[] $accounts
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admins';
	public $timestamps = false;

	protected $fillable = [
		'username',
		'status'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class, 'adminid');
	}
}
