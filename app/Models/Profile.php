<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','email','password','bio','image'];
    public function getRouteKeyName(){
        return 'id';
    }
    public function getImageAttribute($value){
        return $value??'profile/undefined.jpg';
    }
    public function getPublications() {
        return $this->hasMany(Publication::class);
    }
}
