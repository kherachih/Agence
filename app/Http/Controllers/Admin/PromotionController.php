<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'link_url' => 'nullable|url',
            'link_text' => 'nullable|string|max:100',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['background_color'] = $validated['background_color'] ?? '#dc3545';
        $validated['text_color'] = $validated['text_color'] ?? '#ffffff';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Promotion::create($validated);

        return redirect()->route('admin.promotion.index')
            ->with('success', __('Promotion created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'link_url' => 'nullable|url',
            'link_text' => 'nullable|string|max:100',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['background_color'] = $validated['background_color'] ?? '#dc3545';
        $validated['text_color'] = $validated['text_color'] ?? '#ffffff';

        $promotion->update($validated);

        return redirect()->route('admin.promotion.index')
            ->with('success', __('Promotion updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->route('admin.promotion.index')
            ->with('success', __('Promotion deleted successfully.'));
    }

    /**
     * Toggle promotion active status
     */
    public function toggleStatus(Promotion $promotion)
    {
        $promotion->update(['is_active' => !$promotion->is_active]);

        return redirect()->back()
            ->with('success', __('Promotion status updated successfully.'));
    }
}
