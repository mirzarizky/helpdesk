<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Topics extends Model
{

  protected $guarded = [];
  protected $table = 'posts_reaction';
  protected $fillable = ['posts_id','type','ip_addres','location'];

  
}
