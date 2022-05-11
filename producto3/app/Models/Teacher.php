<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';
    protected $fillable = ['email', 'name', 'surname', 'telephone', 'nif' , 'pass'];
    protected $hidden = [
        'pass',
    ];

    protected $primaryKey = 'id_teacher';
}
