<?php
require_once "config.php";
        $lop = $_POST['lop3'];
		$tenhd = $_POST['tenhd'];

?>
<script type="text/javascript">
    closeFormexportatvtForm();
</script>

<a class="Exportbtn" id="export" href="export.php?t=hoatdong&l=<?php echo $lop;?>&tenhd=<?php echo $tenhd;?>">Xuất file Excel</a>
<form id="atvtDelete" action="ud-delete.php?t=delete" style="background-color:red; margin-top:-20px;" method="post">
<input type="hidden" id="lop" value="<?php echo $lop;?>" name="lop"/>
<input type="hidden" id="tenhd" value="<?php echo $tenhd;?>" name="tenhd"/>
<button type="submit" class="Editbtn" name="import" onclick="return confirm('Xác nhận xóa?')" style="border-color:red; background-color:red;">Xóa hoạt động này</button>
</form>
