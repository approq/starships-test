<?php

namespace App\Http\Controllers;

use App\Models\Starship;

class StarshipController extends Controller
{
    public function index()
    {
        $starships = Starship::with('pilots')
            ->orderByDesc('max_atmosphering_speed')
            ->limit(15);

        return view('starships', [
            'fastestStarship' => $starships->clone()->first(),
            'starships' => $starships->get()
        ]);
    }
}
