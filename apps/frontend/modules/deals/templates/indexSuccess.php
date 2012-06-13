<?php slot('body_class','three_columns') ?>
<?php slot('left_column')?>
  <?include_partial('global/banner1')?>
  <?php include_component('deals', 'randomLeftDeals') ?>
  <?include_partial('global/banner2')?>
  <?include_partial('global/asegurado')?>
  <?include_partial('global/empresas')?>
<?php end_slot() ?>
<?php slot('right_column')?>
  <?include_partial('global/youtube')?>
  <?php include_component('deals', 'randomRightDeals') ?>
  <?include_partial('global/fb_fanpage')?>
  <?include_partial('global/banner3')?>
<?php end_slot() ?>

<div class="content">
  <h1><?=$title?></h1>
  <?php foreach($deals as $deal):?>
    <?include_partial('deals/deal',array('deal'=>$deal));?>
  <?php endforeach ?>
</div>	


<?if ($ref=='logo'):?>
  <div style="z-index:1000;position: fixed;top: 0;left: 0;bottom:0;right:0;background: #000;background: rgba(0,0,0,0.8);">
    <div style="position:absolute;left:50%;top:50%;margin:-200px 0 0 -400px;width: 800px;height: 400px;background:url(/images/banners/promo.png);">
      <a href="<?=url_for('@homepage')?>" style="position: absolute;bottom: 12px;display: block;line-height: 68px;right: 316px;width: 222px;text-indent: 1000px;overflow: hidden;">
        ver
        </a>
      <a href="<?=url_for('@user_signup')?>" style="position: absolute;bottom: 12px;display: block;line-height: 68px;right: 70px;width: 222px;text-indent: 1000px;overflow: hidden;">
        registrarme
        </a>
    </div>
  </div>
<?endif?>  
