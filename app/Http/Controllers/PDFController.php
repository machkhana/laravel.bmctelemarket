<?php

namespace App\Http\Controllers;
use App\Model\ClientHasFamily;
use App\Model\Interes;
use App\Model\Position;
use App\User;
use App\Model\City;
use App\Model\Client;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    protected $clients;
    protected $cities;
    protected $users;
    protected $intereses;
    protected $positions;
    protected $clienthasfamily;

    public function __construct()
    {
        $this->clients = new Client();
        $this->cities = new City();
        $this->intereses = new Interes();
        $this->positions = new Position();
        $this->clienthasfamily = new ClientHasFamily();
        $this->users = new User();
    }
    public function getPdf($id=null)
    {
        $client = $this->clients->find($id);
//        $invoice = PDF::loadView('pdf.pdf_bill',$client);
//        return $invoice->stream();

        $pdf = PDF::loadView('pdf.invoice', $client)->setPaper('A4');
        return $pdf->download('invoice.pdf');

    }
}
