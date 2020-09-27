<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'link',
        'body',
    ];


    protected $hidden = [
        'is_public',
        'user_id',
    ];



   public $timestamps = true;   
    
   protected $table = 'notes';



 public function user()
    {
        return $this->belongsTo('App\User');
    }




}
