<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index'); //Pages配下のInertia/Index.vueが表示される
    }

    public function show($id) {
        return Inertia::render('Inertia/Show', [
            'id' => $id
        ]);
    }
}
