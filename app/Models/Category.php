<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    Use HasFactory;
    protected $table = 'categories';
    protected $fillable =['name','slug','parent_id'];

    public function parent(){
        return 
        $this->belongsTo(Category::class,'parent_id');
    }
    public function childern(){
        return 
        $this->hasMany(Category::class,'parent_id');
    }

}
