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
				$('#jumlahBarang').val("");
				$('#hargaBarang').val("");
				$('#tbDetailBarang tbody').append(tb);
			}
			
		});

		$(document).on('click', '.hapusrowbarangdetail', function(e){
			e.preventDefault();
			$(this).parent().parent().remove();
		});

		$(document).on('change', '#kodebarangmasuk', function(e){
			e.preventDefault();
			var kodebarangmasuk = $(this).val();
			
			$.ajax({
				url: '<?=base_url()?>c_retur/ambil_detail_barang_by_kodebarang',
				type: 'POST', 
				dataType: 'JSON',
				data: 'kodebarangmasuk='+kodebarangmasuk,
				success: function(JSONObject){
					var hitung = "";
					hitung += '<option value="">--pilih--</option>';
					for (var key in JSONObject) {
						if (JSONObject.hasOwnProperty(key)) {
							hitung += "<option value='"+JSONObject[key]["brngId"]+"'>"+JSONObject[key]["brngId"]+" - "+JSONObject[key]["brngNama"]+"</option>";					
						}
					}
					$("#barang").html(hitung).selectpicker('refresh');;
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