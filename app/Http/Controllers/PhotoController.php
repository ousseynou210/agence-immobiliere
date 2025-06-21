<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

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

