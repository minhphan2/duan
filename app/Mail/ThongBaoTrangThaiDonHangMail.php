<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThongBaoTrangThaiDonHangMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tenKhach;
    public $trangThai;

    public function __construct($tenKhach, $trangThai)
    {
        $this->tenKhach = $tenKhach;
        $this->trangThai = $trangThai;
    }

    public function build()
    {
        return $this->subject('Thông báo đơn hàng')
                    ->view('emails.trang_thai_don_hang');
    }
}
?>