<!--modal merk-->
<div class="modal fade" id="myModal-merk">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title login-modal">Tambah merk</h4>
			</div>
			<div class="modal-body">
				<?php $this->load->view('admin/form-tambah-merk'); ?>
			</div>
		</div>
	</div>
</div>

<!--modal type-->
<div class="modal fade" id="myModal-type">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title login-modal">Tambah type</h4>
			</div>
			<div class="modal-body">
				<?php $this->load->view('admin/form-tambah-type'); ?>
			</div>
		</div>
	</div>
</div>