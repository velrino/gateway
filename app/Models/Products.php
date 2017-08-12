<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Validator;
use App\Models\ValidatorModel;

class Products extends Eloquent
{
  protected $collection = 'Products';
  
  protected $primaryKey = 'fake_id'; 
}
