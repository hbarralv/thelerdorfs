<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ADmin extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_admin';
    protected $fillable = ['username', 'name', 'email', 'pass'];
    protected $primaryKey = 'id_user_admin';
}
