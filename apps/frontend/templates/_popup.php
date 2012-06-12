<?php $release_on = mktime(0, 0, 0, 6, 13, 2012);?>


<?if ($_SERVER['REQUEST_URI']=='/'):?>
  <?if (time()<$release_on) :?>
    <div style="z-index:1000;position: fixed;top: 0;left: 0;bottom:0;right:0;background: #000;background: rgba(0,0,0,0.8);">
      <div style="position:absolute;left:50%;top:50%;margin:-200px 0 0 -295px;width: 590px;height: 400px;background:url(/images/countdown.png);">
          <span id="release_on" style="display: block; font-weight: bold; color: rgb(34, 34, 34); font-size: 36px; margin: 196px 0pt 0pt 286px;"></span>
      </div>
    </div>
    <?page_js();?>
      $('#release_on').countdown({
        targetTime: <?=$release_on?> ,
        callback: function(){window.location.reload();}
      });
    <?end_page_js();?>
  <?else:?>
    <div style="z-index:1000;position: fixed;top: 0;left: 0;bottom:0;right:0;background: #000;background: rgba(0,0,0,0.8);">
      <div style="position:absolute;left:50%;top:50%;margin:-200px 0 0 -400px;width: 800px;height: 400px;background:url(/images/promo.png);">
      </div>
      <a href="/index.php" style="position: absolute;bottom: 12px;display: block;line-height: 68px;right: 316px;width: 222px;text-indent: 1000px;overflow: hidden;">
        ver
        </a>
      <a href="/register" style="position: absolute;bottom: 12px;display: block;line-height: 68px;right: 70px;width: 222px;text-indent: 1000px;overflow: hidden;">
        registrarme
        </a>
    </div>
  <?endif?>
<?endif?>  
