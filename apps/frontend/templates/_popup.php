<?if (time()<mktime(0, 0, 0, 3, 15, 2012) && sfConfig::get('sf_environment')=='prod'):?>
  <div style="z-index:1000;position: fixed;top: 0;left: 0;bottom:0;right:0;background: rgba(0,0,0,0.8);">
    <div style="position:absolute;left:50%;top:50%;margin:-200px 0 0 -295px;width: 590px;height: 400px;background:url(/images/countdown.png);">
        <span id="december_15" style="display: block; font-weight: bold; color: rgb(34, 34, 34); font-size: 36px; margin: 196px 0pt 0pt 286px;"></span>
    </div>
  </div>
  <?page_js();?>
    $('#december_15').countdown({
      targetTime: <?=mktime(0, 0, 0, 3, 15, 2012)?> ,
      callback: function(){window.location.reload();}
    });
  <?end_page_js();?>
<?endif?>
