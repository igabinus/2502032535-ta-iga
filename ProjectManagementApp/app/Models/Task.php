<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table ='TASKS';
    protected $primaryKey='id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'project_id',
        'user_id'
    ];

}
