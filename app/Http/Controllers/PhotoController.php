<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'annonce_id' => 'required|exists:annonces,id',
            'chemin' => 'required|string',
        ]);

        $photo = Photo::create($request->all());

        return response()->json($photo, 201);
    }
}

