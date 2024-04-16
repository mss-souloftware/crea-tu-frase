<?php 
/**
 * 
 * @package Chocoletras
 * @subpackage M. Sufyan Shaikh
 * 
*/
function emailItemsOutput(){
    
    ?>
     <h2>Coloque los parametros para la salida de email.</h2>
     <span>Valla hacia su servidor de correos para obtener estos datos</span><br>
     
     <!-- <form id="pcondicionales"> -->
       <table class="opstionsEmailOutput" cellspacing="0" cellpadding="0">
       
       
  <thead class="opstionsEmailOutput__thead">
    <tr class="opstionsEmailOutput__thead-tr">
      <th class="opstionsEmailOutput__thead-th">Valor</th>
      <th class="opstionsEmailOutput__thead-th">Description</th>
    </tr>
  </thead>
  <tfoot class="opstionsEmailOutput__tfoot">
    <tr class="opstionsEmailOutput__tfoot-tr">
      <th class="opstionsEmailOutput__tfoot-th">Valor</th>
      <th class="opstionsEmailOutput__tfoot-th">Description</th>
    </tr>
  </tfoot>
  <tbody class="opstionsEmailOutput__tbody">
    <tr class="opstionsEmailOutput__tbody-tr">
      <td class="opstionsEmailOutput__tbody-th"> <div> <input type="text" maxlength="30" name="ouputCltHost" value="<?php 
      echo get_option('ouputCltHost') ? get_option('ouputCltHost') : ''; ?>"> </div></td>
      <td class="opstionsEmailOutput__tbody-th">Host</td>
    </tr>
  <!--  -->
    <tr class="opstionsEmailOutput__tbody-tr">
      <td class="opstionsEmailOutput__tbody-td"> <div> <input type="text" maxlength="30" name="ouputCltPort" value="<?php 
      echo get_option('ouputCltPort') ? get_option('ouputCltPort') : ''; ?>"> </div></td>
      <td>Port</td>
    </tr>
      <!--  -->
    <tr class="opstionsEmailOutput__tbody-tr">
      <td class="opstionsEmailOutput__tbody-td"> <div> <input type="text" maxlength="30" name="ouputCltSecure" value="<?php 
      echo get_option('ouputCltSecure') ? get_option('ouputCltSecure') : ''; ?>"> </div></td>
      <td>Secure</td>
    </tr>
     <!--  -->
     <tr class="opstionsEmailOutput__tbody-tr">
      <td class="opstionsEmailOutput__tbody-td"> <div> <input type="text" maxlength="30" name="ouputCltemail" value="<?php 
      echo get_option('ouputCltemail') ? get_option('ouputCltemail') : ''; ?>"> </div></td>
      <td>Email</td>
    </tr>
    <!--  -->
    <tr class="opstionsEmailOutput__tbody-tr">
      <td class="opstionsEmailOutput__tbody-td"> <div> <input type="text" maxlength="30" name="ouputCltPass" value="<?php 
      echo get_option('ouputCltPass') ? get_option('ouputCltPass') : ''; ?>"> </div></td>
      <td class="opstionsEmailOutput__tbody-td">Pasword</td>
    </tr>
       <tr class="outputEmailBody">
        <td   colspan="2"> <div class="outputEmailBody-submit"> <input type="submit" value="Enviar" id="itemsEmaiBtn">  </div></td>
       </tr>
  </tbody>
</table>
     <!-- </form> -->
    <?php
  }