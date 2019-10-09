<table class="table table-bordered table-striped table-hover">
  <tr>
    <td>Validasi</td>
  </tr>
  <tr>
    <td style="color: red;"><?= validation_errors(); ?></td>
  </tr>
</table>

<h4 class="judul-form"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span>Tambah type</a></h4>
<?= form_open_multipart('C_admin/create_type'); ?>
  <table class="table table-bordered table-striped table-hover">
    <tr>
      <td>ID Type</td>
      <td><input type="text" name="id_type"></td>
    </tr>
    <tr>
      <td>Nama type</td>
      <td><input type="text" name="type"></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
    </tr>
  </table>
<?= form_close(); ?>