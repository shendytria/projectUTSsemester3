<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.mmenu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.mmenu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'nullable|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|string|max:255',
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.mmenu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'nullable|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|string|max:255',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.mmenu.index')->with('success', 'Menu deleted successfully.');
    }
}
