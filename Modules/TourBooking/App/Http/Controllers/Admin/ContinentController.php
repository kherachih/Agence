<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Modules\TourBooking\App\Models\Continent;
use Modules\TourBooking\App\Models\Destination;

final class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $continents = Continent::withCount('destinations')
            ->ordered()
            ->paginate(15);

        return view('tourbooking::admin.continents.index', compact('continents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tourbooking::admin.continents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:continents,slug|max:255',
            'code' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:100',
            'ordering' => 'nullable|integer',
        ]);

        // Handle image if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('continents', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['status'] = $request->has('status');
        $validated['ordering'] = $request->ordering ?? 0;

        Continent::create($validated);

        return redirect()->route('admin.tourbooking.continents.index')
            ->with('success', 'Continent created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Continent $continent): View
    {
        $continent->load(['destinations' => function ($query) {
            $query->withCount('services');
        }]);

        return view('tourbooking::admin.continents.show', compact('continent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Continent $continent): View
    {
        return view('tourbooking::admin.continents.edit', compact('continent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Continent $continent): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:continents,slug,' . $continent->id,
            'code' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:100',
            'ordering' => 'nullable|integer',
        ]);

        // Handle image if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($continent->image) {
                @unlink(storage_path('app/public/' . $continent->image));
            }

            $imagePath = $request->file('image')->store('continents', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['status'] = $request->has('status');
        $validated['ordering'] = $request->ordering ?? 0;

        $continent->update($validated);

        return redirect()->route('admin.tourbooking.continents.index')
            ->with('success', 'Continent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Continent $continent): RedirectResponse
    {
        // Check if there are any destinations associated with this continent
        if (Destination::where('continent_id', $continent->id)->exists()) {
            return redirect()->route('admin.tourbooking.continents.index')
                ->with('error', 'Cannot delete continent because it is being used by one or more destinations. Please reassign or delete the destinations first.');
        }

        // Delete image if exists
        if ($continent->image) {
            @unlink(storage_path('app/public/' . $continent->image));
        }

        $continent->delete();

        return redirect()->route('admin.tourbooking.continents.index')
            ->with('success', 'Continent deleted successfully.');
    }

    /**
     * Update the status of the continent.
     */
    public function updateStatus(Continent $continent): JsonResponse
    {
        $continent->update(['status' => !$continent->status]);

        $notify_message = trans('translate.Status updated');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');

        return response()->json($notify_message);
    }
}
