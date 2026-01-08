<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class AdminManageMenuController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $menuItems  = MenuItem::with('category')->get();

        return view('admin.menu.index', compact('categories', 'menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'main_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'category_id']));

        // Main image
        if ($request->hasFile('main_image')) {
            $fileName = time() . '_main.' . $request->main_image->extension();
            $request->main_image->move(public_path('images/menu'), $fileName);
            $menuItem->main_image = $fileName;
        }

        // Gallery images
        if ($request->hasFile('gallery_images')) {
            $gallery = [];
            foreach ($request->file('gallery_images') as $index => $image) {
                $fileName = time() . "_g{$index}." . $image->extension();
                $image->move(public_path('images/menu'), $fileName);
                $gallery[] = $fileName;
            }
            $menuItem->gallery_images = json_encode($gallery);
        }

        $menuItem->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item added.');
    }

    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'main_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menuItem->fill($request->only(['name', 'description', 'price', 'category_id']));

        // Update main image
        if ($request->hasFile('main_image')) {
            if ($menuItem->main_image && file_exists(public_path('images/menu/' . $menuItem->main_image))) {
                unlink(public_path('images/menu/' . $menuItem->main_image));
            }
            $fileName = time() . '_main.' . $request->main_image->extension();
            $request->main_image->move(public_path('images/menu'), $fileName);
            $menuItem->main_image = $fileName;
        }

        // Update gallery images (replace old ones)
        if ($request->hasFile('gallery_images')) {
            // Delete old images
            if ($menuItem->gallery_images) {
                foreach (json_decode($menuItem->gallery_images) as $oldImage) {
                    if (file_exists(public_path('images/menu/' . $oldImage))) {
                        unlink(public_path('images/menu/' . $oldImage));
                    }
                }
            }

            $gallery = [];
            foreach ($request->file('gallery_images') as $index => $image) {
                $fileName = time() . "_g{$index}." . $image->extension();
                $image->move(public_path('images/menu'), $fileName);
                $gallery[] = $fileName;
            }
            $menuItem->gallery_images = json_encode($gallery);
        }

        $menuItem->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated.');
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        // Delete main image
        if ($menuItem->main_image && file_exists(public_path('images/menu/' . $menuItem->main_image))) {
            unlink(public_path('images/menu/' . $menuItem->main_image));
        }

        // Delete gallery images
        if ($menuItem->gallery_images) {
            foreach (json_decode($menuItem->gallery_images) as $image) {
                if (file_exists(public_path('images/menu/' . $image))) {
                    unlink(public_path('images/menu/' . $image));
                }
            }
        }

        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted.');
    }
}
