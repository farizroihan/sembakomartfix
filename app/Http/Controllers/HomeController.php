<?php
namespace App\Http\Controllers;
use App\Models\{Product,Category};
use Illuminate\Http\Request;
class HomeController extends Controller {
 public function index(Request $r){$products=Product::with('category')->where('is_active',1)->when($r->filled('q'),fn($q)=>$q->where('name','like','%'.$r->q.'%'))->latest()->paginate(12)->withQueryString();$categories=Category::withCount(['products'=>fn($q)=>$q->where('is_active',1)])->orderBy('name')->get();$activeCategory=null;return view('home',compact('products','categories','activeCategory'));}
 public function show(Product $product){abort_unless($product->is_active,404);$product->load('category');return view('product',compact('product'));}
 public function category(Category $category){$products=$category->products()->with('category')->where('is_active',1)->latest()->paginate(12)->withQueryString();$categories=Category::withCount(['products'=>fn($q)=>$q->where('is_active',1)])->orderBy('name')->get();$activeCategory=$category;return view('home',compact('products','categories','activeCategory'));}
}
