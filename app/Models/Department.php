<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    #[Fillable(['code', 'name'])]
    protected $fillable = ['code', 'name'];
    
}
