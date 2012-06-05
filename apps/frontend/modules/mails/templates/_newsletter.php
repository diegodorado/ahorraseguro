<table style="font-family: verdana" width="677"  border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#fff" >
    <td style="text-align:right;padding:10px;font-size:12px; color:#222">
      Si no puede visualizar bien este mensaje, <a href="<?=$base_url?>" style="color:#222">haga click aquí</a>
	  </td>
  </tr>
  <tr bgcolor="#fda424" >
    <td style="text-align:right;padding:22px 15px 10px 0;letter-spacing:-1px;font-size:12px; color:#222">
      OFERTONES | OFERTAS | YAPAS y MUCHO MÁS
	  </td>
  </tr>
  <tr bgcolor="#262626" height="95">
    <td style="padding-left:15px;background: url(<?=$base_url?>/images/newsletter/header.jpg) center right no-repeat">
      <a href="<?=$base_url?>">
	      <?=image_tag($base_url.'/images/logo.png', array('alt'=>'Ahorra Seguro'))?>
      </a>
	  </td>
  </tr>
  <tr>
    <td bgcolor="#7d7d7d" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#fff" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#ffc29a" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#fda424" height="14"></td>
  </tr>
  <tr>
    <td>
		  <table width="677" border="0" cellpadding="0" cellspacing="0">
		    <tr>
			    <td bgcolor="#fda424" width="11" ></td>
			    <td bgcolor="#fff" width="15" ></td>
			    <td bgcolor="#fff" width="434" valign="top">
				    <table width="434" border="0" cellpadding="0" cellspacing="0">
              <tr>
	              <td style="font-weight: bold;font-size:18px;padding:7px 0">
                  OFERTONES de HOY
	              </td>
              </tr>
				      <?foreach($big_deals as $big_deal):?>
  				      <?include_partial('mails/big_deal',array('base_url'=>$base_url,'deal'=>$big_deal))?>
				      <?endforeach?>
				      <tr>
      					<td height="30"></td>
				      </tr>
				    </table>
			    </td>
			    <td bgcolor="#fff" width="15" ></td>
			    <td bgcolor="#fda424" width="11" ></td>
			    <td bgcolor="#fff" width="15" ></td>
			    <td bgcolor="#fff" width="150" valign="top">
				    <table width="150" border="0" cellpadding="0" cellspacing="0" >
              <td style="font-weight: bold;font-size:14px;padding:7px 0">
                OFERTAS
              </td>
				      <?foreach($deals as $deal):?>
  				      <?include_partial('mails/deal',array('base_url'=>$base_url,'deal'=>$deal))?>
				      <?endforeach?>
				      <tr>
      					<td height="30"></td>
				      </tr>
				    </table>			    
			    </td>
			    <td bgcolor="#fff" width="15" ></td>
			    <td bgcolor="#fda424" width="11" ></td>
		    </tr>
		  </table>
	  </td>
  </tr>
  <tr>
    <td bgcolor="#fda424"height="19"></td>
  </tr>
  <tr>
    <td bgcolor="ffc29a" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#fff" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#7d7d7d" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="#262626" height="70" style="padding:20px;font-size:10px; color:#fff">
		  <span> Este e-mail no podrá ser considerado SPAM mientras incluya una forma de ser removido </span>
		  <br/>
		  <br/>
		  <span> -- </span>
		  <br/>
		  <span> Si usted no quiere recibir más este newsletter, <a href="<?=$base_url?>{unsuscribe_uri}" style="text-decoration:underline;color:#fff">haga click aqui </a></span>
	  </td>
  </tr>
</table>
