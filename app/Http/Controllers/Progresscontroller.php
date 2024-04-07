<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgressRequest;
use App\Http\Resources\ProgressResource;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Progresscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProgressResource::collection(Progress::with('user')->where("user_id", Auth::user()->id)->get());
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
    public function update(ProgressRequest $request, string $id)
    {
        $progress = Progress::find($id);
        $progress->update([
            ...$request->validated()
        ]);

        return response()->json($progress);
    }

    public function updateStatus(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        $progress = Progress::find($id);

        $success = $progress->update([
            'status' => $validatedData['status'],
        ]);

        if ($success) {
            $data = [
                'message' => $progress
            ];
            return response()->json($data, 200);
        }
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
