<?php foreach($deals as $deal):?>
<?
/*
  <a href="<?=url_for('deal',$deal)?>" class="deal_box" style="background: url(<?=$deal->getThumb('box')?>);height:224px;">
    <span class="title"><?=$deal->getTitle()?></span>
  </a>	
*/?>
<?php endforeach ?>

<div class="random_deals">
  <h3>Ofertas<?//=DealTable::getRandomTitle()?></h3>
  <?php foreach($deals as $deal):?>
    <a href="<?=url_for('deal',$deal)?>" class="deal" style="background: url(<?=$deal->getThumb('m')?>);">
      <span class="title"><?=$deal->getTitle()?></span>
    </a>	
  <?php endforeach ?>
</div>
