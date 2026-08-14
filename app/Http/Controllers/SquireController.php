<?php

namespace App\Http\Controllers;

use App\Models\Squire;
use App\Models\Knight;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SquireController extends Controller
{
    /**
     * Display a listing of squires with search and training filter.
     */
    public function index(Request $request): View
    {
        $search = trim($request->input('search', ''));

        $trainingLevel = $request->input('training_level', '');

        $squires = Squire::with('knight')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhereHas('knight', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->when(
                in_array($trainingLevel, [
                    'beginner',
                    'intermediate',
                    'advanced',
                ]),
                function ($query) use ($trainingLevel) {
                    $query->where(
                        'training_level',
                        $trainingLevel
                    );
                }
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('squires.index', compact(
            'squires',
            'search',
            'trainingLevel'
        ));
    }

    /**
     * Show form to create a new squire.
     */
    public function create(): View
    {
        $knights = Knight::orderBy('name')->get();

        return view('squires.create', compact('knights'));
    }

    /**
     * Store a newly created squire.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:30',
            'training_level' => 'required|in:beginner,intermediate,advanced',
            'knight_id' => 'required|exists:knights,id',
        ]);

        Squire::create($validated);

        return redirect()
            ->route('squires.index')
            ->with('success', 'Squire assigned successfully!');
    }

    /**
     * Display a specific squire.
     */
    public function show(Squire $squire): View
    {
        $squire->load('knight');

        return view('squires.show', compact('squire'));
    }

    /**
     * Show form to edit a squire.
     */
    public function edit(Squire $squire): View
    {
        $knights = Knight::orderBy('name')->get();

        return view('squires.edit', compact('squire', 'knights'));
    }

    /**
     * Update a squire.
     */
    public function update(
        Request $request,
        Squire $squire
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:30',
            'training_level' => 'required|in:beginner,intermediate,advanced',
            'knight_id' => 'required|exists:knights,id',
        ]);

        $squire->update($validated);

        return redirect()
            ->route('squires.index')
            ->with('success', 'Squire updated successfully!');
    }

    /**
     * Delete a squire.
     */
    public function destroy(Squire $squire): RedirectResponse
    {
        $squire->delete();

        return redirect()
            ->route('squires.index')
            ->with('success', 'Squire dismissed successfully!');
    }
}