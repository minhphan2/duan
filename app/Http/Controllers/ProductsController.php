<?php
namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\AbstractCursorPaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator; 
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
    $sort = $request->input('sort', 'name_asc'); 
    $page = $request->input('page', 1);
    $limit = 4;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'BSN');
    switch ($sort) {
        case 'name_asc':
            $query->orderBy('TenSP', 'asc');
            break;
        case 'name_desc':
            $query->orderBy('TenSP', 'desc');
            break;
        case 'price_asc':
            $query->orderBy('Gia', 'asc');
            break;
        case 'price_desc':
            $query->orderBy('Gia', 'desc');
            break;
    }
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
    $sort = $request->input('sort', 'name_asc'); 
    $limit = 4;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'BNE');
    switch ($sort) {
        case 'name_asc':
            $query->orderBy('TenSP', 'asc');
            break;
        case 'name_desc':
            $query->orderBy('TenSP', 'desc');
            break;
        case 'price_asc':
            $query->orderBy('Gia', 'asc');
            break;
        case 'price_desc':
            $query->orderBy('Gia', 'desc');
            break;
    }


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
    $sort = $request->input('sort', 'name_asc'); 
    $limit = 4;
    $offset = ($page - 1) * $limit;

    $query = ProductsModel::where('LoaiSP', 'PKB');

    // Áp dụng sắp xếp
    switch ($sort) {
        case 'name_asc':
            $query->orderBy('TenSP', 'asc');
            break;
        case 'name_desc':
            $query->orderBy('TenSP', 'desc');
            break;
        case 'price_asc':
            $query->orderBy('Gia', 'asc');
            break;
        case 'price_desc':
            $query->orderBy('Gia', 'desc');
            break;
    }

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
        try {
            $request->validate([
                'ten_san_pham' => 'required|string|max:255',
                'ma_loai' => 'required|string|max:255',
                'don_gia' => 'required|numeric|min:0',
                'so_luong' => 'required|integer|min:0',
                'hinh1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
                'hinh2' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
                'hinh3' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
                'mo_ta' => 'nullable|string',
                'giam_gia' => 'nullable|numeric|min:0|max:100',
            ], [
                'ten_san_pham.required' => 'Vui lòng nhập tên sản phẩm.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
                'ma_loai.required' => 'Vui lòng chọn loại sản phẩm.',
                'ma_loai.string' => 'Mã loại sản phẩm phải là chuỗi ký tự.',
                'ma_loai.max' => 'Mã loại sản phẩm không được vượt quá 255 ký tự.',
                'don_gia.required' => 'Vui lòng nhập đơn giá.',
                'don_gia.numeric' => 'Đơn giá phải là số.',
                'don_gia.min' => 'Đơn giá không được nhỏ hơn 0.',
                'so_luong.required' => 'Vui lòng nhập số lượng.',
                'so_luong.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.min' => 'Số lượng không được nhỏ hơn 0.',
                'hinh1.required' => 'Vui lòng chọn hình ảnh 1.',
                'hinh1.image' => 'Hình ảnh 1 phải là một tệp hình ảnh.',
                'hinh1.mimes' => 'Hình ảnh 1 phải có định dạng jpg, png, jpeg, gif.',
                'hinh1.max' => 'Hình ảnh 1 không được vượt quá 2MB.',
                'hinh2.image' => 'Hình ảnh 2 phải là một tệp hình ảnh.',
                'hinh2.mimes' => 'Hình ảnh 2 phải có định dạng jpg, png, jpeg, gif.',
                'hinh2.max' => 'Hình ảnh 2 không được vượt quá 2MB.',
                'hinh3.image' => 'Hình ảnh 3 phải là một tệp hình ảnh.',
                'hinh3.mimes' => 'Hình ảnh 3 phải có định dạng jpg, png, jpeg, gif.',
                'hinh3.max' => 'Hình ảnh 3 không được vượt quá 2MB.',
                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',
                'giam_gia.numeric' => 'Giảm giá phải là số.',
                'giam_gia.min' => 'Giảm giá không được nhỏ hơn 0.',
                'giam_gia.max' => 'Giảm giá không được vượt quá 100.',
            ]);

            $sanpham = new ProductsModel();
            $sanpham->TenSP = $request->ten_san_pham;
            $sanpham->Loaisp = $request->ma_loai;
            $sanpham->Gia = $request->don_gia;
            $sanpham->SoLuong = $request->so_luong;
            $sanpham->MoTa = $request->mo_ta;
            $sanpham->giam_gia = $request->giam_gia ?? 0;

            // Xử lý upload hình ảnh
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

        } catch (ValidationException $e) {
            $errorMessage = collect($e->errors())->first()[0]; // Lấy lỗi đầu tiên
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage); // Flash lỗi đầu tiên vào session 'error'
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm: ' . $e->getMessage())->withInput();
        }
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
    try {
        $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'ma_loai' => 'required|in:PKB,BNE,BSN',
            'don_gia' => 'required|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
            'hinh1' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'hinh2' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'hinh3' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'mo_ta' => 'nullable|string',
            'giam_gia' => 'nullable|numeric|min:0|max:100',
        ], [
            'ten_san_pham.required' => 'Vui lòng nhập tên sản phẩm.',
            'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'ma_loai.required' => 'Vui lòng chọn loại sản phẩm.',
            'ma_loai.in' => 'Loại sản phẩm không hợp lệ.',
            'don_gia.required' => 'Vui lòng nhập đơn giá.',
            'don_gia.numeric' => 'Đơn giá phải là số.',
            'don_gia.min' => 'Đơn giá không được nhỏ hơn 0.',
            'so_luong.required' => 'Vui lòng nhập số lượng.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng không được nhỏ hơn 0.',
            'hinh1.image' => 'Hình ảnh 1 phải là một tệp hình ảnh.',
            'hinh1.mimes' => 'Hình ảnh 1 phải có định dạng jpg, png, jpeg, gif.',
            'hinh1.max' => 'Hình ảnh 1 không được vượt quá 2MB.',
            'hinh2.image' => 'Hình ảnh 2 phải là một tệp hình ảnh.',
            'hinh2.mimes' => 'Hình ảnh 2 phải có định dạng jpg, png, jpeg, gif.',
            'hinh2.max' => 'Hình ảnh 2 không được vượt quá 2MB.',
            'hinh3.image' => 'Hình ảnh 3 phải là một tệp hình ảnh.',
            'hinh3.mimes' => 'Hình ảnh 3 phải có định dạng jpg, png, jpeg, gif.',
            'hinh3.max' => 'Hình ảnh 3 không được vượt quá 2MB.',
            'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',
            'giam_gia.numeric' => 'Giảm giá phải là số.',
            'giam_gia.min' => 'Giảm giá không được nhỏ hơn 0.',
            'giam_gia.max' => 'Giảm giá không được vượt quá 100.',
        ]);

        $sp = ProductsModel::findOrFail($id);
        $sp->TenSP = $request->ten_san_pham;
        $sp->Gia = $request->don_gia;
        $sp->SoLuong = $request->so_luong;
        $sp->MoTa = $request->mo_ta;
        $sp->Loaisp = $request->ma_loai;
        $sp->giam_gia = $request->giam_gia ?? 0;

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

    } catch (ValidationException $e) {
        $errorMessage = collect($e->errors())->first()[0]; // Lấy lỗi đầu tiên
        return redirect()->back()
            ->withInput()
            ->with('error', $errorMessage); // Flash lỗi đầu tiên vào session 'error'
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật sản phẩm: ' . $e->getMessage())->withInput();
    }
}

public function sort(Request $request)
{
    $order = $request->get('order');

    $products = ProductsModel::orderBy('Gia', $order)->get();

    return view('sanpham.partials.product_list', compact('products'));
}

//load cho admin
public function loadProducts(Request $request)
{
    $query = ProductsModel::query();

    // Tìm kiếm
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('TenSP', 'LIKE', "%{$search}%")
              ->orWhere('MoTa', 'LIKE', "%{$search}%");
        });
    }

    // Lọc theo loại
    if ($request->has('category') && !empty($request->category)) {
        $query->where('LoaiSP', $request->category);
    }

    // Sắp xếp
    if ($request->has('sort') && !empty($request->sort)) {
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('Gia', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('Gia', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('TenSP', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('TenSP', 'desc');
                break;
        }
    }

    $products = $query->get();

    return view('admin.partials.product-table', compact('products'))->render();
}


}
?>