<div class="deal <?=$deal->isOpen()?'open':'closed'?>">
  <div class="deal_top">
    <h3><?=link_to($deal->getTitle(),'deal',$deal)?></h3>
  </div>
  <div class="deal_left">
    <?=link_to(image_tag($deal->getThumb('m'),array('width'=>'200','height'=>'200')),'deal',$deal)?>
    <div class="bought">
      <?=bought_count_text($deal)?>
    </div>
  </div>
  <div class="deal_right">
    <div class="deal_buy_box">
    	<?=link_to('<span class="price">$'.$deal->getValue().'</span><span class="buy_text">'.($deal->isOpen()?'VER MÁS':'AGOTADO').'</span>','deal',$deal ,array('class'=>'deal_buy'))?>
      <?include_partial('deals/deal_value',array('deal'=>$deal));?>    	
    </div>
    <div class="time_left">
      <?if($deal->isOpen()):?>
        <h4>Esta oferta finaliza en:</h4>
        <span id="time_left_<?=$deal->getId()?>"></span>
      <?else:?>
        <h4>Esta oferta ya ha finalizado</h4>
      <?endif?>
    </div>  
    <?=addthis_toolbox($deal)?>
  </div>
</div>
<?if($deal->isOpen()):?>
  <?page_js();?>
    $('#time_left_<?=$deal->getId()?>').countdown({
        targetTime: <?=$deal->getTargetTime()?> ,
      callback: function(){window.location.reload();}
    });
  <?end_page_js();?>
<?endif?>

