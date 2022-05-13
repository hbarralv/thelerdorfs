<?php

namespace App\Models;

use App\Http\Controllers\CoursesController;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // id_class	id_teacher	id_course	id_schedule	name	color

    protected $table = 'class';
    protected $fillable = ['id_teacher', 'id_course', 'id_schedule', 'name', 'color'];
    protected $primaryKey = 'id_class';

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class, 'id_course');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id_schedule');
    }
}
