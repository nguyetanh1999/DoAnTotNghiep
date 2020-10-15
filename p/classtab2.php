							
				<div class="zui-wrapper1">
				  <div class="zui-scroller1">
				
					<table id="data_table" class="zui-table">
					  <thead>
						<tr>
						  <th>STT</th>
						  <th>Họ và tên</th>
						  <th>MSSV</th>
						  <th>Giới tính</th>
						  <th>Ngày sinh</th>
						  <th>Email</th>
						  <th>Điện thoại</th>
						  <th>Địa chỉ</th>
						  <th>Quê quán</th>
						  <th>Dân tộc</th>
						  <th>Người thân</th>
						</tr>
					  </thead>
					  <tbody>
                      <?php
while($dong1 = mysqli_fetch_assoc($kq1)){
			echo '
						<tr id="'.$dong1['MSSV'].'">
						  <td>'.$dong1['STT'].'</td>
						  <td>'.$dong1['Ten'].'</td>
						  <td>'.$dong1['MSSV'].'</td>
						  <td>'.$dong1['GioiTinh'].'</td>
						  <td>'.$dong1['NgaySinh'].'</td>
						  <td>'.$dong1['Email'].'</td>
						  <td>'.$dong1['SDT'].'</td>
						  <td>'.$dong1['DiaChi'].'</td>
						  <td>'.$dong1['QueQuan'].'</td>
						  <td>'.$dong1['DanToc'].'</td>
						  <td>'.$dong1['NguoiThan'];
}?>
						  </td>
						</tr>
					  </tbody>
					</table>
				  </div>
				</div>
		
		
				</br></br>
				<a class="Updatebtn1" id="addrow" onclick="closeFormupdatesvForm(); openFormaddrowForm()">Thêm sinh viên mới</a>
                <a class="Updatebtn1" id="updatesv" onclick="closeFormaddrowForm(); openFormupdatesvForm()">Cập nhật thông tin</a>
				
				<a class="Exportbtn" id="export" href="export.php?t=sinhvien&l=<?php echo $name;?>">Xuất file Excel</a>
                <a class="Editbtn" href="edit.php?name=<?php echo $name;?>">Sửa nhanh</a>

				<div class="updatesvForm" id="updatesvForm">
					<form action="updatepc.php?t=sv" class="form-container" method="post" enctype="multipart/form-data">
						<p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng file Excel:&nbsp; &nbsp;<a href="../file/MauThongTinSinhVien.xlsx" title="Tải file mẫu" download><i class="fas fa-download"  style="font-size:20px"></i></a></p>
						<input type="file" name="excel" accept=".xls,.xlsx,.csv" required/>
						<input type="hidden" name="lop" value="<?php echo $name;?>"/></br></br>
					<button type="submit" class="Updatebtn1" name="import">Cập nhật</button>
					<button type="button" class="Updatebtn1 cancel" onclick="closeFormupdatesvForm()">Đóng</button>
					</form>
				</div>
				
				<div class="addrowForm" id="addrowForm">
				  <form action="updatepc.php?t=addrow" class="form-container" method="post">
					<input type="number" placeholder="Mã số sinh viên" name="MSSV" required>
					<input type="hidden" name="lop" value="<?php echo $name;?>"/>
					<button type="submit" class="Updatebtn1" name="import">Thêm sinh viên</button>
					<button type="button" class="Updatebtn1 cancel" onclick="closeFormaddrowForm()">Đóng</button>
				  </form>
				</div>								
					