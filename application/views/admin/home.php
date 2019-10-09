<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
?>
	<!--navbar-->
	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand dealer" href="<?php echo base_url('C_admin'); ?>">Admin LTE</a>
				<a id="tombol" class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
				
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>

				<ul class="nav navbar-nav navbar-right">
					<!--Notifikasi pesan-->
                    <li class="dropdown messages-menu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    		<?php foreach ($notif_pesan as $key) {  ?>
                    		Pesanan masuk<span class="badge badge-notif-admin"><?php echo $key->qty ?></span>
                    		<?php } ?>
                    	</a>
                        <ul class="dropdown-menu">
                            <li style="width: 500px;">
                            	<div class="table-responsive">
                            		<table class="table table-bordered table-striped table-hover">
                            			<?php 
                            				$no = 0;
                            				foreach ($query_pesan as $key) { 
                            				$no++;
                            			?>
                            				<tr>
                            					<td><?php echo $no; ?>. &nbsp;
                            						<img style="background-color: #DCDCDC;" class="gambar img-circle" src="<?php echo base_url('assets/foto/'.$key->foto); ?>"> &nbsp;
                            						<?php echo $key->nama_pelanggan ?> &nbsp;
                            						<span class="badge" style="background-color: blue;"><?php echo $key->tgl_pesan ?></span>
                            					</td>
                            					
                            				</tr>
                            			<?php } ?>
                            		</table>
                            	</div>
                            </li>
                            
                        </ul>
                    </li>
					<li><img class="foto-pelanggan img-circle" src="<?php echo base_url('assets/foto/male.png'); ?>"></li>
					<li class="active" onclick="return confirm('Anda yakin ingin keluar ?')">
						<a href="<?php echo base_url("C_admin/logout"); ?>">Logout <span class="glyphicon glyphicon-log-out"></span></a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<!--Container-->
	<div class="container-fluid" style="margin-top: 70px;">
		<!--left menu-->
		<div id="left-menu" class="col-lg-2">
            <div class="row">
		        <ul class="nav nav-list bs-docs-sidenav affix">
		          <li><a href="#" class="klik" id="motor"><i class="glyphicon glyphicon-chevron-right pull-right"></i> Daftar motor</a></li>

		          <?php if ($this->session->userdata('id_pelanggan') == "plg000"){ ?>
		          	
		          <li><a href="#" class="klik" id="petugas"><i class="glyphicon glyphicon-chevron-right pull-right"></i> Daftar petugas</a></li>
		          <li><a href="#" class="klik" id="pelanggan"><i class="glyphicon glyphicon-chevron-right pull-right"></i> Daftar pelanggan</a></li>
		          <hr>
		          <li><a href="<?php echo base_url('C_admin/load_form_motor'); ?>">
		          	<i class="glyphicon glyphicon-chevron-right pull-right"></i> Tambah motor</a>
		          </li>
		          <li><a href="<?php echo base_url('C_admin/load_form_petugas'); ?>">
		          	<i class="glyphicon glyphicon-chevron-right pull-right"></i> Tambah petugas</a>
		          </li>
		          <li><a href="#" data-toggle="modal" data-target="#myModal-merk">
		          	<i class="glyphicon glyphicon-chevron-right pull-right"></i> Tambah merk</a>
		          </li>
		          <li><a href="#" data-toggle="modal" data-target="#myModal-type">
		          	<i class="glyphicon glyphicon-chevron-right pull-right"></i> Tambah type</a>
		          </li>
		          <li><a href="#" class="klik" id="animasi1">
                    <i class="glyphicon glyphicon-chevron-right pull-right"></i> Animasi drum </a>
                  </li>
		      <?php } ?>
		        </ul>
      		</div>
		</div>

		<!--Halaman load-->
		<div class="col-lg-10" id="load">
			<p align="center">Tabel transaksi</p>
			<!--tabel transaksi-->
			<div class="table-responsive col-lg-12">
				<table id="tabel-transaksi" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<td>ID Transaksi</td>
					        <td>Nama pelanggan</td>
					        <td>Produk</td>
					        <td>Harga</td>
					        <td>Jumlah</td>
					        <td>Total harga</td>
					        <td>Pesan</td>
					        <td>Kirim</td>
					        <td>Status</td>
					        <td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($query as $key) { 
						?>
				  		<tr>
				          	<td><?php echo $key->id_transaksi ?></td> 
				         	<td><?php echo $key->nama_pelanggan ?></td>
				         	<td><?php echo $key->merk ?> <?php echo $key->type ?></td> 
				         	<td>Rp <?php echo $key->harga ?></td> 
				           	<td><?php echo $key->jumlah ?></td>
				           	<td>Rp <?php echo $key->total_harga ?></td>
				           	<td><?php echo $key->tgl_pesan ?></td>  
				           	<td><?php echo $key->tgl_kirim ?></td>          
				           	<td><span class="badge <?php echo $key->status ?>"><?php echo $key->status ?></span></td>
				           	<td>
				           		<a href='<?php echo base_url("C_admin/update_transaksi_kirim/".$key->id_detail_transaksi); ?>' onclick="return confirm('Anda yakin mengirim produk ?')"><span class="glyphicon glyphicon-send" style="color: blue;"></span>
		           				</a> /
		           				<a href='<?php echo base_url("C_admin/update_transaksi_batal/".$key->id_detail_transaksi); ?>' onclick="return confirm('Anda yakin membatalkan pengiriman ?')"><span class="glyphicon glyphicon-remove" style="color: red;"></span>
		           				</a>
		           			</td>
				        </tr>
				        <?php } ?>
					</tbody>
				</table>
			</div>
			<!--tabel petugas-->
			<div class="table-responsive col-lg-12" style="margin-top: 20px;">
				<div style="margin-bottom: 10px;">
					<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd">
						<span class="glyphicon glyphicon-plus"></span> Add petugas
					</a>
				</div>
				<table id="tabelpetugas" class="table table-bordered table-striped table-hover">
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
					<tbody id="show_data">	
					</tbody>
				</table>
			</div>
		</div>
		
	</div><br><br><br><br><br><br><br><br><br><br>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Add Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="nama_add" class="form-control" placeholder="Nama petugas">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="radio" name="jekel_add" id="L" class="form-radio"> Laki-laki
                            <br> 
                            <input type="radio" name="jekel_add" id="P" class="form-radio"> Perempuan
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="alamat_add" class="form-control" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="foto_add" class="form-control" placeholder="Foto">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-success" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="id_up" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="nama_up" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="radio" name="jekel_up" id="L" class="form-radio"> Laki-laki
                            <br>
                            <input type="radio" name="jekel_up" id="P" class="form-radio"> Perempuan
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="alamat_up" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="foto_up" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT-->

