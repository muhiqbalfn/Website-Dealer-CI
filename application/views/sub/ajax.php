<script type="text/javascript">
	//autohiding-navbar
	$(".navbar-fixed-top").autoHidingNavbar({
	});

	//load halaman
	$(document).ready(function(){
		$('.klik').click(function(){
			var id = $(this).attr('id');
			if(id == "profil"){
				$('.load').load('<?php echo base_url('Controller/profil'); ?>');						
			}
		});					
	});
</script>