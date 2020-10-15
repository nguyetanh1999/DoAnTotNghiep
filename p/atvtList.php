<?php
require_once "config.php";
        $lop = $_POST['lop3'];
		$tenhd = $_POST['tenhd'];
	$sql10="SELECT DISTINCT Ten FROM hoatdong WHERE MSSV in (SELECT a.MSSV FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE b.Lop='".$lop."') ORDER BY Ten ASC";
	$kq10 = mysqli_query($link, $sql10);
	$sql11="SELECT b.Ten Ten, a.MSSV MSSV, a.GhiChu GhiChu FROM hoatdong a JOIN sinhvien b ON a.MSSV=b.MSSV WHERE a.Ten='".$tenhd."' AND b.Lop='".$lop."'";
	$kq11 = mysqli_query($link, $sql11);

?>
</br>
				<div class="zui-wrapper">
				  <div class="zui-scroller">
					<table class="zui-table">
					  <thead>
						<tr>
						  <th>Họ và tên</th>
						  <th>MSSV</th>
						  <th>Ghi chú</th>
						</tr>
					  </thead>
					  <tbody>
			<?php while($dong11 = mysqli_fetch_array($kq11, MYSQLI_ASSOC)){?>
                        <tr>
						  <td><?php echo $dong11['Ten'];?></td>
						  <td><?php echo $dong11['MSSV'];?></td>
						  <td><?php echo $dong11['GhiChu'];}?></td>
						</tr>
					  </tbody>
					</table>
  				  </div>
				</div>