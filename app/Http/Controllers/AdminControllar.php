<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminControllar extends Controller
{
 public function adminDashboard(){
  $data= Auth::user();

    return view("admin.dashboard",compact("data"));
 }
}
