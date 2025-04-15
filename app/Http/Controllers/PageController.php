<?php
namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home() {
        return view('trangchu');
    }

    public function giohang() {
        return view('giohang');
    }

    public function gioithieu() {
        return view('gioithieu');
    }

    public function lienhe() {
        return view('lienhe');
    }

    public function hoidap() {
        return view('hoidap');
    }
    public function tintuc() {
        return view('tintuc');
    }
    public function doingu() {
        return view('doingu');
    }

}
?>