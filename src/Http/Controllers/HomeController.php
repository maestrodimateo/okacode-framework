<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\RequestHandler\Request;
use App\Http\RequestHandler\Response;

class HomeController extends Controller
{
    /**
     * Page d'accueil
     *
     * @return void
     */
    public function index()
    {
        $name = "noel";
        return Response::render('frontend/form', compact('name'), $this->layout);
    }

    public function post(Request $request, int $id)
    {
        echo "le chemin est {$request->getPath()}, l'identifiant est: $id";
    }

    /**
     * Soummet le formulaire
     *
     * @param Request $request
     * 
     * @return void
     */
    public function getData(Request $request)
    {
        return Response::redirect('/');
    }

    public function contact()
    {
        return Response::render('frontend/complete');
    }
}
