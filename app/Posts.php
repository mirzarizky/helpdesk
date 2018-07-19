<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  use Searchable;
  public $asYouType = true;


  public function toSearchableArray()
  {
      $array = $this->toArray();

      // Customize array...

      return $array;
  }
}
