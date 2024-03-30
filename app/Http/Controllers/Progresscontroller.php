<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgressRequest;
use App\Http\Resources\ProgressResource;
use App\Models\Progress;
use Illuminate\Http\Request;

class Progresscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProgressResource::collection(Progress::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgressRequest $request)
    {
        $progress =  Progress::create([
            ...$request->validated(), 'user_id' => $request->user()->id
        ]);

        return  new ProgressResource($progress);
    }

    /**
     * Display the specified resource.
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        $udateProgress =  $progress->update([
            ...$request->validated()
        ]);

        return  new ProgressResource($udateProgress);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();

        return response()->json(["message" => "progress detlete  "]);
    }
}
