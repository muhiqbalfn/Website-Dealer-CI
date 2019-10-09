			
	<p align="center">Tabel motor</p>

	<!--tabel motor-->
	<div class="table-responsive col-lg-12">
		<table id="tabel-motor" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No.</td>
					<td>ID</td>
			        <td>Merk</td>
			        <td>Type</td>
			        <td>Tahun</td>
			        <td>Warna</td>
			        <td>Harga</td>
			        <td>Stok</td>
			        <td>Gambar</td>
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
		          	<td><?php echo $key->id_motor ?></td> 
		         	<td><?php echo $key->merk ?></td>
		         	<td><?php echo $key->type ?></td> 
		         	<td><?php echo $key->tahun ?></td> 
		           	<td><?php echo $key->warna ?></td>
		           	<td><?php echo $key->harga ?></td>
		           	<td><?php echo $key->stok ?></td>  
		           	<td><img class="gambar" src="<?php echo base_url('assets/motor/'.$key->img_motor); ?>"></td>              
		           	<td><a href='<?php echo base_url("C_admin/get_update_motor/".$key->id_motor); ?>'>
		           			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		           		</a> /         
		           		<a href='<?php echo base_url("C_admin/delete_motor/".$key->id_motor); ?>' onclick="return confirm('Anda yakin hapus ?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		           		</a>
		           	</td>       
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div><br>

	<!--Table merk-->
	<div class="table-responsive col-lg-6">
		<table id="tabel-merk" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No.</td>
					<td>ID Merk</td>
			        <td>Nama merk</td>
			        <td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 0;
					foreach ($merk as $key) { 
					$no++;
				?>
		  		<tr>
		  			<td><?php echo $no ?></td>
		          	<td><?php echo $key->id_merk ?></td> 
		         	<td><?php echo $key->merk ?></td>              
		           	<td><a href='<?php echo base_url("C_admin/get_update_merk/".$key->id_merk); ?>'>
		           			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		           		</a> /         
		           		<a href='<?php echo base_url("C_admin/delete_merk/".$key->id_merk); ?>' onclick="return confirm('Anda yakin hapus ?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		           		</a>
		           	</td>       
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>
	<!--Table type-->
	<div class="table-responsive col-lg-6">
		<table id="tabel-type" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No.</td>
					<td>ID Type</td>
			        <td>Nama type</td>
			        <td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 0;
					foreach ($type as $key) { 
					$no++;
				?>
		  		<tr>
		  			<td><?php echo $no ?></td>
		          	<td><?php echo $key->id_type ?></td> 
		         	<td><?php echo $key->type ?></td>              
		           	<td><a href='<?php echo base_url("C_admin/get_update_type/".$key->id_type); ?>'>
		           			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		           		</a> /         
		           		<a href='<?php echo base_url("C_admin/delete_type/".$key->id_type); ?>' onclick="return confirm('Anda yakin hapus ?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		           		</a>
		           	</td>       
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>

<?php $this->load->view('admin/sub/ajax'); ?>