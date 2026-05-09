<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $filterOptions = [
            'cities' => Submission::select('city')->distinct()->pluck('city')->sort(),
            'batches' => Submission::select('batch')->distinct()->pluck('batch')->sortDesc(),
            'statuses' => Submission::select('status')->distinct()->pluck('status')->sort(),
        ];

        $query = Submission::query();

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }
        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $submissions = $query->latest()->get();

        $timeframe = $request->timeframe ?? 'monthly'; 

        $chartData = $submissions->sortBy('created_at')->groupBy(function($item) use ($timeframe) {
            if ($timeframe == 'yearly') return $item->created_at->format('Y');
            if ($timeframe == 'monthly') return $item->created_at->format('M Y');
            return $item->created_at->format('M d'); 
        })->map->count(); 

        $chartLabels = $chartData->keys();
        $chartValues = $chartData->values();

        $topCity = $submissions->countBy('city')->sortDesc()->keys()->first() ?? 'N/A';
        $topBatch = $submissions->countBy('batch')->sortDesc()->keys()->first() ?? 'N/A';
        $topContribution = $submissions->pluck('contributions')->flatten()->countBy()->sortDesc()->keys()->first() ?? 'N/A';

        $stats = [
            'total' => $submissions->count(),
            'students' => $submissions->where('status', 'Student')->count(),
            'professionals' => $submissions->whereIn('status', ['Employed', 'Business Owner', 'Freelancer','Other'])->count(),
            'ready_to_contribute' => $submissions->where('seriousness', 'Yes, I am ready to contribute actively')->count(),
            'top_city' => $topCity,
            'highly_available' => $submissions->whereIn('availability', ['Weekly', 'Monthly'])->count(),
            'top_contribution' => $topContribution,
            'top_batch' => $topBatch,
            'other_status' => $submissions->where('status', 'Other')->count(),
        ];
        
        return view('report', compact('submissions', 'stats', 'filterOptions', 'chartLabels', 'chartValues', 'timeframe'));    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'batch' => 'required|integer|digits:4',
            'job_role' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'achievement' => 'nullable|string',
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