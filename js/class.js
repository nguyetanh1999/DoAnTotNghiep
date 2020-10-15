
(function ($) {
	"use strict";
	$('.column100').on('mouseover',function(){
		var table1 = $(this).parent().parent().parent();
		var table2 = $(this).parent().parent();
		var verTable = $(table1).data('vertable')+"";
		var column = $(this).data('column') + ""; 

		$(table2).find("."+column).addClass('hov-column-'+ verTable);
		$(table1).find(".row100.head ."+column).addClass('hov-column-head-'+ verTable);
	});

	$('.column100').on('mouseout',function(){
		var table1 = $(this).parent().parent().parent();
		var table2 = $(this).parent().parent();
		var verTable = $(table1).data('vertable')+"";
		var column = $(this).data('column') + ""; 

		$(table2).find("."+column).removeClass('hov-column-'+ verTable);
		$(table1).find(".row100.head ."+column).removeClass('hov-column-head-'+ verTable);
	});
    

})(jQuery);
function alertAddclass(){
	alert('Tạo lớp thành công!'); window.location='../index.php?t=GV'
}

///////////////////////////////////////////MỞ FORM/////////////////////////////////
function openFormupdatesvForm() {
  document.getElementById("updatesvForm").style.display = "block";
}

function openFormaddrowForm() {
  document.getElementById("addrowForm").style.display = "block";
}

function openFormupdatehtForm() {
  document.getElementById("updatehtForm").style.display = "block";
}

function openFormupdaterlForm() {
  document.getElementById("updaterlForm").style.display = "block";
}

function openFormaddatvtForm() {
  document.getElementById("addatvtForm").style.display = "block";
}

function openFormupdateatvtForm() {
  document.getElementById("updateatvtForm").style.display = "block";
}

////////////////////////////////////////ĐÓNG FORM///////////////////////////////////////
function closeFormupdatesvForm() {
  document.getElementById("updatesvForm").style.display = "none";
}

function closeFormaddrowForm() {
  document.getElementById("addrowForm").style.display = "none";
}

function closeFormupdatehtForm() {
  document.getElementById("updatehtForm").style.display = "none";
}

function closeFormupdaterlForm() {
  document.getElementById("updaterlForm").style.display = "none";
}

function closeFormaddatvtForm() {
  document.getElementById("addatvtForm").style.display = "none";
}

function closeFormupdateatvtForm() {
  document.getElementById("updateatvtForm").style.display = "none";
}

function closeFormexportatvtForm() {
  document.getElementById("exportatvtForm").style.display = "none";
}

