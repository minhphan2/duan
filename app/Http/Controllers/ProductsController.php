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
    $limit = 4;
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
    $limit = 4;
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
    $limit = 4;
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

    public function timKiem(Request $request)
    {
        $keyword = $request->query('keyword');
    
        $results = ProductsModel::where('TenSP', 'like', '%' . $keyword . '%')->get();
    
        // Trả về HTML nhỏ để chèn vào #search-results
        $html = '';
        foreach ($results as $sp) {
           $html .= '<div class="search-item" onclick="window.location.href=\'' . route('chitietsanpham', $sp->MaSP) . '\'" style="cursor: pointer;">';
        $html .= '<img src="' . asset('uploads/' . $sp->HinhAnh) . '" alt="' . $sp->TenSP . '" width="30%">';
        $html .= '<strong>' . $sp->TenSP . '</strong><br>';
        $html .= 'Giá: ' . number_format($sp->Gia) . 'đ<br>';
        $html .= '</div><hr>';
        }
    
        return response($html);
    }

    public function laytatcasanpham(){
        $result = DB::table('sanpham')->get();
        return view('admin.qlysanpham', compact('result'));
    }


    public function formThem(){
        return view('admin.formthem');
    }

     public function store(Request $request)
    {
        $request->validate([
            'ten_san_pham' => 'required',
            'ma_loai' => 'required',
            'don_gia' => 'required|numeric',
            'so_luong' => 'required|integer',
            'hinh1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'hinh2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'hinh3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $sanpham = new ProductsModel();
        $sanpham->TenSP = $request->ten_san_pham;
        $sanpham->Loaisp = $request->ma_loai;
        $sanpham->Gia = $request->don_gia;
        $sanpham->SoLuong = $request->so_luong;
        $sanpham->MoTa = $request->mo_ta;

        // Xử lý upload hình ảnh nếu có
        if ($request->hasFile('hinh1')) {
            $file = $request->file('hinh1');
            $filename = time().'_1.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $sanpham->HinhAnh = $filename;
        }

        if ($request->hasFile('hinh2')) {
            $file = $request->file('hinh2');
            $filename = time().'_2.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $sanpham->HinhAnh2 = $filename;
        }

        if ($request->hasFile('hinh3')) {
            $file = $request->file('hinh3');
            $filename = time().'_3.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $sanpham->HinhAnh3 = $filename;
        }

        $sanpham->save();

        return redirect()->route('sanpham.formthem')->with('success', 'Thêm sản phẩm thành công!');


    }

    public function delete($id)
{
    $sp = ProductsModel::findOrFail($id);

    // Xóa hình ảnh cũ nếu có
    if ($sp->HinhAnh && file_exists(public_path('uploads/' . $sp->HinhAnh))) {
        unlink(public_path('uploads/' . $sp->HinhAnh));
    }

    $sp->delete();

    return redirect()->route('admin.qlysanpham')->with('success', 'Xoá sản phẩm thành công!');
}

public function edit($id)
{
    $sp = ProductsModel::findOrFail($id);

    return view('admin.formsuasp', compact('sp'));
}
   
public function update(Request $request, $id)
{
    $request->validate([
        'ten_san_pham' => 'required',
        'ma_loai' => 'required|in:PKB,BNE,BSN',
        'don_gia' => 'required|numeric',
        'so_luong' => 'required|integer',
        'hinh1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'hinh2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'hinh3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'mo_ta' => 'nullable|string',
    ]);

    $sp = ProductsModel::findOrFail($id);
    $sp->TenSP = $request->ten_san_pham;
    $sp->Gia = $request->don_gia;
    $sp->SoLuong = $request->so_luong;
    $sp->MoTa = $request->mo_ta;
    $sp->Loaisp = $request->ma_loai;

    if ($request->hasFile('hinh1')) {
        if ($sp->HinhAnh && file_exists(public_path('uploads/' . $sp->HinhAnh))) {
            unlink(public_path('uploads/' . $sp->HinhAnh));
        }

        $file = $request->file('hinh1');
        $filename = time().'_update.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $sp->HinhAnh = $filename;
    }

    if ($request->hasFile('hinh2')) {
        if ($sp->HinhAnh2 && file_exists(public_path('uploads/' . $sp->HinhAnh2))) {
            unlink(public_path('uploads/' . $sp->HinhAnh2));
        }

        $file = $request->file('hinh2');
        $filename = time().'_update_2.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $sp->HinhAnh2 = $filename;
    }

    if ($request->hasFile('hinh3')) {
        if ($sp->HinhAnh3 && file_exists(public_path('uploads/' . $sp->HinhAnh3))) {
            unlink(public_path('uploads/' . $sp->HinhAnh3));
        }

        $file = $request->file('hinh3');
        $filename = time().'_update_3.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $sp->HinhAnh3 = $filename;
    }

    $sp->save();

    return redirect()->route('admin.qlysanpham')->with('success', 'Cập nhật sản phẩm thành công!');
}

}
?>