<div class="menuleft" id="m" onmouseover="hovermenu();" onmouseout="hovermenu1();">
    <div class="container menu">    
        <?php                      
            include('xulydulieu.php');
            $quyen=$_SESSION['maquyen'];           
            $sql="SELECT chucnang.* from chucnang,chitietquyen WHERE chucnang.MaChucNang=chitietquyen.MaChucNang AND chitietquyen.MaQuyen='$quyen' ORDER BY chitietquyen.stt ASC";
            $p=new CheckConnection();
            $result=$p->Check($sql);
            while ($row=mysqli_fetch_array($result)){
                echo "<a href='quanly.php?id=$row[0]' class='menu1-a'>
                        <div class='row menu1'>            
                            <img src='../img/$row[2]' />
                            <div class='menu-title' id='$row[0]'>$row[1]</div>            
                        </div>
                     </a>";
            }
        ?>                      
    </div>
</div>
<script>
    function hovermenu(){      
        var x=document.getElementsByClassName('menu-title');
        for(i=0;i<x.length;i++){
            x[i].style.marginLeft='80px';
            x[i].style.color='black';
        }  
         
    }

    function hovermenu1(){     
        var x=document.getElementsByClassName('menu-title');
        for(i=0;i<x.length;i++){
            x[i].style.marginLeft='0px';
            x[i].style.color='rgb(228,208,119)';
        }                       
    }
</script>