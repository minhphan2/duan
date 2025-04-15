<?php
namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $result_bsn = DB::table('sanpham')->where('LoaiSP', 'BSN')->get();
        $result_bne = DB::table('sanpham')->where('LoaiSP', 'BNE')->get();
        $result_pkb = DB::table('sanpham')->where('LoaiSP', 'PKB')->get();


        return view('sanpham', compact( 'result_bsn', 'result_bne', 'result_pkb'));
    }

}
?>