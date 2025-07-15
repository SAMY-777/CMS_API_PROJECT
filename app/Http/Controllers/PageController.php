<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // 1️⃣ Create New Page
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $page = Page::create($data);

        return response()->json($page, 201);
    }

    // 2️⃣ Show All Pages
    public function index()
    {
        return response()->json(Page::all());
    }

    // 3️⃣ Show Single Page
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return response()->json($page);
    }

    // 4️⃣ Update Page
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $page->update($data);

        return response()->json($page);
    }

    // 5️⃣ Delete Page
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json(['message' => 'Page deleted successfully']);
    }
}
