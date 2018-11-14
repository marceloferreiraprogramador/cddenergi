<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {

   public static function insertData($data){


         DB::table('geracoes')->insert($data);
      }


}
