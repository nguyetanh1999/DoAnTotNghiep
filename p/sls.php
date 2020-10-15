<?php
require_once "config.php";
        $hocki = $_POST['hocki'];
		$dht = $_POST['dht'];
		$drl = $_POST['drl'];
	if(empty($dht)){
		$dht=0;
	}
	if(empty($drl)){
		$drl=0;
	}
		$lop = $_POST['lop1'];
	$sql9 = "SELECT a.Ten Ten, a.MSSV MSSV, b.HK".$hocki." DHT, c.HK".$hocki." DRL FROM sinhvien a join hoctap b ON a.MSSV=b.MSSV JOIN renluyen c ON a.MSSV=c.MSSV WHERE a.Lop='".$lop."' AND b.HK".$hocki.">=".$dht." AND c.HK".$hocki.">=".$drl."";
	$kq9 = mysqli_query($link, $sql9);

if(!empty($hocki)&&isset($hocki)&&!empty($dht)&&isset($dht)&&!empty($drl)&&isset($drl)&&(mysqli_num_rows($kq9)>0)){
echo '
				<div class="zui-wrapper">
				  <div class="zui-scroller">
					<table class="zui-table">
					  <thead>
						<tr>
						  <th>STT</th>
						  <th>Họ và tên</th>
						  <th>MSSV</th>
						  <th>Điểm học tập</th>
						  <th>Điểm rèn luyện</th>
						</tr>
					  </thead>
					  <tbody>';
					  $stt=1;
				while($dong9 = mysqli_fetch_array($kq9, MYSQLI_ASSOC)){
						  echo '
						<tr>
						  <td>'.$stt.'</td>
						  <td>'.$dong9['Ten'].'</td>
						  <td>'.$dong9["MSSV"].'</td>
						  <td>'.$dong9["DHT"].'</td>
						  <td>'.$dong9["DRL"].'</td>';
						  $stt++;
				};
				echo '
						</tr>
					  </tbody>
					</table>
  				  </div>
				</div>
				</br></br>
	<a class="Exportbtn" id="export" href="export.php?t=hocbong&l='.$lop.'&hk='.$hocki.'&dht='.$dht.'&drl='.$drl.'">Xuất file Excel</a>';

}


else if(!empty($hocki)&&isset($hocki)&&!empty($dht)&&isset($dht)&&!empty($drl)&&isset($drl)&&(mysqli_num_rows($kq9)==0)){
		echo '                                
Không có sinh viên nào đủ điều kiện.
			';
}
?>
