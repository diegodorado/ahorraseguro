<?php slot('body_class','promo_show two_columns') ?>
<?php slot('right_column')?>
  <?include_partial('global/unite')?>
  <?include_partial('global/banner3')?>
  <?include_partial('global/fb_fanpage')?>
<?php end_slot() ?>
  
<div class="content">
  <h1><?=$deal->getTitle()?></h1>
  <div class="deal_show promo_deal" >
    <div class="deal_show_left" >
      <a class="deal_print_box" href="<?=url_for('print',$deal)?>"> 
        <span class='title'>Imprimir</span> 
        <span class='subtitle'>haz click aquí para imprimir tu cupón</span> 
      </a> 
      <div class="bought">
        <span><?=printed_count_text($deal)?></span>
      </div>
      <?=addthis_toolbox($deal)?>    
    </div>

    <div class="deal_show_right" >
      <div class="image">
        <?=image_tag($deal->getThumb('b'))?>
      </div>
    </div>

  </div>
  <?include_partial('deals/deal_show_bottom',array('deal'=>$deal));?>    	
</div>
