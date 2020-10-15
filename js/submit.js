function SubmitFormData() {
	var e = document.getElementById("hocki");
	var hocki = e.options[e.selectedIndex].value;
	var dht = $("#dht").val();
    var drl = $("#drl").val();
	var lop1 = $("#lop1").val();
    $.post("sls.php", { hocki: hocki, dht: dht, drl: drl, lop1: lop1 },
    function(data) {
	 $('#sls-list').html(data);
    });

	var mssv = $("#mssv").val();
	var lop2 = $("#lop2").val();
    $.post("profile.php", { mssv: mssv, lop2: lop2 },
    function(data) {
	 $('#profile').html(data);
    });

	var f = document.getElementById("atvtName");
	var tenhd = f.options[f.selectedIndex].value;
	var lop3 = $("#lop3").val();
    $.post("atvtList.php", { tenhd: tenhd, lop3: lop3 },
    function(data) {
	 $('#atvtResult').html(data);
    });
	$.post("atvt-buttons.php", { tenhd: tenhd, lop3: lop3},
	function(data) {
	 $('#atvtButtons').html(data);
    });
	
}
