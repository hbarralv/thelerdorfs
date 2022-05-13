<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';
    protected $fillable = ['name', 'description', 'date_start', 'date_end', 'active'];
    protected $primaryKey = 'id_course';
}
