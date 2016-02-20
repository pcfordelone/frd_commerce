<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use Illuminate\Http\Request;
use FRD\Http\Requests\CategoryRequest as CategoryRequest;
use FRD\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->category->fill($input);
        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->findOrNew($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->category->findOrNew($id)->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Destroy category.
     */
    public function destroy($id)
    {
        $this->category->findOrNew($id)->delete();

        return redirect()->route('categories.index');
    }
}
