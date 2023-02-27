<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $emp_no
 * @property string $from_date
 * @property integer $salary
 * @property string $to_date
 * @property Employee $employee
 */
class Salary extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['salary', 'to_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_no', 'emp_no');
    }
}
