<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Reservation;
use App\models\Produit;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function index(){
        $reservation = Reservation::all();

        return response()->json([
            'reservation' => $reservation
        ]);
    }

    public function store(ReservationRequest $request){

        $produit = Produit::find($request->produit_id);

        $resevation = Reservation::create([
            'quantite' => $request->quantite,
            'statuts' => 'en attente',
            'prixTotal' => $request->quantite * $produit->prix,
            'produit_id' => $request->produit_id,
            'client_id' => auth('api')->id()
        ]);

        return response()->json([
            'message' => 'reservation succees',
            'reservation' => $resevation
        ]);
    }
}
