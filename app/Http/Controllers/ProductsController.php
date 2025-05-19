<?php
namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\AbstractCursorPaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductsController extends Controller
{
    public function index()
    {
        $result_bsn = DB::table('sanpham')->where('LoaiSP', 'BSN')->get();
        $result_bne = DB::table('sanpham')->where('LoaiSP', 'BNE')->get();
        $result_pkb = DB::table('sanpham')->where('LoaiSP', 'PKB')->get();


        return view('sanpham', compact( 'result_bsn', 'result_bne', 'result_pkb'));
    }

    public function banhsinhnhat(Request $request){
        
        $limit = 1;


        $products = ProductsModel::where('LoaiSP', 'BSN')->paginate($limit);
       

        return view('banhsinhnhat', [
            'products' => $products,
            'page' => $products->currentPage(), // Trang hiện tại
            'totalPages' => $products->lastPage(),
            
        ]);
    }  

    public function banhnuae(Request $request){
        $limit = 1;

        $products = ProductsModel::where('LoaiSP', 'BNE')->paginate($limit);
       

        return view('banhnuae', [
            'products' => $products,
            'page' => $products->currentPage(), // Trang hiện tại
            'totalPages' => $products->lastPage(),
            
        ]);
    }

    public function phukienbanh(Request $request){
        $limit = 4;

        $products = ProductsModel::where('LoaiSP', 'PKB')->paginate($limit);
       

        return view('phukienbanh', [
            'products' => $products,
            'page' => $products->currentPage(), // Trang hiện tại
            'totalPages' => $products->lastPage(),
            
        ]);
    }

    public function BanhsinhnhatAjax(Request $request)
{
    $page = $request->input('page', 1);
    $limit = 1;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'BSN');
    $total = $query->count();
    $products = $query->offset($offset)->limit($limit)->get();
    $totalPages = ceil($total / $limit);

    $view = view('sanpham.ajax_banhsinhnhat', compact('products'))->render();

    return response()->json([
        'html' => $view,
        'totalPages' => $totalPages,
    ]);
}

public function BanhnuaeAjax(Request $request){
    $page = $request->input('page', 1);
    $limit = 1;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'BNE');
    $total = $query->count();
    $products = $query->offset($offset)->limit($limit)->get();
    $totalPages = ceil($total / $limit);

    $view = view('sanpham.ajax_banhnuae', compact('products'))->render();

    return response()->json([
        'html' => $view,
        'totalPages' => $totalPages,
    ]);
}

public function PhukienbanhAjax(Request $request) {
    $page = $request->input('page', 1);
    $limit = 1;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'PKB');
    $total = $query->count();
    $products = $query->offset($offset)->limit($limit)->get();
    $totalPages = ceil($total / $limit);

    $view = view('sanpham.ajax_phukienbanh', compact('products'))->render();

    return response()->json([
        'html' => $view,
        'totalPages' => $totalPages,
    ]);
    
}


    public function chitietsanpham($id){
        $result = DB::table('sanpham')->where('MaSP', $id)->first();
        return view('chitietsanpham', compact('result'));
    }

    public function laytatcasanpham(){
        $result = DB::table('sanpham')->get();
        return view('admin.qlysanpham', compact('result'));
    }

   


}
?>