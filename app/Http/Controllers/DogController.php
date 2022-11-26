<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDogRequest;
use App\Models\Dog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $dogs = Dog::with('breed')->get();

        return response()->json($dogs->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDogRequest $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'hair_color' => 'required',
            'size' => 'required|in:small,medium,large',
            'breed_id' => 'required|exists:breeds,id',
            'file' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $file = $request->file('file');
        $name = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/pictures', $name);

        Dog::create([
            'breed_id' => $request->breed_id,
            'name' => $request->name,
            'hair_color' => $request->hair_color,
            'size' => $request->size,
            'file_path' => '/storage/pictures/' . $name
        ]);

        return response()->json(['message' => 'Dog created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $dog = Dog::with('breed')->find($id);

        if (!$dog) // Custom not found exception message
            abort(404, 'Dog not found.');

        return response()->json($dog->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
