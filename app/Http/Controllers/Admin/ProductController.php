<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Product,Category};use Illuminate\Http\Request;use Illuminate\Support\Str;
class ProductController extends Controller {
 public function dashboard(){return view('admin.dashboard',['products'=>Product::count(),'orders'=>\App\Models\Order::count()]);}
 public function index(){$products=Product::with('category')->paginate(15);return view('admin.products',compact('products'));}
 public function create(){$categories=Category::all();return view('admin.form',compact('categories'));}
 public function store(Request $r){$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|integer|min:1','stock'=>'required|integer|min:0']);$d['slug']=Str::slug($d['name']).'-'.Str::random(4);Product::create($d);return redirect()->route('admin.produk.index')->with('success','Produk ditambahkan.');}
 public function edit(Product $produk){$product=$produk;$categories=Category::all();return view('admin.form',compact('product','categories'));}
 public function update(Request $r,Product $produk){$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|integer|min:1','stock'=>'required|integer|min:0']);$d['slug']=Str::slug($d['name']).'-'.Str::random(4);$produk->update($d);return redirect()->route('admin.produk.index');}
 public function destroy(Product $produk){$produk->delete();return back();}
}