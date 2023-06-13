<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UnderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function admin(Request $request) {
        $categories = Category::all();
        $underCategories = UnderCategory::all(); 
        $products = Product::all(); 
        return view('admin/admin', [
            'categories' => $categories,
            'underCategories' => $underCategories,
            'products' => $products
        ]);
    }

    public function store(Request $request) {
        $type = $request->type;
        
        if ($type == 'category') {
            $form = $request -> validate([
                'title' => ['required', 'min:3']
            ]);

            $category = Category::create([
                'title' => $form['title']
            ]);

            return redirect('/admin');
        } elseif ($type == 'under_category') {
            $form = $request -> validate([
                'title' => ['required', 'min:3'],
                'category_id' => ['required'],
            ]);

            $category = UnderCategory::create([
                'title' => $form['title'],
                'category_id' => $form['category_id']
            ]);

            return redirect('/admin');
        } elseif ($type == 'product') {
            $form = $request -> validate([
                'title' => ['required', 'min:4'],
                'under_category_id' => ['required'],
                'description' => ['required'],
                'price' => ['required'],
            ]);

            $image = $request->image;
            $imageName = Str::random(32).'.'.$image->getClientOriginalName(); 

            $product = Product::create([
                'title' => $form['title'],
                'slug' => implode('-', explode(' ', strtolower($form['title']))),
                'image' =>$imageName,
                'user_id' => Auth::user()->id,
                'under_category_id' =>$form['under_category_id'],
                'description' => $form['description'],
                'price' => $form['price'],
            ]);

            $path = public_path('uploads/');
            $image->move($path, $imageName);

            return redirect('/');
        } elseif ($type == 'delete_under_category') {
            $category = UnderCategory::find($request->category_id);
            

            if ($category) {
                $category->delete();
                return redirect('/admin');
            }
        } elseif ($type == 'delete_category') {
            $category = Category::find($request->category_id);

            if ($category) {
                $category->delete();
                return redirect('/admin');
            }
        } elseif ($type == 'delete_product') {
            $product = Product::find($request->product_id);

            if ($product) {
                $product->delete();
                return redirect('/admin');
            }
        }
     }
}
