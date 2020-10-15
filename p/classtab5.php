            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="../js/submit.js"></script>
			<div class="sls-wrap">
					<div id="slsform" class="slsform" method="post" enctype="multipart/form-data">
						  <select name="hocki" id="hocki" class="sls-select">
							<option value="1">HK 1</option>
							<option value="2">HK 2</option>
							<option value="3">HK 3</option>
							<option value="4">HK 4</option>
							<option value="5">HK 5</option>
							<option value="6">HK 6</option>
							<option value="7">HK 7</option>
						  </select>
						 <input type="number" id="dht" name="dht" placeholder="Điểm học tập">
						 <input type="number" id="drl" name="drl" placeholder="Điểm rèn luyện">
						 <input type="hidden" id="lop1" name="lop" value="<?php echo $name; ?>"/>
						 <button class="Updatebtn1" id="timHB" type="button" onclick="SubmitFormData();" name="search"/>Lọc</button>
					 </div>
<script>
$(document).ready(function(){
    $("#dht").keypress(function(e){
        if (e.which === 13){
            $('#timHB').click();
            e.preventDefault();
            return false;
        }
    });
});</script>

			</div>
		<div id="sls-list">
        </div>