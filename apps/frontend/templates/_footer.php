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
            <a href="#" target="_blank"><img src="/images/linked.png" /> <span class="valign_top">linked In</span></a>
          </li>
          <li>
            <a href="#" target="_blank" ><img src="/images/facebook.png" /> <span class="valign_top">Facebook</span></a>
          </li>
          <li>
            <a href="#" target="_blank" ><img src="/images/twitter.png" /> <span class="valign_top">Twitter</span></a>
          </li>
        </ul>
      </div>
      <div class="last_column">
        <h5>Ofertas imbatibles para aventuras Local!</h5>
        <p>Ahorra Seguro es una manera fácil de obtener grandes descuentos y descubrir las actividades de diversión en tu ciudad. Nuestras ofertas diarias consisten en líneas aéreas, bar, restaurantes, spa, masajes, teatros, hoteles, y mucho más.</p>
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
              <strong>Tel :</strong> <?=sfConfig::get('app_contact_phone')?><br/>
              <strong>E-mail :</strong> <?=auto_link_text(sfConfig::get('app_contact_email'))?>
            </p>
        </div>
      </div>
      <div class="last_column">
        <div class="footer_logo">
  	 	    <?=link_to(image_tag('footer_logo.png', array('alt'=>'Mendoza en Oferta')),'@homepage')?>
          <p>&copy; 2011  MendozaOferta.com.ar. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
</div>

