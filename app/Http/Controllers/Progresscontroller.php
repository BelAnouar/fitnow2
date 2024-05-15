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
        return Progress::with('user')->where("userId", Auth::user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgressRequest $request)
    {
        Progress::create([
            ...$request->validated(), 'userId' => Auth::user()->id
        ]);

        return response()->json([
            'message' => 'Success',

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $progress = Progress::find($id);
       return  response()->json($progress);
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

    public function updateStatus(string $id)
    {


        $progress = Progress::find($id);

        $success = $progress->update([
            'status' => 'terminé',
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
    public function destroy(string $id)
    {
     $progress=  Progress::find($id);
     $progress->delete();
        return response()->json(["message" => "progress deleted"]);
    }
}
