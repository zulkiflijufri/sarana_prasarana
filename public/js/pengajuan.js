	// date
	$(function(){
		$(".datepicker").datepicker({
			dateFormat: "dd-MM-yy",
			minDate: 0,
			maxDate: "+1M +5D"
		});
	});

	$(document).ready(function() {
		//$('table[name=cart]').jAutoCalc('destroy');
		$('table[name=cart] tr[name=line_items').jAutoCalc({keyEventsFire: true,emptyAsZero: true,thousandOpts: ['', '.', ' ']});
		$('table[name=cart]').jAutoCalc({keyEventsFire: true,thousandOpts: ['', '.', ' ']});
			});

		//  tambahBaris
		$('.tambahBaris').on('click', function() {
			tambahBaris();
		});

		function tambahBaris() {
			var tr = '<tr name="line_items">'+
			'<td>'+
			'<div class="col-10">'+
			'<input type="text" class="form-control" name="nama_barang[]" autocomplete="off" required>'+
			'</div>'+
			'</td>'+
			'<td>'+
			'<div class="col-10">'+
			'<input type="text" class="form-control" name="link_gambar[]" autocomplete="off" required>'+
			'</div>'+
			'</td>'+
			'<td>'+
			'<div class="col-10">'+
			'<input type="number" class="form-control input_angka quantity" name="quantity[]" autocomplete="off" required>'+
			'</div>'+
			'</td>'+
			'<td>'+
			'<div class="col-10">'+
			'<input type="text" class="form-control" name="satuan_barang[]" autocomplete="off" required>'+
			'</div>'+
			'</td>'+
			'<td>'+
			'<div class="col-10"><a href="#"><span class="lnr lnr-circle-minus hapusBaris"></span></a>'+
			'</div>'+
			'</td>'+
			'</tr>';

			$('tbody').append(tr);

			$(document).ready(function() {
				$('table[name=cart]').jAutoCalc('destroy');
				$('table[name=cart] tr[name=line_items').jAutoCalc({keyEventsFire: true,emptyAsZero: true,thousandOpts: ['', '.', ' ']});
				$('table[name=cart]').jAutoCalc({keyEventsFire: true,thousandOpts: ['', '.', ' ']});
			});

		};
			//hapus baris
			$(document).on('click','.hapusBaris', function() {
				$(this).parents('tr').remove();
				// $('table[name=cart]').jAutoCalc('destroy');
			});