<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $fillable = ['username', 'pass', 'email', 'name', 'surname', 'telephone', 'nif'];
    protected $hidden = [
        'pass',
    ];

    protected $primaryKey = 'id';
}
