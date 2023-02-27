<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $emp_no
 * @property string $dept_no
 * @property string $from_date
 * @property string $to_date
 * @property Department $department
 * @property Employee $employee
 */
class DepartmentManager extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dept_manager';

    /**
     * @var array
     */
    protected $fillable = ['from_date', 'to_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'dept_no', 'dept_no');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_no', 'emp_no');
    }
}
