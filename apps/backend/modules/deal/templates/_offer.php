<style>
.dp100{clear:both;overflow: hidden;}
.dp50{width:50%; float:left; display: inline; *margin-right:-1px;}
</style>


<?php $name = 'offer'; ?>

<div class="sf_admin_form_row sf_admin_text <?php $form[$name]->hasError() and print 'errors' ?>">
  <?php echo $form[$name]->renderError() ?>
  <div class="dp100">
    <div class="dp50">
      <?php echo $form[$name]->renderLabel() ?>
      <div class="content">
        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      </div>
    </div>
    <div class="dp50">
      <label for="deal_publish_price">Precio a Publicar</label>    
      <div class="content">
        <input type="text" value="<?=$form->getObject()->getValue()?>" id="deal_publish_price">    
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
  $(function(){


    $("#deal_offer, #deal_real_value, #deal_publish_price").each(function(index) {
      this.type = 'number';
    });

    $("#deal_offer, #deal_real_value").bind('change keyup input', function(event){
      var real = parseInt($("#deal_real_value").val(),10);
      var offer = parseInt($("#deal_offer").val(),10);
      var publish = Math.round(real*((100-offer)/100));
      if(publish>0){
        $("#deal_publish_price").val(publish);
      }

    });

    $("#deal_publish_price").bind('change keyup input', function(event){
      var real = parseInt($("#deal_real_value").val(),10);
      var publish = parseInt($("#deal_publish_price").val(),10);
      var offer = Math.round(100 - publish/real*100);
      if(offer>0){
        $("#deal_offer").val(offer);
      }
    });





  });
</script>
