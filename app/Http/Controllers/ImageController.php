<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $filename);

            
            $imageRecord = new Image();
            $imageRecord->filename = 'images/' . $filename;  
            $imageRecord->save();

            return response()->json(['path' => $imageRecord->filename], 201);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
