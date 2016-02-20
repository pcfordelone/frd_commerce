<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use FRD\Product;
use FRD\ProductImage;
use FRD\Tag;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Requests\ProductRequest;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $productModel;
    private $tagModel;

    public function __construct(Product $product, Tag $tag)
    {
        $this->productModel = $product;
        $this->tagModel = $tag;
    }

    public function index()
    {
        $products = $this->productModel->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();

        $productTags = $this->prepareTags($request->get('tags'));
        $product->tags()->sync($productTags);

        return redirect()->route('products.index');
    }

    public function edit($id, Category $category)
    {
        $product = $this->productModel->findOrNew($id);
        $categories = $category->lists('name','id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id, Tag $tag = null)
    {
        $product = $this->productModel->findOrNew($id);
        $input = $request->all();

        if (!isset($input['featured'])) {
            $input['featured'] = 0;
        }
        if (!isset($input['recommend'])) {
            $input['recommend'] = 0;
        }

        $product->update($input, $id);

        $productTags = $this->prepareTags($request->get('tags'));
        $product->tags()->sync($productTags);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = $this->productModel->findOrNew($id);
        $images = $product->images;

        if (!is_null($images)) {
            foreach($images as $image) {
                if (Storage::disk('s3')->exists($image->id . '.' . $image->extension)) {
                    Storage::disk('s3')->delete($image->id . '.' . $image->extension);
                }
            }
        }

        $this->productModel->findOrNew($id)->delete();

        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->productModel->findOrNew($id);

        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->findOrNew($id);

        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));
//        Storage::disk('s3')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->findOrNew($id);

        /*if (Storage::disk('s3')->exists($image->id . '.' . $image->extension)) {
            Storage::disk('s3')->delete($image->id . '.' . $image->extension);
        }*/

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id'=>$product->id]);
    }

    public function prepareTags($tags_input)
    {
        $tags = array_filter(array_map('trim', explode(',', $tags_input)));

        foreach($tags as $t) {
            $tag = $this->tagModel->firstOrCreate(['name'=>$t]);
            $productTags[] = $tag->id;
        }

        return $productTags;
    }
    
}
