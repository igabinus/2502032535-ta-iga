<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table ='PROJECTS';
    protected $primaryKey='id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'status_id'
    ];

}
