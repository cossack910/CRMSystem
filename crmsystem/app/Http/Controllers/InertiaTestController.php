<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index'); //Pages配下のInertia/Index.vueが表示される
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id) {
        return Inertia::render('Inertia/Show', [
            'id' => $id
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->content;
        $inertiaTest->content = $request->title;
        $inertiaTest->save();

        return to_route('inertia.index')->with([
            'message' => '登録しました'
        ]);
    }
}
