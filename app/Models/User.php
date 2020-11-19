<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements MustVerifyEmail, Auditable
{
	use HasApiTokens;
	use HasFactory;
	use Notifiable;
	use GeneratesUuid;
	use \OwenIt\Auditing\Auditable;

	protected $table = 'users';
	protected $uuidVersion = 'ordered';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'two_factor_recovery_codes',
		'two_factor_secret',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $appends = [
		'profile_photo_url',
	];

	public static function getTableName()
	{
		return with(new static)->getTable();
	}

	public function getRouteKeyName()
	{
		return 'uuid';
	}

	public function scopeFilterBy($query, $column, $value)
	{
		if (!$value) {
			return $query;
		}

		return $query->where($column, $value);
	}

	public function scopeSearchableProperties($query, $search)
	{
		if (!$search) {
			return $query;
		}

		return $query->where('name', 'like', '%' . $search . '%')
		             ->orWhere('email', 'like', '%' . $search . '%');
	}
}
