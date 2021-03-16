<?php

namespace App;
use App\teacher;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
 public function teacher()
    {
        

        return $this->belongsTo(teacher::class);

    }
}
