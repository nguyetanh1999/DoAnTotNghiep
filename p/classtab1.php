            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="../js/submit.js"></script>
<div class="wrap">
   <div class="search">
         <input id="mssv" type="number" name="NhapMSSV" class="searchTerm" placeholder="Nhập mã số sinh viên..." required>
         <input type="hidden" id="lop2" name="lop" value="<?php echo $name; ?>"/>
         <button type="button" id="timMSSV" class="searchButton" onclick="SubmitFormData();" name="Nhap">
         <i class="fa fa-search"></i>
         </button>
   </div>
</div>

<script>	
$(document).ready(function(){
    $("#mssv").keypress(function(e){
        if (e.which === 13){
            $('#timMSSV').click();
            e.preventDefault();
            return false;
        }
    });
});</script>

		<div id="profile">
        </div>