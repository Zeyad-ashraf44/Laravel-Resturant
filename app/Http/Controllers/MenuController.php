<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;

class MenuController extends Controller
{
    public function index(Request $request, $categoryId = null)
{
    $categories = Category::all();

    $selectedCategory = $categoryId === 'all' ? 'all' : (int) $categoryId;

    if ($selectedCategory && $selectedCategory !== 'all') {
        $menuItems = MenuItem::where('category_id', $selectedCategory)->get();
    } else {
        $menuItems = MenuItem::all();
    }

    return view('menu.index', compact('menuItems', 'categories', 'selectedCategory'));
}

}
