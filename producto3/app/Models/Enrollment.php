<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'enrollment';
    protected $fillable = ['id_student',    'id_course',    'status'];
    protected $primaryKey = 'id_exam';
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'id_course');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
