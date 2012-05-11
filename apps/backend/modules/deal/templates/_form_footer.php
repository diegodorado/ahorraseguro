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
    $("input:radio").change( function() {
      toggle_type();
    });
    
    function toggle_type(){
      var t=$('.radio_list input:checked').val();

      $('.sf_admin_form_field_category_id').hide();
      $('.sf_admin_form_field_bought_count').hide();
      $('.sf_admin_form_field_printed_count').hide();
      $('#sf_fieldset_precios').hide();

      if(t=='O'){
        $('.sf_admin_form_field_bought_count').show();
        $('#sf_fieldset_precios').show();
      }
      if(t=='D'){
        $('.sf_admin_form_field_category_id').show();
        $('.sf_admin_form_field_bought_count').show();
        $('#sf_fieldset_precios').show();
      }
      if(t=='P'){
        $('.sf_admin_form_field_category_id').show();
        $('.sf_admin_form_field_printed_count').show();
      }
    
    }

    toggle_type();

  });
</script>
