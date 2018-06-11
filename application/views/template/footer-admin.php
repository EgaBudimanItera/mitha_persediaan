<!-- BEGIN SCROLL TO TOP -->
    <div class="scroll-to-top"></div>
</div>

	 <!-- BEGIN JS FRAMEWORK -->
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-2.1.0.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  

  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-flot/jquery.flot.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-flot/jquery.flot.pie.min.js"></script>

  <!-- END JS FRAMEWORK -->
  
  <!-- BEGIN JS PLUGIN -->
  <script src="<?=base_url()?>assets/back-end/assets/plugins/pace/pace.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-totemticker/jquery.totemticker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-resize/jquery.ba-resize.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-blockui/jquery.blockUI.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/icheck/icheck.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/switchery/switchery.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/select2/select2.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap-slider/js/bootstrap-slider.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/js/form.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/js/datatables.js"></script>
  <!-- END JS PLUGIN -->

  <!-- BEGIN JS TEMPLATE -->
  <script src="<?=base_url()?>assets/back-end/assets/js/main.js"></script>
  <!-- END JS TEMPLATE -->
</body>

<!-- Mirrored from vergo-kertas.herokuapp.com/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 May 2016 18:30:30 GMT -->
</html>

<script type="text/javascript">
  $(document).ready(function(){
        $("#info-alert").fadeTo(2000,50).slideUp(50,function(){
            $("#info-alert").slideUp(50);
        })
    })
</script>
<?php if(isset($script)){$this->load->view($script);}?>