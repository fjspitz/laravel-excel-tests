<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dept_no
 * @property string $dept_name
 * @property DeptEmp[] $deptEmps
 * @property DeptManager[] $deptManagers
 */
class Department extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dept_no';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['dept_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deptEmps()
    {
        return $this->hasMany('App\Models\DeptEmp', 'dept_no', 'dept_no');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deptManagers()
    {
        return $this->hasMany('App\Models\DeptManager', 'dept_no', 'dept_no');
    }
}
