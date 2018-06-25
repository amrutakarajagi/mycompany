<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	public function employeeDetail()
	{
		return $this->hasOne('App\EmployeeDetail');
	}
}
