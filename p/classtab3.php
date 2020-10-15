<?php
	$test="SELECT MSSV FROM hoctap WHERE MSSV in (SELECT a.MSSV FROM hoctap a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$name."')";
	$kqtest=mysqli_query($link, $test);
	$testedrow = mysqli_fetch_array($kqtest, MYSQLI_ASSOC);
	if($testedrow>0){
		echo '	<div class="zui-wrapper" style="margin-left:auto; margin-right:auto;">
				  <div class="zui-scroller">
					<table class="zui-table">
					  <thead>
						<tr>
						  <th>STT</th>
						  <th>Họ và tên</th>
						  <th>MSSV</th>
						  <th>HK1</th>
						  <th>HK2</th>
						  <th>HK3</th>
						  <th>HK4</th>
						  <th>HK5</th>
						  <th>HK6</th>
						  <th>HK7</th>
						</tr>
					  </thead>
					  <tbody>';
				while($dong2 = mysqli_fetch_array($kq2, MYSQLI_ASSOC)){
						  echo '
						<tr>
						  <td>'.$dong2['STT'].'</td>
						  <td>'.$dong2['Ten'].'</td>
						  <td>'.$dong2["MSSV"].'</td>
						  <td>'.$dong2["HK1"].'</td>
						  <td>'.$dong2["HK2"].'</td>
						  <td>'.$dong2["HK3"].'</td>
						  <td>'.$dong2["HK4"].'</td>
						  <td>'.$dong2["HK5"].'</td>
						  <td>'.$dong2["HK6"].'</td>
						  <td>'.$dong2["HK7"].'</td>';
				}
       		echo '				
						</tr>
					  </tbody>
					</table>
				  </div>
				</div>';
	}
?>

				
								</br></br>
				<a class="Updatebtn1" onclick="openFormupdatehtForm()">Cập nhật điểm</a>
                
<?php
		if($testedrow>0){
				echo '<a class="Exportbtn" id="export" href="export.php?t=hoctap&l='.$name.'">Xuất file Excel</a>';
		}
?>
				
				
				<div id="updatehtForm" class="updatehtForm">
					<form class="form-container" action="updatepc.php?t=ht" method="post" enctype="multipart/form-data">
						<p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">
						1) Chọn học kì muốn cập nhật:
						</p>
						  <select name="hocki" class="select-style">
							<option value="0">Bảng mới</option>
                            <option value="1">HK 1</option>
							<option value="2">HK 2</option>
							<option value="3">HK 3</option>
							<option value="4">HK 4</option>
							<option value="5">HK 5</option>
							<option value="6">HK 6</option>
							<option value="7">HK 7</option>
						  </select>
						 <p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">
							 2) Nhúng file Excel:&nbsp; &nbsp;<a href="../file/MauDiemHocTap.xlsx" title="Tải file mẫu" download><i class="fas fa-download"  style="font-size:20px"></i></a></p>
						 <input type="file" name="excel" accept=".xls,.xlsx,.csv" required/>
						 <input type="hidden" name="lop" value="<?php echo $name;?>"/>
						 </br></br>
						 <input class="Updatebtn1" type="submit" name="import" value="Cập nhật"/>
						<button type="button" class="Updatebtn1 cancel" onclick="closeFormupdatehtForm()">Đóng</button>
					 </form>
				</div>    
