<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $breeds = Breed::get();

        return response()->json($breeds->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $breed = Breed::find($id);

        if (!$breed) // Custom not found exception message
            abort(404, 'Breed not found.');

        return response()->json($breed->toArray());
    }
}
