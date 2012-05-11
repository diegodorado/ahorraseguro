<?php use_helper('Date') ?>
<tr>
	<td style="border-top:1px dashed #ccc;border-bottom:1px dashed #ccc;font-size:18px;padding:7px 0">
    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="text-decoration:none;color:#333;">
  		<?=$deal->getTitle()?>
    </a>
	</td>
</tr>
<tr>
  <td height="9"></td>
</tr>
<tr>
	<td>
		<table width="434" border="0" cellpadding="0" cellspacing="0">
  	  <tr>
			<td>
				<table width="202" height="230" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					  <td>
              <?=link_to(image_tag($base_url.$deal->getThumb('m'),array('width'=>'200','height'=>'200')),$base_url.'/deal/'.$deal['id'])?>
					  </td>
				  </tr>
				  <tr>
  					<td height="4"></td>
				  </tr>
				  <tr>
					  <td height="22" style="color:#333;font-size:12px; border:1px solid #99c368;padding:5px">
					    Con tu compra AHORRÁ <strong>$<?=$deal->getDiscount()?></strong>
					  </td>
				  </tr>
				</table>
			</td>
			<td width="14"></td>
			<td>
				<table width="218" height="230" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					  <td bgcolor="#93aa28" width="218" height="70">
						  <table width="218">
						    <tr style="text-align: center;">
							    <td>
								    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="font-weight:bold;font-size:32px;color: #fff;text-decoration:none">
									    $<?=$deal->getValue()?>
								    </a>
							    </td>
							    <td>
								    <a href="<?=$base_url.'/deal/'.$deal['id']?>" style="padding:12px 8px;font-size:14px;color: #444;background:#fecd07;border:3px solid #fff;border-radius:15px;text-decoration:none">
									    VER MÁS
								    </a>
							    </td>
						    </tr>
						  </table>
					  </td>
				  </tr>
				  <tr>
					  <td bgcolor="#ddedcc" width="218" height="47" style="color:#484848; border:1px solid #99c368;font-weight:bold;">
						  <table width="218">
						    <tr style="font-size:12px;text-align: center;">
							    <td>Valor</td>
							    <td>Descuento</td>
							    <td>Ahorro</td>
						    </tr>
						    <tr style="font-size:18px;text-align: center;">
                  <td>$<?=$deal->getRealValue()?></td>
                  <td><?=$deal->getOffer()?>%</td>
                  <td>$<?=$deal->getDiscount()?></td>
						    </tr>
						  </table>
					  </td>
				  </tr>
				  <tr>
  					<td height="6"></td>
				  </tr>
				  <tr>
					  <td bgcolor="#cbe4f5" height="58" style="color:#333;font-size:12px; border:1px solid #65c8e2;padding:5px;font-weight:bold;text-align: center;">
						  <?=format_datetime($deal->getEndsAt(), "'Finaliza el' d 'de' MMMM '<br/>a las' H:m'hs'", 'es')?>
					  </td>
				  </tr>
				  <tr>
  					<td height="6"></td>
				  </tr>
				  <tr>
					  <td bgcolor="#e7e7e7" height="42" style="border:1px solid #ccc;">
							<a href="<?=$base_url?>" style="color:#333;font-size:12px; padding:5px;text-align: center;display:block;text-decoration:none">
  						  Quiero ver más <strong>ofertas!</strong>
					    </a>
					  </td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>
	</td>
</tr>
<tr>
  <td height="20"></td>
</tr>

