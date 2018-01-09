$(document).ready(function () { 
	var id_keluarga = "";
	var id_person = "";

	// clean form
	$('#modalAngkel').on('show.bs.modal', function (e) {
			});

	$('#submitAngkel').click(function(event) {
		/* Act on the event */

		$(".list_angkel").
			append("<div class='col-sm-12 angkel' id='"+$("input[name='id_person']").val()+"'>"+
						$("input[name='angkel']").val()+

						"<div style='display:none;'>"+
							"<p class='pendidikan_terakhir'>"+$("input[name='pendidikan_terakhir']").val()+"</p>"+
							"<p class='pekerjaan'>"+$("input[name='pekerjaan']").val()+"</p>"+
							"<p class='status_pernikahan'>"+$("input[name='status_pernikahan']").val()+"</p>"+
							"<p class='hub_keluarga'>"+$("input[name='hub_keluarga']").val()+"</p>"+
							"<p class='kewarganegaraan'>"+$("input[name='kewarganegaraan']").val()+"</p>"+
							"<p class='passport_nomor'>"+$("input[name='passport_nomor']").val()+"</p>"+
							"<p class='passport_tgl_terakhir'>"+$("input[name='passport_tgl_terakhir']").val()+"</p>"+
						"</div>"+
					"</div>"

			);

		$('input[name="angkel"], input[name="id_person"], input[name="pendidikan_terakhir"], input[name="pekerjaan"], input[name="status_pernikahan"], input[name="hub_keluarga"], input[name="kewarganegaraan"], input[name="passport_nomor"], input[name="passport_tgl_terakhir"]').val("");		
	});

	$( "#submitKeluarga" ).click(function( event ) {
		event.preventDefault();
		$.ajax({
	        url : 			base_url+"welcome/simpan_keluarga",
			cache:        	false,
	        data:         	{
	        				no_kk: 		$("input[name='no_kk']").val(),
	        				alamat: 	$("textarea[name='alamat']").val(),
	        				rt: 		$("input[name='rt']").val(),
	        				rw: 		$("input[name='rw']").val(),
	        				desa: 		$("input[name='desa']").val(),
	        				kelurahan: 	$("input[name='kelurahan']").val(),
	        				kecamatan: 	$("input[name='kecamatan']").val(),
	        				kabupaten: 	$("input[name='kabupaten']").val(),
	        				kota: 		$("input[name='kota']").val(),
	        				kode_pos: 	$("input[name='kode_pos']").val(),
	        				provinsi: 	$("input[name='provinsi']").val()
	        				},
	        dataType:     	'json',
	        contentType:  	'application/json; charset=utf-8',
	        type:         	'get',
	        success: function(output)
	        {
	        	id_keluarga = output.id;
	        	$(".list_angkel .angkel").each(function(index, value) {
					id_person= $(this).attr("id");
					//alert(id_keluarga+' '+id_person);
					input_angkel(id_keluarga,
								 id_person,
								 $('div#'+id_person+' p.pendidikan_terakhir').text(),
								 $('div#'+id_person+' p.pekerjaan').text(),
								 $('div#'+id_person+' p.status_pernikahan').text(),
								 $('div#'+id_person+' p.hub_keluarga').text(),
								 $('div#'+id_person+' p.kewarganegaraan').text(),
								 $('div#'+id_person+' p.passport_nomor').text(),
								 $('div#'+id_person+' p.passport_tgl_terakhir').text()
								 );
				});
				window.location.href = base_url+'welcome/daftar/keluarga';
	        },
	        error: function (xhr, status, error)
	        {
  				alert('Gagal');
	        }
	    });
	});

});

function input_angkel(id_keluarga,id_person,pendidikan_terakhir,pekerjaan,status_pernikahan,hub_keluarga,kewarganegaraan,passport_nomor,passport_tgl_terakhir)
{
	$.ajax({
		url: 		base_url+'welcome/simpan_angkel',
		data:       {
        				id_keluarga: 			id_keluarga,
        				id_person: 				id_person,
        				pendidikan_terakhir: 	pendidikan_terakhir,
        				pekerjaan: 				pekerjaan,
        				status_pernikahan: 		status_pernikahan,
        				hub_keluarga: 			hub_keluarga,
        				kewarganegaraan: 		kewarganegaraan,
        				passport_nomor: 		passport_nomor,
        				passport_tgl_terakhir: 	passport_tgl_terakhir		
        			},
        dataType:     	'json',
        contentType:  	'application/json; charset=utf-8',
        type:         	'get',
        success: function(output){
           	
        },
        error: function(output){
        	
        }
    });	
}