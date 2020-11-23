<?php
namespace App\Http\Controllers;

use App\Http\RequestHandler\Request;

class HomeController
{
    public function index()
    {
        echo "Je suis dans la home";
    }

    public function post(Request $request, int $id)
    {
        echo "le chemin est {$request->getPath()}, l'identifiant est: $id";
    }
}