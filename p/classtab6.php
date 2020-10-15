<?php
	$sql10="SELECT DISTINCT Ten FROM hoatdong WHERE MSSV in (SELECT a.MSSV FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$name."') ORDER BY Ten ASC";
	$kq10 = mysqli_query($link, $sql10);
	$kq10a = mysqli_query($link, $sql10);
if(mysqli_num_rows($kq10)>0){
		echo '	<div style="display:block; text-align:center;">	
					<form id="atvtList" class="atvtform" method="post" enctype="multipart/form-data">
						  <select id="atvtName" name="atvtName" class="atvt-select">';
							while($dong10 = mysqli_fetch_array($kq10, MYSQLI_ASSOC)){
								$temp=$dong10['Ten'];
								echo '
								<option value="'.$temp.'">'.$temp.'</option>';
							}

		echo '			  </select>
						<input type="hidden" id="lop3" name="lop" value="'.$name.'"/></br>
					<input class="Updatebtn1" type="button" onclick="SubmitFormData();" name="see" value="Xem danh sách"/>
					</form>
				</div>';
}
?>
                <div id="atvtResult">
                </div>
</br></br>
<a class="Updatebtn1" id="addatvt" onclick="closeFormupdateatvtForm(); openFormaddatvtForm();">Thêm hoạt động</a>
<?php
	if(mysqli_num_rows($kq10)>0){
		echo '<a class="Updatebtn1" id="updateatvt" onclick="closeFormaddatvtForm(); openFormupdateatvtForm()">Cập nhật</a>
				<a class="Exportbtn" id="exportatvtForm" href="export.php?t=hoatdong&l='.$name.'&tenhd=all">Xuất tất cả hoạt động</a>
';
	}
?>

<div id="atvtButtons">
</div>
</br>
				<div class="addatvtForm" id="addatvtForm">
				  <form action="updatepc.php?t=addhd" class="form-container" method="post" enctype="multipart/form-data">
					<input type="text" placeholder="Tên hoạt động" name="tenhd" required>
                    <p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng file Excel:&nbsp; &nbsp;<a href="../file/MauHoatDongNgoaiKhoa.xlsx" title="Tải file mẫu" download><i class="fas fa-download"  style="font-size:20px"></i></a></p>
                    <input type="file" name="excel" accept=".xls,.xlsx,.csv" required/>
					<input type="hidden" name="lop" value="<?php echo $name;?>"/></br></br>
					<button type="submit" class="Updatebtn1" name="import">Thêm hoạt động</button>
					<button type="button" class="Updatebtn1 cancel" onclick="closeFormaddatvtForm()">Đóng</button>
				  </form>
				</div>								

				<div class="updateatvtForm" id="updateatvtForm">
					<form action="updatepc.php?t=hd" class="form-container" method="post" enctype="multipart/form-data">
						  <select name="tenhd" class="select-style">
                          <?php 
							while($dong10a = mysqli_fetch_array($kq10a, MYSQLI_ASSOC)){
								$temp=$dong10a['Ten'];
								echo '
								<option value="'.$temp.'">'.$temp.'</option>';
							}?>
						  </select>
						<p style="font-family:Ubuntu-Regular; font-size:17px; font-weight:bold;">Nhúng file Excel:</p>
						<input type="file" name="excel" accept=".xls,.xlsx,.csv" required/>
						<input type="hidden" name="lop" value="<?php echo $name;?>"/></br></br>
					<button type="submit" class="Updatebtn1" name="import">Cập nhật</button>
					<button type="button" class="Updatebtn1 cancel" onclick="closeFormupdateatvtForm()">Đóng</button>
					</form>
				</div>