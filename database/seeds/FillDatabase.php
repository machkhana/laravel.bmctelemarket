<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Position;
class FillDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create positions
        Position::create(['pos_name' => 'ხელოსანი']);
        Position::create(['pos_name' => 'დიზაინერი']);
        Position::create(['pos_name' => 'არქიტექტორი']);
        Position::create(['pos_name' => 'ხელოსანთა კლუბი']);
        Position::create(['pos_name' => 'პროექტები']);
    }
}
