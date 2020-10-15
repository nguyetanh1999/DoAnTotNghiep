<?php
require_once "config.php";
	if($_SESSION["type"] =='GV') 
		{$sql4 = "SELECT * FROM sinhvien WHERE MSSV='".$NhapMSSV."' AND Lop='".$lop."'";} 
	else if($_SESSION["type"] =='Admin') 
		{$sql4 = "SELECT * FROM sinhvien WHERE MSSV='".$NhapMSSV."'";}	
	$kq4 = mysqli_query($link, $sql4);	
	$sql7 = "SELECT FORMAT((IF(HK1 IS NULL,0,HK1)+IF(HK2 IS NULL,0,HK2)+IF(HK3 IS NULL,0,HK3)+IF(HK4 IS NULL,0,HK4)+IF(HK5 IS NULL,0,HK5)+IF(HK6 IS NULL,0,HK6)+IF(HK7 IS NULL,0,HK7))/(IF(HK1 IS NULL,0,1)+IF(HK2 IS NULL,0,1)+IF(HK3 IS NULL,0,1)+IF(HK4 IS NULL,0,1)+IF(HK5 IS NULL,0,1)+IF(HK6 IS NULL,0,1)+IF(HK7 IS NULL,0,1)),2) as DTB FROM hoctap WHERE MSSV='".$NhapMSSV."'";
	$kq7 = mysqli_query($link, $sql7);

	 ?>
     <div class="profile" style="	display: flex;
	flex-direction: row;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: stretch;
	align-content: stretch">
                	<div class="profileleft">
                    	<img src="../images/LIS_COLOR.png"/>
						<p>
        <?php while ($dong4 = mysqli_fetch_array($kq4, MYSQLI_ASSOC)){ echo $dong4["Ten"];?></br><?php echo $dong4["MSSV"];?>
            		    </p>
						<table class="dtl">
                          <tr>
                            <th>Tổng STC</th>
                            <th>Điểm trung bình</th>
                          </tr>
                          <tr>
                            <td></td>
                            <td><?php while($dong7 = mysqli_fetch_array($kq7, MYSQLI_ASSOC)){$temp=$dong7["DTB"]; echo $temp; }?></td>
                          </tr>
                        </table>
                        <div>
                        <p style="font-size:20px; font-family: Bahnschrift; text-align: center; background-color: #f2f2f2;; color: #003D59; padding-top: 6px; padding-bottom:6px;">Thông tin liên lạc:</p>
                        <p style="font-family: Arial; font-size:18px; color: white; text-align: center; word-break: break-all; padding-top:20px; line-height:10px;">
                        <i class="fas fa-phone-square-alt" style="font-size:24px"></i>&nbsp;<?php echo $dong4["SDT"];?></br></br>
                        <i class="fas fa-envelope" style="font-size:22px"></i>&nbsp;<?php echo $dong4["Email"];?>
                        </p>
                        </div>

                    </div>
                    
                    <div class="profileright">   
                   <p style="margin-top:0;">Thông tin cá nhân</p>
                   <table class="ttcn">
                   	<tr>
                    	<td class="tttitle">Giới tính:</td>
                        <td><?php if($dong4["GioiTinh"]==1){echo 'Nam';} else if($dong4["GioiTinh"]==0){echo 'Nữ';}?>
						</td>
                    </tr>
                    <tr>
                        <td class="tttitle">Ngày sinh:</td>
                        <td><?php echo $dong4["NgaySinh"];?></td>
                    </tr>
                    <tr>
                        <td class="tttitle">Địa chỉ:</td>
                        <td><?php echo $dong4["DiaChi"];?></td>
                    </tr>
                    <tr>
                        <td class="tttitle">Quê quán:</td>
                        <td><?php echo $dong4["QueQuan"];?></td>
                    </tr>
                    <tr>
                        <td class="tttitle">Dân tộc:</td>
                        <td><?php echo $dong4["DanToc"];?></td>
                    </tr>
                    <tr>
                        <td class="tttitle">Người thân:</td>
                        <td><?php echo $dong4["NguoiThan"];}?></td>
                    </tr>
                   </table>
                   <p>Điểm học tập</p>
                 <table class="dht">
                 <tr class="dhttitle">
                 	<td>HK1</td>
                    <td>HK2</td>
                    <td>HK3</td>
                    <td>HK4</td>
                    <td>HK5</td>
                    <td>HK6</td>
                    <td>HK7</td>
                 </tr>
<?php $dong5 = mysqli_fetch_array($kq5, MYSQLI_ASSOC);?>
                  <tr>
                 	<td><?php echo $dong5["HK1"];?></td>
                    <td><?php echo $dong5["HK2"];?></td>
                    <td><?php echo $dong5["HK3"];?></td>
                    <td><?php echo $dong5["HK4"];?></td>
                    <td><?php echo $dong5["HK5"];?></td>
                    <td><?php echo $dong5["HK6"];?></td>
                    <td><?php echo $dong5["HK7"];?></td>
                 </tr>
                 </table> 
                 <table style="color:red; margin-left:auto; margin-right:auto; line-height:50px;">
                 	<tr>
                    	<td class="tttitle">Điểm trung bình:</td>
                        <td><?php echo $temp;?></td>
                        <td style="width:100px;"></td>
                        <td class="tttitle">Xếp loại:</td>
                        <td><?php if ($temp ==0) {
                    echo "";}
				else if ($temp < 3) {
                    echo "Kém";
                }
                else if ($temp >= 3 && $temp < 5){
                    echo "Yếu";
                }
                else if ($temp >= 5 && $temp < 6){
                    echo "Trung bình";
                }
                else if ($temp >= 6 && $temp < 7){
                    echo "Trung bình khá";
                }
                else if ($temp >= 7 && $temp < 8){
                    echo "Khá";
                }
                else if ($temp >= 8 && $temp < 9){
                    echo "Giỏi";
                }
                else {
                    echo "Xuất sắc";
                }?>
				</td>
                    </tr>		
                 </table>
                   <p>Điểm rèn luyện</p>
              	 <table class="drl">
                 <tr class="drltitle">
                 	<td>HK1</td>
                    <td>HK2</td>
                    <td>HK3</td>
                    <td>HK4</td>
                    <td>HK5</td>
                    <td>HK6</td>
                    <td>HK7</td>
                 </tr>
<?php $dong6 = mysqli_fetch_array($kq6, MYSQLI_ASSOC);?>
                  <tr>
                 	<td><?php echo $dong6["HK1"];?></td>
                    <td><?php echo $dong6["HK2"];?></td>
                    <td><?php echo $dong6["HK3"];?></td>
                    <td><?php echo $dong6["HK4"];?></td>
                    <td><?php echo $dong6["HK5"];?></td>
                    <td><?php echo $dong6["HK6"];?></td>
                    <td><?php echo $dong6["HK7"];?></td>
                 </tr>
                 </table>
                    </div>
                </div>