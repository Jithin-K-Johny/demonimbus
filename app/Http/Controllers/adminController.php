<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function checkPassword(Request $request) 
  {
      return $this->manager->checkPassword($request);
  }
}
