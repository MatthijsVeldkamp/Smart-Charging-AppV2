<?php

// Definieert de namespace voor deze controller
namespace App\Http\Controllers;

// Importeert de Request class van Laravel
use Illuminate\Http\Request;

// Controller class voor het toevoegen van sockets, erft van de basis Controller class
class AddSocketController extends Controller
{
    // Methode die de view voor het toevoegen van een socket weergeeft
    // Accepteert een $id parameter die wordt doorgegeven aan de view
    public function index($id)
    {
        // Retourneert de 'sockets.add' view met het meegegeven ID als parameter
        return view('sockets.add', ['id' => $id]);
    }
}
