<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Getmymessages extends Controller
{
    public function index(){
        $indexmessage = "redirect()->route('cleints.index')->with('error',__('მომხმარებელს არ ააქვს ნახვის უფლება'))";
        return $indexmessage;
    }
}
