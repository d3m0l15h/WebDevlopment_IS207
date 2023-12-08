<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'introduce',
		'education',
		'experience',
		'skill',
		'ownproject',
		'certificate',
		'prize'
	];
}
