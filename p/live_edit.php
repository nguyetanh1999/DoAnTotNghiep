<?php
include_once("config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['STT'])) {
		$update_field.= "STT='".$input['STT']."'";
	} else if(isset($input['Ten'])) {
		$update_field.= "Ten='".$input['Ten']."'";
	} else if(isset($input['GioiTinh'])) {
		$update_field.= "GioiTinh='".$input['GioiTinh']."'";
	} else if(isset($input['NgaySinh'])) {
		$update_field.= "NgaySinh='".$input['NgaySinh']."'";
	} else if(isset($input['Email'])) {
		$update_field.= "Email='".$input['Email']."'";
	} else if(isset($input['SDT'])) {
		$update_field.= "SDT='".$input['SDT']."'";
	} else if(isset($input['DiaChi'])) {
		$update_field.= "DiaChi='".$input['DiaChi']."'";
	} else if(isset($input['QueQuan'])) {
		$update_field.= "QueQuan='".$input['QueQuan']."'";
	} else if(isset($input['DanToc'])) {
		$update_field.= "DanToc='".$input['DanToc']."'";
	} else if(isset($input['NguoiThan'])) {
		$update_field.= "NguoiThan='".$input['NguoiThan']."'";
	}	
	if($update_field && $input['MSSV']) {
		$sql_query = "UPDATE sinhvien SET $update_field WHERE MSSV='" . $input['MSSV'] . "'";	
		mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));		
	}
}


