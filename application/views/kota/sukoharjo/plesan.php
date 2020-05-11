<!DOCTYPE html>
<html>
<body>

<?php foreach($getdata as $data) : ?>
<form action="<?= site_url('cams/plesan') ?>" method="post">
	<table>
		<tr>
			<td>
				<div class="upandbot">
					<label>ID STASIUN</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="hidden" name="id" id="id" value=".$this->session->id.">
					<input type="text" name="id_stasiun" id="id_stasiun" value="<?= $data['id_stasiun'] ?>">
					<?= form_error('id_stasiun'); ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>WAKTU</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="waktu" id="waktu" value="<?= $data['waktu'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>H2S</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="h2s" id="h2s" value="<?= $data['h2s'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>CS2</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="cs2" id="cs2" value="<?= $data['cs2'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>WS</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="ws" id="ws" value="<?= $data['ws'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>WD</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="wd" id="wd" value="<?= $data['wd'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>HUMIDITY</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="humidity" id="humidity" value="<?= $data['humidity'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>TEMPERATURE</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="temperature" id="temperature" value="<?= $data['temperature'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>PRESSURE</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="pressure" id="pressure" value="<?= $data['pressure'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>SR</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="sr" id="sr" value="<?= $data['sr'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<label>RAIN INTENSITY</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="rain_intensity" id="rain_intensity" value="<?= $data['rain_intensity'] ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="upandbot">
					<!-- <button type="submit" name="send" class="btn btn-primary float-right">Send Cams Data</button> -->
					<div id="autoSave"></div>
				</div>
			</td></td>
		</tr>
	</table>
</form>
<?php endforeach ?>

<script type="text/javascript" src="<?= base_url('assets/js/jquery_320_min.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){  
	  function autoSave()  
	  {
	  	var id_stasiun		= $("#id_stasiun").val();
	  	var waktu			= $("#waktu").val();
		var h2s 			= $("#h2s").val();
		var cs2 			= $("#cs2").val();
		var ws 				= $("#ws").val();
		var wd 				= $("#wd").val();
		var humidity 		= $("#humidity").val();
		var temperature 	= $("#temperature").val();
		var pressure 		= $("#pressure").val();
		var sr 				= $("#sr").val();
		var rain_intensity 	= $("#rain_intensity").val();
		if(id_stasiun != '')  
		{  
		    $.ajax({
		         url:"<?php echo site_url('cams/plesan'); ?>",  
		         method:"POST",  
		         data:{id_stasiun:id_stasiun, waktu:waktu, h2s:h2s, cs2:cs2, ws:ws, wd:wd, humidity:humidity, temperature:temperature, pressure:pressure, sr:sr, rain_intensity:rain_intensity},  
		         dataType:"text",  
		         success:function(data)  
		         {  
		              if(data != '')  
		              {  
		              	location.reload();
		                $('#id_stasiun').val(data);
		              }  
		              $('#autoSave').text("SEND SUCCESS");  
		              location.reload();
		              setInterval(function(){
		              	location.reload();
		                $('#autoSave').text('');
		                location.reload();
		                location.reload();
		              }, 10000);  
		         }  
		    });  
		}          
	  }  
	  setInterval(function(){
	  	location.reload();
		autoSave();
		location.reload();
		}, 10000);  
	});
</script>

</body>
</html>