<div class="deal promo_deal">
  <div class="deal_top">
    <h3><?=link_to($deal->getTitle(),'deal',$deal)?></h3>
  </div>
  <?=link_to(image_tag($deal->getThumb('b')),'deal',$deal ,array('class'=>'deal_center'))?>
  <div class="deal_bottom">
    <div class="printed">
      <?=printed_count_text($deal)?>
    </div>
    <?=addthis_toolbox($deal)?>
  </div>
</div>
