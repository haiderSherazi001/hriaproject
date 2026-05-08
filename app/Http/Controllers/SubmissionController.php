<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::latest()->get();
        
        return view('report', compact('submissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'batch' => 'required|integer|digits:4',
            'job_role' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'skills' => 'required|string',
            'achievement' => 'required|string',
            'contributions' => 'required|array',
            'availability' => 'required|string|max:255',
            'seriousness' => 'required|string|max:255',
            'suggestions' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo_path'] = $path;
        }

        Submission::create($validated);

        return response()->json(['message' => 'Submission saved successfully!'], 200);
    }
}