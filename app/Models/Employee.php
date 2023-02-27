<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $emp_no
 * @property string $birth_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $hire_date
 * @property DeptEmp[] $deptEmps
 * @property DeptManager[] $deptManagers
 * @property Salary[] $salaries
 * @property Title[] $titles
 */
class Employee extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'emp_no';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['birth_date', 'first_name', 'last_name', 'gender', 'hire_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deptEmps()
    {
        return $this->hasMany('App\Models\DeptEmp', 'emp_no', 'emp_no');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deptManagers()
    {
        return $this->hasMany('App\Models\DeptManager', 'emp_no', 'emp_no');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salaries()
    {
        return $this->hasMany('App\Models\Salary', 'emp_no', 'emp_no');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function titles()
    {
        return $this->hasMany('App\Models\Title', 'emp_no', 'emp_no');
    }
}
