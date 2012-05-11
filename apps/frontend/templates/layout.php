<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?include_http_metas()?>
    <?include_metas()?>
    <?include_title()?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?include_stylesheets()?>
  </head>
  <body class="<?php include_slot('body_class') ?>">
    <div id="oc">
      <div id="ic">
        <?include_partial('global/header')?>
        <?include_partial('global/messages')?>
        <div id="content">
          <?php if (has_slot('left_column')): ?>
            <div class="left_column"><?php include_slot('left_column') ?></div>
          <?php endif ?>
          <div class="main_column">
            <?=$sf_content?>
          </div>
          <?php if (has_slot('right_column')): ?>
            <div class="right_column"><?php include_slot('right_column') ?></div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <?include_partial('global/footer')?>
    <?include_partial('global/popup')?>
    <?include_javascripts()?>
    <script type="text/javascript">
      //<![CDATA[
      $(function(){ <?php include_slot('page_js') ?> });
      //]]>
    </script>    
  </body>
</html>
