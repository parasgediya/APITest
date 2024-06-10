<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\DataSubmitJob;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    public function submission(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:submissions,email',
            'message' => 'required|string'
        ]);
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 400);
        }

        DataSubmitJob::dispatch($request->all());
        return response()->json(['message' => 'Submission is being processed'], 200);
    }
}
