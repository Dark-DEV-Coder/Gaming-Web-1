<?php
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        if ($id=='KH')
            require('khachhang.php');
        if ($id=='NV')
            require('nhanvien.php');
        if ($id=='SP')
            require('sanpham.php');
        if ($id=='HD')
            require('hoadon.php');
        if ($id=='PNH')
            require('phieunhap.php');
        if ($id=='TK')
            require('taikhoan.php');
        if ($id=='PBH')
            require('phieubaohanh.php');
        if ($id=='KM')
            require('khuyenmaivaloinhuan.php');
    }
?>