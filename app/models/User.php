<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property String first_name
 * @property String last_name
 */
class User extends Eloquent {

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'role', 'updated_at', 'created_at');

}
