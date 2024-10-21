<?php

namespace App\Http\Controllers;

use App\Models\PublicCategoryGroup;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PublicCategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $publicCategoryGroups = PublicCategoryGroup::all();
        return response()->json($publicCategoryGroups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'slug' => 'required|string|max:55',
            'description' => 'sometimes|string|max:255'
        ]);

        $publicCategoryGroup = PublicCategoryGroup::create($validatedData);
        return response()->json($publicCategoryGroup, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param PublicCategoryGroup $publicCategoryGroup
     * @return JsonResponse
     */
    public function show(PublicCategoryGroup $publicCategoryGroup): JsonResponse
    {
        return response()->json($publicCategoryGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PublicCategoryGroup $publicCategoryGroup
     * @return JsonResponse
     */
    public function update(Request $request, PublicCategoryGroup $publicCategoryGroup): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:55',
            'slug' => 'required|string|max:55',
            'description' => 'sometimes|string|max:255'
        ]);

        $publicCategoryGroup->update($validatedData);
        return response()->json($publicCategoryGroup);
    }

    /**
     * Remove the specified resource from storage.
     * @param PublicCategoryGroup $publicCategoryGroup
     * @return JsonResponse
     */
    public function destroy(PublicCategoryGroup $publicCategoryGroup): JsonResponse
    {
        $publicCategoryGroup->delete();
        return response()->json(null, 204);
    }
}
