<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.tambahbarangmasukdetail', function(e){
			e.preventDefault();
			$('.hideBarangMasuk').toggle();

		});
		var no = 1;
		$(document).on('click', '.tambahdetail', function(e){
			e.preventDefault();
			var id_barang = $('#barang').val();
			var text_barang = $( "#barang option:selected" ).text();
			var jml_barang = $('#jumlahBarang').val();
			var harga_barang = $('#hargaBarang').val();
			var tb = '';
			

			
			tb += '<tr>' ;
				tb += '<td class="numbering">'+ no +'</td>';
				tb += '<td><input type="hidden" name="idBarangDetail[]" value="'+id_barang+'"/>'+text_barang+'</td>';
				tb += '<td><input type="hidden" name="jmlBarangDetail[]" value="'+jml_barang+'"/>'+jml_barang+'</td>';
				tb += '<td><input type="hidden" name="hargaBarangDetail[]" value="'+harga_barang+'"/>'+harga_barang+'</td>';
				tb += '<td><button class="btn btn-xs btn-danger hapusrowbarangdetail">Hapus</button></td>';
			tb += '</tr>' ;
			no++;
			if(id_barang == ''){
				alert('barang harus diisi');
			}else if(jml_barang == ''){
				alert('jumlah barang harus diisi');
			}else if(harga_barang == ''){
				alert('harga barang harus diisi');
			}else{
				$('#tbDetailBarang tbody').append(tb);
			}
			
		});

		$(document).on('click', '.hapusrowbarangdetail', function(e){
			e.preventDefault();
			$(this).parent().parent().remove();
		});

		$(document).on('change', '#barang', function(e){
			e.preventDefault();
			$('#stokharga').html('Loading...');
			var id_barang = $('#barang').val();
			$.ajax({
				url: '<?=base_url()?>c_barang_keluar/get_stok_harga',
				type: 'POST',
				data: 'id_barang='+id_barang,
				success: function(msg){
					$('#stokharga').html(msg);
				}
			});
		});
	});
</script>
<script src="<?=base_url()?>assets/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-select.min.css">
<script type="text/javascript">
	$(document).ready(function(){
		$('.selectpicker').selectpicker();
	});
</script>