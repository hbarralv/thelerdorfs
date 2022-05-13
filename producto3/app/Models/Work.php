<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'works';
    protected $fillable = ['id_class', 'id_student',    'name',    'mark', 'date'];
    protected $primaryKey = 'id_work';

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'id_class');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
