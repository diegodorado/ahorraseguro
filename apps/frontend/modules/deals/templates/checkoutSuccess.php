<?php slot('body_class','two_columns checkout') ?>
<?php slot('right_column')?>
  <?include_partial('global/unite')?>
  <?php include_component('deals', 'randomRightDeals') ?>
  <?include_partial('global/banner3')?>
  <?include_partial('global/fb_fanpage')?>
<?php end_slot() ?>
  
<div class="content">
  <h1>Comprar</h1>
  <p>Serás redireccionado al sitio de dineromail.com.ar para completar la compra.</p>
  <form method="POST" action="<?=url_for('@pay')?>">
    <input type="hidden" value="<?=$deal->getId()?>" name="deal_id" />
    <table cellpadding="5" style="width:100%">
      <tr>
        <td style="width: 100px;">
          <?=image_tag($deal->getThumb('s'))?>
        </td>
        <td>
          <table cellpadding="5" style="width:100%">
            <tr class="header">
              <td>Descripción</td>
              <td>Cantidad</td>
              <td></td>
              <td><label>Precio</td>
              <td></td>
              <td>Total</td>
            </tr>
            <tr>
              <td style="width: 240px;"><?=$deal->getTitle()?></td>
              <td>
                <?=qty_input($deal)?>
              </td>
              <td>X</td>
              <td>$<?=$deal->getValue()?></td>
              <td>=</td>
              <td>$<span id="total_amt"><?=$deal->getValue()?></span></td>
            </tr>
            <tr>
              <td></td>
              <td colspan="3"><?=qty_available($deal)?></td>
              <td></td>
              <td><input value="Pagar" class="submit" type="submit"></td>
            </tr>
          </table>    
        </td>
      </tr>
    </table>    
  </form>
</div>

<?page_js();?>
  $('#quantity').bind('click blur keypress keyup', function(event) {
    $('#total_amt').html(this.value*<?=$deal->getValue()?>);
  });
<?end_page_js();?>
