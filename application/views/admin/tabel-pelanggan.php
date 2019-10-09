
	<p align="center">Tabel pelanggan</p>

	<!--tabel pelanggan-->
	<div class="table-responsive col-lg-12">
		<table id="tabel-pelanggan" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No.</td>
					<td>ID</td>
			        <td>Nama pelanggan</td>
			        <td>Jenis kelamin</td>
			        <td>Alamat</td>
			        <td>No. Hp</td>
			        <td>Username</td>
			        <td>Password</td>
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
		          	<td><?php echo $key->id_pelanggan ?></td> 
		         	<td><?php echo $key->nama_pelanggan ?></td>
		         	<td><?php echo $key->jenis_kelamin ?></td> 
		         	<td><?php echo $key->alamat ?></td> 
		           	<td><?php echo $key->no_hp ?></td>
		           	<td><?php echo $key->username ?></td>
		           	<td><?php echo $key->password ?></td>  
		           	<td><img class="gambar img-circle" src="<?php echo base_url('assets/foto/'.$key->foto); ?>"></td>              
		           	<td><a href='<?php echo base_url("C_admin/get_update_pelanggan/".$key->id_pelanggan); ?>'>
		           			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		           		</a> /         
		           		<a href='<?php echo base_url("C_admin/delete_pelanggan/".$key->id_pelanggan); ?>' onclick="return confirm('Anda yakin hapus ?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		           		</a>
		           	</td>       
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>
</div><br><br><br><br>

<?php $this->load->view('admin/sub/ajax'); ?>