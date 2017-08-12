<?php

namespace App\Interfaces;

interface CRUDInterface
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function list();
     public function get();
     public function create();
     public function update();
     public function delete();
}
