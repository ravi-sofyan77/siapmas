$(document).ready(function () { 

    $(".next1").click(function(){
      $(".data1").removeClass("active");
      $(".data2").addClass("active");
      $(".data3").removeClass("active");

      $(".next1").removeClass("active");
    });
    $(".next2").click(function(){
      $(".data1").removeClass("active");
      $(".data2").removeClass("active");
      $(".data3").addClass("active");

      $(".next2").removeClass("active");
    });
    $(".back1").click(function(){
      $(".data1").addClass("active");
      $(".data2").removeClass("active");
      $(".data3").removeClass("active");

      $(".back1").removeClass("active");
    });
    $(".back2").click(function(){
      $(".data1").removeClass("active");
      $(".data2").addClass("active");
      $(".data3").removeClass("active");

      $(".back2").removeClass("active");
    });

	if ($('#gl-table').length == 1) {
        console.log($('#gl-table').length);
		$('#gl-table').DataTable();
	}

	$(document).on('change', ':file', function() {
        var input   = $(this),
        numFiles    = input.get(0).files ? input.get(0).files.length : 1,
        label       = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        if (typeof input.get(0).files[0] !== "undefined" ) {
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log($('.img-responsive').length);
                $('.img-responsive').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.get(0).files[0]);
            $('.btn-file').after(label);
        }
        
    });
    
	$(document).on('click','.btn-confirm-link',function(){
        if(confirm('Anda sudah yakin? tindakan ini tidak dapat mengembalikan keadaan sebelumnya')){
            return true;
        }
        return false;
    });
    
    $('textarea[name="url_post"]').on('paste', function () {
        var element = this;
        setTimeout(function () {
            var text     = $(element).val();
            var pecah    = text.split('/');
            console.log(pecah);
            var base_url = pecah[2];
            $('input[name="alamat_website"]').val(base_url);
            
        }, 100);
    });

});