<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:sanpham,MaSP',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        ReviewModel::create([
            'name'    => $request->name, 
            'product_id' => $request->product_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return response()->json(['success' => true]);
    }

    public function getReviews($product_id)
{
    $reviews = ReviewModel::where('product_id', $product_id)
                ->latest()
                ->get();

    return response()->json($reviews);
}

  public function laytatcareview(){
         $kqreview = ReviewModel::with(['product'])->get();
        return view('admin.qlybinhluan', compact('kqreview'));
    }

}
?>