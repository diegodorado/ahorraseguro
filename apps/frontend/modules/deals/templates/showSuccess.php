<?php slot('body_class','two_columns') ?>
<?php slot('right_column')?>
  <?include_partial('global/unite')?>
  <?php include_component('deals', 'randomRightDeals') ?>
  <?include_partial('global/banner3')?>
  <?include_partial('global/fb_fanpage')?>
<?php end_slot() ?>
  
<div class="content">
  <h1><?=$deal->getTitle()?></h1>
  <div class="deal_show" >
    <div class="deal_show_left" >
      <div class="deal_buy_box">
      	<?=link_to('<span class="price">$'.$deal->getValue().'</span><span class="buy_text">COMPRAR</span>','buy',$deal ,array('class'=>'deal_buy'))?>
        <?include_partial('deals/deal_value',array('deal'=>$deal));?>    	
      </div>
      <div class="time_left">
        <h2 >Esta oferta finaliza en:</h2>
        <span id="time_left"></span>
      </div>
      <div class="bought">
        <span><?=bought_count_text($deal)?></span>
        <span class="ok">La oferta está activa</span>
      </div>
      <?=addthis_toolbox($deal)?>    
    </div>
    <?include_partial('deals/deal_show_right',array('deal'=>$deal));?>    	
  </div>
  <?include_partial('deals/deal_show_bottom',array('deal'=>$deal));?>    	
</div>

<?page_js();?>
  $('#time_left').countdown({
      targetTime: <?=$deal->getTargetTime()?> ,
      callback: function(){window.location.reload();}
  });
<?end_page_js();?>        

