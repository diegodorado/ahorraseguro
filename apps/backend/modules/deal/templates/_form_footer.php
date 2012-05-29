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
      }else{
        $('.sf_admin_form_field_has_yapa').show();
        $('.sf_admin_form_field_category_id').show();
      }
    }).trigger('change');
    
    //get default store quarter.
    $("#deal_store_id").bind('change', function(event) {
		  $.post('/backend.php/deal/json', {store_id: $(this).val()}, function(data){
		    $("#deal_quarter_id").val(data.quarter_id);
		  });
    });







  });
</script>
