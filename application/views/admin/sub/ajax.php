<script type="text/javascript">
	//hide/show
	$(document).ready(function() {
      $("#tombol").click(function() {
        $("#left-menu").toggle("slow");
      })
   	});

	//load halaman
	$(document).ready(function(){
		$('.klik').click(function(){
			var id = $(this).attr('id');
			if(id == "motor"){
				$('#load').load('<?php echo base_url('C_admin/load_tbl_motor'); ?>');						
			}else if(id == "petugas"){
				$('#load').load('<?php echo base_url('C_admin/load_tabel_petugas'); ?>');						
			}else if(id == "pelanggan"){
				$('#load').load('<?php echo base_url('C_admin/load_tbl_pelanggan'); ?>');						
			}else if(id == "animasi1"){
				$('#load').load('<?php echo base_url('C_admin/load_animasi_1'); ?>');						
			}
		});					
	});

	//datatable transaksi
	$(document).ready(function(){
        $('#tabel-transaksi').DataTable();
    });    
	//datatable motor
	$(document).ready(function(){
        $('#tabel-motor').DataTable();
    });
    //datatable merk
	$(document).ready(function(){
        $('#tabel-merk').DataTable();
    });
    //datatable type
	$(document).ready(function(){
        $('#tabel-type').DataTable();
    });
	//datatable pelanggan
	$(document).ready(function(){
        $('#tabel-pelanggan').DataTable();
    });
    //datatable
	$(document).ready(function(){
        $('#tabel-petugas').DataTable();
    });

    //alert
     $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
</script>