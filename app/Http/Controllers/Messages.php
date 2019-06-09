<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Messages extends Controller
{
    public function indexmessage(){
        $indexmessage = "redirect()->route('cleints.index')->with('error',__('მომხმარებელს არ ააქვს ნახვის უფლება'))";
        return $indexmessage;
    }

}
