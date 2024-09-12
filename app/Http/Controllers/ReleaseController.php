<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ReleaseController extends Controller
{
    public function index()
    {
        return Inertia::render('Release', [
            'title' => 'Release Notes',
            'releases' => config('release')
        ]);
    }

}
