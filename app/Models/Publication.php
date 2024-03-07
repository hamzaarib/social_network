<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['titre','body','image','profile_id'];
    public function getProfile(){
        return $this->belongsTo(Profile::class,'profile_id','id');
    }
}