<?php $this->load->view('admin/sub/footer'); ?>
<?php $this->load->view('admin/sub/ajax'); ?>
<?php $this->load->view('admin/sub/modal'); ?>

<!--Alert update-->
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

<script type="text/javascript">
    $(document).ready(function(){ 
    alert('jj'); 

        //Tampil data.
        var rownumber = 0;
        var tableajax = $('#tabelpetugas').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_admin/load_tbl_petugas") ?>',
            columns: [
	            { 
	                data: null,
	                render: function(data,type,row){
	                    rownumber++;
	                    return rownumber;
	                }
	            },
	            { data: 'id_petugas'},
	            { data: 'nama_petugas' },
	            { data: 'jenis_kelamin' },
	            { data: 'alamat' },
	            {
		            data: null,
		            render: function (data, type, row) {
		                return '<img src="<?php echo base_url() ?>assets/foto/'+row.foto+'" height="40px" width="40px">';
		            }
		        },
	            {
	              data: null,
	              render: function ( data, type, row ) {
	                var ret = '<a href="javascript:;" data="'+row.id_petugas+'" class="item_edit"><span class="glyphicon glyphicon-edit" style="color: blue;"> </span></a>';
	                    ret+= '<a href="javascript:;" data="'+row.id_petugas+'" class="item_hapus"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a>';
	                return ret;
	               }
	            }
	        ]
        });

        //Add
        $('#btn_simpan').on('click',function(e){
            e.preventDefault();
            if ($('#nama_add').val() == ''){
                swal({
                    type: 'warning',
                    title: '',
                    text: 'Nama harus diisi !',
                    timer: 2000,
                    showConfirmButton: false
                });
            }else if ($('#alamat_add').val() == ''){
                swal({
                    type: 'warning',
                    title: '',
                    text: 'Alamat harus diisi !',
                    timer: 2000,
                    showConfirmButton: false
                });
            }else if ($('#foto_add').val() == ''){
                swal({
                    type: 'warning',
                    title: '',
                    text: 'Foto harus diisi !',
                    timer: 2000,
                    showConfirmButton: false
                });
            }else{
                var nama   = $('#nama_add').val();
                var jekel  = $('[name=jekel_add]:checked').attr('id');
                var alamat = $('#alamat_add').val();
                var foto   = $('#foto_add').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('C_admin/add_petugas')?>",
                    dataType : "JSON",
                    data : {nama:nama , jekel:jekel, alamat:alamat, foto:foto},
                    success: function(data){
                        $('#nama_add').val("");
                        $('[name=jekel_add]:checked').prop('checked',false);
                        $('#alamat_add').val("");
                        $('#foto_add').val("");
                        $('#ModalAdd').modal('hide');
                        //alert
                        swal({
                            type: 'success', 
                            title: 'Saved !',
                            text: 'Data berhasil disimpan.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        //triger
                        rownumber=0;
                        tableajax.ajax.reload();
                    },
                    error:function(){
                        $('#ModalAdd').modal('hide');
                        //alert
                        swal({
                            type: 'error', 
                            title: 'Oopss.. !',
                            text: 'Data gagal disimpan.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            }
            return false;
        });

        //GET Update
        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_admin/get_update_petugas')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(){
                        $('#ModalUpdate').modal('show');
                        $('#id_up').val(data.id);
                        $('#nama_up').val(data.nama);
                        $('#jekel_up').val(data.jekel);
                        $('#alamat_up').val(data.alamat);
                        $('#foto_up').val(data.foto);
                    });
                }
            });
            return false;
        });

        //Update
        $('#btn_update').on('click',function(){
            var id     = $('#id_up').val();
            var nama   = $('#nama_up').val();
            var jekel  = $('[name=jekel_up]:checked').attr('id');
            var alamat = $('#alamat_up').val();
            var foto   = $('#foto_up').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_admin/update_petugas')?>",
                dataType : "JSON",
                data : {id:id, nama:nama , jekel:jekel, alamat:alamat, foto:foto},
                success: function(data){
                    $('#ModalUpdate').modal('hide');
                    //alert
                    swal({
                        type: 'success', 
                        title: 'Changed !',
                        text: 'Data berhasil diupdate.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //triger
                    rownumber=0;
                    tableajax.ajax.reload();
                },
                error:function(){
                    $('#ModalUpdate').modal('hide');
                    //alert
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Data gagal dirubah.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
            return false;
        });

        //Hapus
        $('#show_data').on('click','.item_hapus',function(){
            var id = $(this).attr('data');
            swal({
                title: "Anda yakin ?",
                text: "File akan dihapus dan tidak bisa dikembalikan.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya, hapus !",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('C_admin/del_petugas')?>",
                    dataType : "JSON",
                    data : {id:id},
                    success: function(data){
                        //alert
                        swal({
                            type: 'success', 
                            title: 'Deleted !',
                            text: 'Data berhasil dihapus.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        //triger
                        rownumber=0;
                        tableajax.ajax.reload();
                    },
                    error:function(){
                        swal({
                            type: 'error', 
                            title: 'Oopss.. !',
                            text: 'Data gagal dihapus.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });
            return false;
        });

    });
</script>