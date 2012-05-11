<?php slot('body_class','two_columns') ?>
<?php slot('right_column')?>
  <?include_partial('global/unite')?>
  <?php include_component('deals', 'randomRightDeals') ?>
  <?include_partial('global/banner3')?>
  <?include_partial('global/fb_fanpage')?>
<?php end_slot() ?>
  
<div class="content">
  <h1><?=$deal->getTitle()?></h1>
  <div class="deal_show closed" >
    <div class="deal_show_left" >
      <div class="deal_buy_box">
      	<div class="deal_buy">
      	  <span class="price">$<?=$deal->getValue()?></span>
    	  </div>
        <?include_partial('deals/deal_value',array('deal'=>$deal));?>    	
      </div>
      <div class="sold_out">AGOTADO</div>
      <div class="bought">
        <span><?=bought_count_text($deal)?></span>
        <span class="ok">Transacción completada</span>
      </div>
      <?=addthis_toolbox($deal)?>    
    </div>
    <?include_partial('deals/deal_show_right',array('deal'=>$deal));?>    	
  </div>
  <?include_partial('deals/deal_show_bottom',array('deal'=>$deal));?>    	
</div>
