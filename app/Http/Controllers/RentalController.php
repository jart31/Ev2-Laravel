<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Client;
use App\Models\Vehicle;


use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
{
    $rentals = Rental::all();
    return view('rentals.index', ['rentals' => $rentals]);
}

public function create()
{
    return view('rentals.create');
}


}
