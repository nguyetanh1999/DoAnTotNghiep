$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [1, 'MSSV'],                    
		  editable: [[0, 'Ten'], [2, 'GioiTinh'], [3, 'NgaySinh'], [4, 'Email'], [5, 'SDT'], [6, 'DiaChi'], [7, 'QueQuan'], [8, 'DanToc'], [9, 'NguoiThan']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});