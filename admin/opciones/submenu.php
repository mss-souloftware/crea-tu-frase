<?php 
/**
 * 
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
*/
function submenuOutput(){
    
    ?>
     <h2>Coloque los parametros condicionales.</h2>
     <span>Pagina del plugin: si el plugin se visualiza en ej: http://mipagina/compra-tu-frase/</span><br>
     <span>la pagina del plugin será: <i><b>/compra-tu-frase/</b></i></span><br>
     <!-- <form id="pcondicionales"> -->
       <table class="ChocoletrasBackendOpciones" cellspacing="0" cellpadding="0">
       
       
  <thead>
    <tr>
      <th>Valor</th>
      <th>Description</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Valor</th>
      <th>Description</th>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <td> <div> <input type="number" maxlength="10" name="conditionalSubmit_precLetras" value="<?php 
      echo get_option('precLetra') ? get_option('precLetra') : ''; ?>"> </div></td>
      <td><?php echo ('Coloque el precio por cada letra'); ?></td>
    </tr>
    <tr>
      <td> <div> <input type="number" maxlength="10" name="conditionalSubmit_precCorazon" value="<?php 
      echo get_option('precCoraz') ? get_option('precCoraz') : ''; ?>">  </div></td>
      <td><?php echo ('Coloque el precio por cada ♥ Y ✯'); ?></td>
    </tr>
    <tr>
      <td> <div> <input type="number" maxlength="10" name="conditionalSubmit_precEnvio" value="<?php 
      echo get_option('precEnvio') ? get_option('precEnvio') : ''; ?>">  </div></td>
      <td><?php echo ('Coloque el precio por envio'); ?></td>
      </tr>
       <tr>
        <td> <div> <input type="number" maxlength="10" name="conditionalSubmit_maximoC" value="<?php 
      echo get_option('maxCaracteres') ? get_option('maxCaracteres') : ''; ?>">  </div></td>
        <td><?php echo ('Coloque el maximo de caracteres'); ?></td>
       </tr>
       <tr>
        <td> <div> <input type="number" maxlength="10" name="conditionalSubmit_Gminimo" value="<?php 
      echo get_option('gastoMinimo') ? get_option('gastoMinimo') : ''; ?>">  </div></td>
        <td><?php echo ('Coloque gasto minimo'); ?></td>
       </tr>
       <tr>
        <td> <div> <input type="text" maxlength="50" name="conditionalSubmit_Page" value="<?php 
      echo get_option('pluginPage') ? get_option('pluginPage') : ''; ?>">  </div></td>
        <td><?php echo ('Coloque la pagina del plugin'); ?></td>
       </tr>
       <tr>
        <td> <div> <input type="text" maxlength="50" name="termCondlSubmit_Page" value="<?php 
      echo get_option('termCond') ? get_option('termCond') : ''; ?>">  </div></td>
        <td><?php echo esc_html( 'página terminos y condiciones' ); ?>  </td>
       </tr>
       <tr>
        <td> <div> <input type="number" maxlength="150" name="expressShipinglSubmit_Page" value="<?php 
      echo get_option('expressShiping') ?  intval(get_option('expressShiping'))  : ''; ?>">  </div></td>
        <td><?php echo esc_html( 'Coloque el precio de: envio express' ); ?>  </td>
       </tr>
       <tr class="ChocoletrasBackendOpciones-trSubmit">
        <td   colspan="2"> <div class="ChocoletrasBackendOpciones-submit"> <input type="submit" value="Enviar" id="conditionalSubmit">  </div></td>
       </tr>
  </tbody>
</table>
     <!-- </form> -->
    <?php
  }