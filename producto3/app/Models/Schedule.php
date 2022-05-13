<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    // id_schedule	id_class	time_start	time_end	day

    protected $table = 'schedule';
    protected $fillable = ['id_class', 'time_start', 'time_end', 'day'];
    protected $primaryKey = 'id_schedule';
}
