<tr>
	<td style="border-top:1px dashed #ccc;border-bottom:1px dashed #ccc;font-size:12px;padding: 5px 0;">
    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="text-decoration:none;color:#333;">
  		<?=$deal->getTitle()?>
    </a>
	</td>
</tr>
<tr><td height="5"></td></tr>
<tr>
	<td>
    <?=link_to(image_tag($base_url.$deal->getThumb('s'),array('width'=>'150','height'=>'150')),$base_url.'/deal/'.$deal['id'])?>
  </td>
</tr>
<tr><td height="3"></td></tr>
<tr bgcolor="#93aa28" height="35">
  <td style="text-align: center;">
    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="font-weight:bold;font-size:18px;color: #ccc;text-decoration:line-through">$<?=$deal->getRealValue()?></a>
    &nbsp;
    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="font-weight:bold;font-size:22px;color: #fff;text-decoration:none">$<?=$deal->getValue()?></a>
  </td>
</tr>
<tr><td height="23"></td></tr>
