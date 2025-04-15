<?php
class ProductsModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function laySanpham($loaisp = null) {
        if ($loaisp) {
            $sql = "SELECT * FROM `sanpham` WHERE `LoaiSP` = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $loaisp);
        } else {
            $sql = "SELECT * FROM `sanpham`";
            $stmt = $this->conn->prepare($sql);
        }
        
        $stmt->execute();
        return $stmt->get_result();
    }
    


public function countSanpham($loaiSP) {
    $sql = "SELECT COUNT(*) AS total FROM sanpham WHERE LoaiSP = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $loaiSP);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['total'];
}

public function laySanphamPhanTrang($loaiSP, $limit, $offset) {
    $sql = "SELECT * FROM sanpham WHERE LoaiSP = ? LIMIT ? OFFSET ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sii", $loaiSP, $limit, $offset);
    $stmt->execute();
    return $stmt->get_result();
}

    // Lấy sản phẩm theo ID
    public function laySanphamTheoID($MaSP) {
        $sql = "SELECT * FROM sanpham WHERE MaSP = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $MaSP);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Thêm sản phẩm
    public function themSanpham($MaSP, $TenSP, $Gia, $HinhAnh, $MoTa) {
        $sql = "INSERT INTO sanpham (MaSP, TenSP, Gia, HinhAnh, MoTa) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isdss", $MaSP, $TenSP, $Gia, $HinhAnh, $MoTa);
        return $stmt->execute();
    }

    // Sửa sản phẩm
    public function suaSanpham($MaSP, $TenSP, $Gia, $HinhAnh, $MoTa) {
        $sql = "UPDATE sanpham SET TenSP = ?, Gia = ?, HinhAnh = ?, MoTa = ? WHERE MaSP = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdssi", $TenSP, $Gia, $HinhAnh, $MoTa, $MaSP);
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function xoaSanpham($MaSP) {
        $sql = "DELETE FROM sanpham WHERE MaSP = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $MaSP);
        return $stmt->execute();
    }

    public function laysptheoloai($Loaisp){
        $sql = "SELECT * FROM sanpham WHERE Loaisp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $Loaisp);
        $stmt->execute();
        return $stmt->get_result();
    }


    public function countSanpham2($loaiSP) {
        $sql = "SELECT COUNT(*) AS total FROM sanpham WHERE LoaiSP = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $loaiSP);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    
    public function laySanphamPhanTrang2($loai, $limit, $offset) {
        $sql = "SELECT * FROM sanpham WHERE LoaiSP = ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $loai, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }
    
}


?>