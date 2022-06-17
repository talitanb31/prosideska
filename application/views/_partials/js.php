<script src="<?php echo base_url() ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo base_url() ?>assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url() ?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<!-- Datatables -->
<!-- <script src="<?php echo base_url() ?>assets/backup/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets/backup/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "pageLength": 5,
      "bLengthChange": false,
    });

    $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("fa-eye-slash");
        $('#show_hide_password i').removeClass("fa-eye");
      } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("fa-eye-slash");
        $('#show_hide_password i').addClass("fa-eye");
      }
    });
    $('.select2').select2({
      closeOnSelect: false
    });

  });
</script>
<?php if ($this->uri->segment(1) == 'welcome') : ?>
  <script src="<?php echo base_url() ?>assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
    <?php endif ?>
  </script>