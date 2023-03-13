<?php
    include('ketnoi.php');
    include('xulydulieu.php');
    $p=new CheckConnection();
    $p1=new Xuly();
    if (isset($_GET['ktk'])){
        $ktk=$_GET['ktk'];
        if ($ktk=='1'){
            $tu=$_GET['tungay'];
            $den=$_GET['denngay'];
            $loai=$_GET['loaisp'];
            $s="";
            $i=-1;
            if ($den<$tu){
                $i=0;
                echo $i;
            }
            else{
                if ($tu!="" && $den!="" && $loai=="Chọn loại sản phẩm"){
                    $s="";
                    $sql="SELECT * from hoadon WHERE NgayLapHD>='$tu' AND NgayLapHD<='$den' AND TinhTrang=2";
                    $re=$p->Check($sql);
                    if (mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $date=$p1->Chuyenngaythuan($row[3]);
                            $tien=$p1->Chuyentien($row[8]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$date</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>
                                </div>";
                            $tong=$tong+$row[8];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>Tổng tiền doanh thu:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }
                if ($tu=="" && $den=="" && $loai!="Chọn loại sản phẩm"){
                    $s="";
                    $sql="SELECT hoadon.* FROM hoadon,sanpham,chitiethoadon WHERE 
                    hoadon.MaHD=chitiethoadon.MaHD AND chitiethoadon.MaNhomSP=sanpham.MaNhomSP AND 
                    sanpham.MaLoai='$loai' AND hoadon.TinhTrang=2";
                    $re=$p->Check($sql);
                    if(mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $date=$p1->Chuyenngaythuan($row[3]);
                            $tien=$p1->Chuyentien($row[8]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$date</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>
                                </div>";
                            $tong=$tong+$row[8];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>Tổng tiền doanh thu:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }
                if ($tu!="" && $den!="" && $loai!="Chọn loại sản phẩm"){
                    $s="";
                    $sql="SELECT hoadon.* FROM hoadon,sanpham,chitiethoadon WHERE 
                    hoadon.MaHD=chitiethoadon.MaHD AND chitiethoadon.MaNhomSP=sanpham.MaNhomSP AND 
                    sanpham.MaLoai='$loai' AND hoadon.TinhTrang=2 AND hoadon.NgayLapHD>='$tu' AND hoadon.NgayLapHD<='$den'";
                    $re=$p->Check($sql);
                    if(mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $date=$p1->Chuyenngaythuan($row[3]);
                            $tien=$p1->Chuyentien($row[8]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[1]</div>
                                    <div class='col-md-2 col-sm-2 col-xs-12'>$row[2]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$date</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>
                                </div>";
                            $tong=$tong+$row[8];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'>Tổng tiền doanh thu:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }
                echo $s;
            }
        }
        if ($ktk=='2'){
            $tu=$_GET['tungay'];
            $den=$_GET['denngay'];
            $s="";
            $i=-1;
            if ($den<$tu){
                $i=0;
                echo $i;
            }
            else{
                if ($tu!="" && $den!=""){
                    $s="";
                    $sql="SELECT chitiethoadon.MaNhomSP,SUM(chitiethoadon.SoLuong) AS TongSL,
                    SUM(chitiethoadon.ThanhTien) AS TongTien 
                    from chitiethoadon,hoadon WHERE hoadon.MaHD=chitiethoadon.MaHD AND hoadon.NgayLapHD>='$tu' 
                    AND hoadon.NgayLapHD<='$den' AND hoadon.TinhTrang=2 GROUP BY chitiethoadon.MaNhomSP 
                    ORDER BY TongSL DESC limit 0,5";
                    $re=$p->Check($sql);
                    if (mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $sl=$p1->Chuyentien($row[1]);
                            $tien=$p1->Chuyentien($row[2]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$sl</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>                                
                                </div>";
                            $tong=$tong+$row[2];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-1 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-2 col-xs-12'>Tổng tiền sản phẩm bán chạy:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }            
                echo $s;
            }
        }
        if ($ktk=='3'){
            $tu=$_GET['tungay'];
            $den=$_GET['denngay'];
            $manv=$_GET['manv'];
            $s="";
            $i=-1;
            if ($den<$tu){
                $i=0;
                echo $i;
            }
            else{
                if ($tu!="" && $den!="" && $manv==""){
                    $s="";
                    $sql="SELECT hoadon.MaNV,SUM(hoadon.TongTienPhaiTra) as TongTien from hoadon 
                    WHERE hoadon.NgayLapHD>='$tu' AND hoadon.NgayLapHD<='$den' 
                    AND hoadon.TinhTrang=2 GROUP BY hoadon.MaNV";
                    $re=$p->Check($sql);
                    if (mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $tien=$p1->Chuyentien($row[1]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>                                
                                </div>";
                            $tong=$tong+$row[1];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-1 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-2 col-xs-12'>Tổng doanh thu nhân viên:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }
                if ($tu!="" && $den!="" && $manv!=""){
                    $s="";
                    $sql="SELECT hoadon.MaNV,SUM(hoadon.TongTienPhaiTra) as TongTien from hoadon 
                    WHERE hoadon.MaNV='$manv' AND hoadon.NgayLapHD>='$tu' AND hoadon.NgayLapHD<='$den' 
                    AND hoadon.TinhTrang=2 GROUP BY hoadon.MaNV";
                    $re=$p->Check($sql);
                    if (mysqli_num_rows($re)>0){
                        $tong=0;
                        $s="<div id='hienhdthongke1'>";
                        while($row=mysqli_fetch_array($re)){
                            $tien=$p1->Chuyentien($row[1]);
                            $s=$s."
                                <div class='row contk3'>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$row[0]</div>
                                    <div class='col-md-3 col-sm-2 col-xs-12'>$tien</div>                                
                                </div>";
                            $tong=$tong+$row[1];
                        }
                        $s=$s."</div>";
                        $tien1=$p1->Chuyentien($tong);
                        $s=$s."<div class='row tongtientk' id='hientien'>
                            <div class='col-md-2 col-sm-2 col-xs-12'></div>
                            <div class='col-md-1 col-sm-2 col-xs-12'></div>
                            <div class='col-md-3 col-sm-2 col-xs-12'>Tổng doanh thu nhân viên:</div>
                            <div class='col-md-4 col-sm-2 col-xs-12'>$tien1 VNĐ</div> 
                        </div>";
                    }
                }             
                echo $s;
            }
        }
    }
?>