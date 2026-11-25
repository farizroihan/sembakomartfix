<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\Order;use Illuminate\Http\Request;use Illuminate\Support\Facades\DB;
class OrderController extends Controller {
 public function index(){$orders=Order::with('items')->latest()->paginate(20);return view('admin.orders',compact('orders'));}
 public function status(Request $r,Order $order){$d=$r->validate(['status'=>'required|in:Menunggu konfirmasi,Dikonfirmasi,Diproses,Dikirim,Selesai,Dibatalkan']);DB::transaction(function()use($order,$d){$order=Order::with('items')->lockForUpdate()->findOrFail($order->id);$wasCancelled=$order->status==='Dibatalkan';$willCancel=$d['status']==='Dibatalkan';if(!$wasCancelled&&$willCancel){foreach($order->items as $item){if($item->product_id){$p=\App\Models\Product::lockForUpdate()->find($item->product_id);if($p)$p->increment('stock',$item->quantity);}}}$order->update($d);});return back()->with('success','Status pesanan diperbarui.');}
}
