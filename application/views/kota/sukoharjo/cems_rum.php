<!DOCTYPE html>
<html>
<body>
<?php foreach($getdata as $data) : ?>
<form action="<?= site_url('cems/send') ?>" method="post">
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
					<label>VELOCITY</label>
				</div>
			</td>
			<td>
				<div class="upandbot">
					<input type="text" name="velocity" id="velocity" value="<?= $data['velocity'] ?>">
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
		var velocity 		= $("#velocity").val();
		var temperature 	= $("#temperature").val();
		if(id_stasiun != '')  
		{  
		    $.ajax({
		         url:"<?php echo site_url('cems/send'); ?>",  
		         method:"POST",  
		         data:{id_stasiun:id_stasiun, waktu:waktu, h2s:h2s, cs2:cs2, velocity:velocity, temperature:temperature},  
		         dataType:"text",  
		         success:function(data)  
		         {  
		              if(data != '')  
		              {  
		                   $('#id_stasiun').val(data);
		              }  
		              $('#autoSave').text("Post save as draft");  
		              location.reload();
		              setInterval(function(){  
		                   $('#autoSave').text('');
		                   location.reload();
		              }, 10000);  
		         }  
		    });  
		}          
	  }  
	  setInterval(function(){   
	       autoSave();
	       location.reload();
	       }, 10000);  
	});
</script>

</body>
</html>