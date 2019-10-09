	
	<p align="center">Tabel petugas</p>

	<!--tabel petugas-->
	<div class="table-responsive col-lg-12">
		<table id="tabel-petugas" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No.</td>
					<td>ID</td>
			        <td>Nama petugas</td>
			        <td>Jenis kelamin</td>
			        <td>Alamat</td>
			        <td>Foto</td>
			        <td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 0;
					foreach ($query as $key) { 
					$no++;
				?>
		  		<tr>
		  			<td><?php echo $no ?></td>
		          	<td><?php echo $key->id_petugas ?></td> 
		         	<td><?php echo $key->nama_petugas ?></td>
		         	<td><?php echo $key->jenis_kelamin ?></td> 
		         	<td><?php echo $key->alamat ?></td>             
		         	<td><img class="gambar img-circle" src="<?php echo base_url('assets/foto/'.$key->foto); ?>"></td>   
		           	<td><a href='<?php echo base_url("C_admin/get_update_petugas/".$key->id_petugas); ?>'>
		           			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		           		</a> /         
		           		<a href='<?php echo base_url("C_admin/delete_petugas/".$key->id_petugas); ?>' onclick="return confirm('Anda yakin hapus ?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		           		</a>
		           	</td>       
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php $this->load->view('admin/sub/ajax'); ?>