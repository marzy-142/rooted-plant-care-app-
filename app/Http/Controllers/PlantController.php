<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class PlantController extends Controller
{
public function index()
{
    $plants = Plant::all(); // Fetch all plants from the database
    return view('plants.index', compact('plants'));
}



    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'watering_interval' => 'required|integer',
            'fertilizing_interval' => 'nullable|integer',
            'care_tips' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Create a new plant
        $plant = new Plant();
        $plant->name = $request->name;
        $plant->type = $request->type;
        $plant->watering_interval = $request->watering_interval;
        $plant->fertilizing_interval = $request->fertilizing_interval;
        $plant->care_tips = $request->care_tips;
    
        // Handle picture upload
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('plants', 'public'); // Store in 'public/plants'
            $plant->picture = $path; // Store the full path in the database
        }
    
        // Save the plant to the database
        $plant->save();
    
        // Redirect to the plant index page
        return redirect()->route('plants.index')->with('success', 'Plant added successfully');
    }

    
    
    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'watering_interval' => 'required|integer',
            'fertilizing_interval' => 'nullable|integer',
            'care_tips' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists
            if ($plant->picture) {
                Storage::disk('public')->delete($plant->picture);
            }
            $validated['picture'] = $request->file('picture')->store('plants', 'public'); // Store in 'public/plants'
        } else {
            // If no new picture is uploaded, keep the old one
            unset($validated['picture']);
        }
    
        $plant->update($validated);
        return redirect()->route('plants.index')->with('success', 'Plant updated successfully!');
    }

    public function destroy(Plant $plant)
    {
        // Delete the picture file if it exists
        if ($plant->picture) {
            Storage::disk('public')->delete($plant->picture);
        }

        $plant->delete();
        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully!');
    }
}