<?php

namespace App\Http\Controllers;

use App\Models\Knight;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KnightController extends Controller
{
    /**
     * Display a listing of knights
     */
    public function index(): View
    {
        $knights = Knight::with('squires')->latest()->paginate(10);
        return view('knights.index', compact('knights'));
    }

    /**
     * Show form to create a new knight
     */
    public function create(): View
    {
        return view('knights.create');
    }

    /**
     * Store a newly created knight
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100',
            'title' => 'nullable|string|max:255',
            'weapon' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0|max:70',
        ]);

        Knight::create($validated);

        return redirect()->route('knights.index')
            ->with('success', 'Knight created successfully!');
    }

    /**
     * Display a specific knight
     */
    public function show(Knight $knight): View
    {
        return view('knights.show', compact('knight'));
    }

    /**
     * Show form to edit a knight
     */
    public function edit(Knight $knight): View
    {
        return view('knights.edit', compact('knight'));
    }

    /**
     * Update a knight
     */
    public function update(Request $request, Knight $knight): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100',
            'title' => 'nullable|string|max:255',
            'weapon' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0|max:70',
        ]);

        $knight->update($validated);

        return redirect()->route('knights.index')
            ->with('success', 'Knight updated successfully!');
    }

    /**
     * Delete a knight
     */
    public function destroy(Knight $knight): RedirectResponse
    {
        $knight->delete();

        return redirect()->route('knights.index')
            ->with('success', 'Knight deleted successfully!');
    }
}