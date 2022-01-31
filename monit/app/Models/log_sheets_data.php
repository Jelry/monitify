<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_sheets_data extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','log_sheet_id','date_claimed','date_submitted','claim_status','submission_status'];
}
