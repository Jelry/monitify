<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weeklog extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','logweek_id','subject_id','claim_status','submission_status','online_claiming_status','online_submission_status'];
  

}
