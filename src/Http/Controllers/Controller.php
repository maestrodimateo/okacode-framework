<?php
namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Le layout du controller actuel
     */
    protected string $layout = 'frontend/master';
}
