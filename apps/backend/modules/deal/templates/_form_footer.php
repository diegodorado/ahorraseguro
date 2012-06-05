<script type="text/javascript" src="/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
  $(function(){
    $('#deal_starts_at').datetime({ chainTo: '#deal_ends_at' });

		$('textarea').tinymce({
			// Location of TinyMCE script
			script_url : '/js/tiny_mce/tiny_mce.js',

			// General options
			theme : "simple",
      height : "220",
      width : "640",
			// Example content CSS (should be your site CSS)
			content_css : "/css/tinymce.css",

		});


    //handles type change
    $("#deal_is_oferton").bind('change', function(event) {
      if($(this).is(':checked')){
        $('.sf_admin_form_field_has_yapa').hide();
        $('.sf_admin_form_field_category_id').hide();
        $("#deal_commission").val(30);
        
      }else{
        $('.sf_admin_form_field_has_yapa').show();
        $('.sf_admin_form_field_category_id').show();
        $("#deal_commission").val(15);
      }
    }).trigger('change');
    
    //get default store quarter.
    $("#deal_store_id").bind('change', function(event) {
		  $.post('/backend.php/deal/json', {store_id: $(this).val()}, function(data){
		    $("#deal_quarter_id").val(data.quarter_id);
		  });
    });




    $("#deal_real_value, #deal_published_value").each(function(index) {
      this.type = 'number';
    });

    $("#deal_offer").attr('disabled', 'disabled');

    $("#deal_published_value, #deal_real_value").bind('change keyup input', function(event){
      var real = parseInt($("#deal_real_value").val(),10);
      var published = parseInt($("#deal_published_value").val(),10);
      var offer =  Math.round(100 - published/real*100);
      if(offer>0){
        $("#deal_offer").val(offer);
      }

    });



  });
</script>
