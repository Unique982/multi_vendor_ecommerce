<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    Use HasFactory;
    protected $table = 'vendors';
  

    protected $fillable = ['user_id','shop_name','shop_description','logo','banner','phone','address'
,'status'];

public function user(){
    return $this->belongsTo(User::class);
}
}
