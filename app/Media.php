<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
     protected $table = 'media';

     public $primaryKey ='media_id';


     public function media_type()
	 {
       return $this->belongsTo('App\Media_Type', 'media_type_id', 'media_type_id');
	 }
}
