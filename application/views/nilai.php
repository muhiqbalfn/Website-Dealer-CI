<!DOCTYPE html>
<html>
<body>
	
<h3 class="panel-title">Data Nilai Mahasiswa</h3>
	<table class="table table-hover" id="dev-table" border="1">
		<thead>
			<tr>
			<th><center>No</center></th>
			<th><center>Nama</center></th>
			<th><center>Nilai 1</center></th>
			<th><center>Nilai 2</center></th>
			<th><center>Nilai 3</center></th>
			</tr>
		</thead>

		<tbody>
			<?php $no=0; foreach ($dat as $name => $data ) { $no++; ?>
			
			<tr>
			<td><center><?php echo $no;?></center></td>
			<td><center><?php echo $name; ?></center></td>

			<?php foreach ($data as $name2) { ?>
			<td><center><?php echo $name2; ?></center></td>
			<?php } ?>

			</tr>

			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<!-- foreach($kendaraan as $name => $data){
 echo $name . '<br/>';
 foreach($data as $name2 => $value){
 echo $name2 . ': ' . $value[0] . '-' . $value[1].'<br> ';
 }
 echo '<br/>';
}</pre>
<pre> -->