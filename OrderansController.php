<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderansController extends Controller
{
    public function cari(Request $request){
        
        $search = $request->input('search');

        // Menyimpan nilai pencarian dalam session
        // Session::put('admin_search', $search);

        $cek = Order::where('order_date', $search)->first();

        // return view('admin.data-admin.data-admin', [
        //     "title" => "Data Admin",
        //     "search" => $search,
        //     "data_admin" => Admin::latest()->filter(['search' => $search])->paginate(9)->withQueryString()
        // ]);

        return response()->json([
            'status' => true,
            'data' => $cek
        ], 200);
    }
}
