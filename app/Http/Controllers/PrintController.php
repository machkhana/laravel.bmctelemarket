<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    protected $clients;
    public function __construct()
    {
        $this->clients = new Client();
    }
    public function contract(int $id){
        $client = $this->clients->find($id);
        return view('print.contract')
            ->with('client', $client);
    }
    public function appendix(int $id){
        $client = $this->clients->find($id);
        return view('print.appendix')
            ->with('client', $client);
    }
}
