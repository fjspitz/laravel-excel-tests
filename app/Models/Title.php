<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $emp_no
 * @property string $title
 * @property string $from_date
 * @property string $to_date
 * @property Employee $employee
 */
class Title extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['to_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_no', 'emp_no');
    }
}
