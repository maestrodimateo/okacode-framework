<?php
namespace App\Http\Controllers;

use App\Http\RequestHandler\Request;
use App\Http\RequestHandler\Response;

class HomeController
{
    public function index()
    {
        $name = "noel";
        return Response::render('form', compact('name'));
    }

    public function post(Request $request, int $id)
    {
        echo "le chemin est {$request->getPath()}, l'identifiant est: $id";
    }

    /**
     * soumet le formulaire
     *
     * @param Request $request
     * @return void
     */
    public function getData(Request $request)
    {
        echo "<pre>";
        var_dump($request->getBody());
        echo "</pre>";

        return Response::redirect('/');
    }
}