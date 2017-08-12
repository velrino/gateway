<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Validator;
use App\Models\ValidatorModel;

class Users extends Eloquent
{
  protected $collection = 'Users';
  
  protected $primaryKey = 'fake_id'; 
}
