<ul id="user_menu">
  <?if($loggedIn):?>
    <li><?=link_to('LOGOUT','@sf_guard_signout')?></li>
    <li><?=link_to('MI CUENTA','@user_account')?></li>
  <?else:?>
    <li><?=link_to('LOGIN','@sf_guard_signin')?></li>
    <li><?=link_to('REGISTRATE','@user_signup')?></li>
    <li>
      <form class="newsletter" method="POST" action="<?=url_for('@user_suscribe')?>">
        <?php echo $form ?>
        <button class="submit" type="submit"/>&gt;</button>
      </form>    
    </li>
  <?endif?>
</ul>

