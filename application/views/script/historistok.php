<script src="<?=base_url()?>assets/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-select.min.css">
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.lihat', function(e){
			e.preventDefault();
			var data = $('#frm_historistok').serialize();
			$('#result').html('Loading...');
			$.ajax({
				url: '<?=base_url()?>c_histori/lihat_historistok_barang',
				type: 'POST',
				data: data,
				success: function(msg){
					$('#result').html(msg);
				}
			});
		});
		$('.selectpicker').selectpicker();
	});
</script>
