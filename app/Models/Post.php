<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'title',
        'description',
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    /*
    - if you want to change the name of the function from user to user_creator for example you need to add the 
    foreign key 
 there :

     public function user(){
        return $this->belongsTo(User::class,user_id);
    }

    */
}
