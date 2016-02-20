<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use FRD\Order;
use FRD\Product;
use FRD\Tag;
use FRD\UserProfile;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    private $productModel;
    private $categoryModel;
    private $profileModel;

    public function __construct(Product $product, Category $category, UserProfile $profile)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->profileModel = $profile;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();
        $featuredProducts = $this->productModel->featured()->take(6)->get();
        $recommendedProducts = $this->productModel->recommend()->take(6)->get();

        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }

    public function category($id)
    {
        $categories = $this->categoryModel->all();
        $category = $this->categoryModel->find($id);
        $products = $this->productModel->ofCategory($id)->get();

        return view('store.category', compact('categories','category','products'));
    }

    public function product($id)
    {
        $categories = $this->categoryModel->all();
        $product = $this->productModel->find($id);

        return view ('store.product', compact('categories', 'product'));
    }

    public function tag($id, Tag $tag)
    {
        $categories = $this->categoryModel->all();
        $tag = $tag->findOrNew($id);
        $products = $tag->product_list;

        return view('store.tag', compact('categories','tag','products'));
    }

    public function userProfile()
    {
        return view('auth.user_profile');
    }

    public function userProfileStore(Request $request, $id)
    {

        $inputs = $request->all();
        $profile = $this->profileModel->fill($inputs);
        $profile->user_id = $id;

        $profile->save();

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            return redirect()->route('cart');
        }

        return redirect()->route('home');
    }

    public function orders()
    {
        $user = Auth::user();

        return view('store.orders', compact('user', 'categories'));
    }

    public function orderDetail($id)
    {
        $order = Auth::user()->orders()->find($id);

        return view('store.order-detail', compact('order'));
    }
}
