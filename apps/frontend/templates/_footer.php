<div id="foc">
  <div id="fic">
    <div class="top">
      <div class="column">	
        <h5>Nuestra Empresa</h5>
        <ul>
          <li><?=link_to('Inicio','@homepage')?></li>
          <li><?=link_to('Quienes Somos','@about_us')?></li>
          <li><?=link_to('Preguntas Frecuentes','@faq')?></li>
          <li><?=link_to('Contáctenos','@contact_us')?></li>
          <li><?=link_to('¿Cómo funciona?','@how_it_works')?></li>
          <li><?=link_to('Legales','@privacy_policy')?></li>
        </ul>
      </div>
      <div class="column">	
        <h5>Seguinos</h5>
        <ul>
          <li>
            <a href="<?=sfConfig::get('app_linkedin_link')?>" target="_blank"><img src="/images/linked.png" /> <span class="valign_top">linked In</span></a>
          </li>
          <li>
            <a href="<?=sfConfig::get('app_facebook_link')?>" target="_blank" ><img src="/images/facebook.png" /> <span class="valign_top">Facebook</span></a>
          </li>
          <li>
            <a href="<?=sfConfig::get('app_twitter_link')?>" target="_blank" ><img src="/images/twitter.png" /> <span class="valign_top">Twitter</span></a>
          </li>
        </ul>
      </div>
      <div class="last_column">
        <h5>Ofertones y Ofertas para Ahorrar Seguro!</h5>
        <p>
          Ahorra Seguro es una manera fácil, cómoda e inteligente de obtener grandes descuentos en tus compras.<br/>
          Todos los días cerca de 15 OFERTONES con mas del 50% de descuento, MILES DE OFERTAS en forma permanente que van desde el 15 al 45% de descuento, YAPA...<br/>
          Todos los rubros, todos los barrios, todos los servicios y artículos que puedas imaginar!!<br/>
          No vas a querer salir a comprar antes de entrar en Ahorraseguro.com.ar !!! Tu manera INTELIGENTE de AHORRAR SEGURO en tus compras!<br/>
        </p>
      </div>
    </div>
    <div class="bottom">
      <div class="column">
        <div class="sale">
          <?php include_component('users', 'stats') ?> 
        </div>
      </div>
      <div class="column">
        <div class="contact_detail">
            <h3>Contáctenos</h3>
            <p>
              <?=link_to('Formulario de contacto','@contact_us')?>
            </p>
        </div>
      </div>
      <div class="last_column">
        <div class="footer_logo">
  	 	    <?=link_to(image_tag('footer_logo.png', array('alt'=>'Ahorra Seguro')),'@homepage')?>
          <p>&copy; 2012  AhorraSeguro.com.ar. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
</div>

