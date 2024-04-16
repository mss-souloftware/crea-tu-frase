<?php 
/**
 * 
 * @package Chocoletras
 * @subpackage M. Sufyan Shaikh
 * 
*/
 
require_once plugin_dir_path(__FILE__) . '../callAlldata/get_userPaiment.php';
require_once plugin_dir_path(__FILE__) . '../callAlldata/userdata.php';

function chocoletraMenu_ftn(){
      global $wpdb; 
      
      $database = $wpdb->prefix.'chocoletras_plugin'; 

      $paginationValue = isset($_GET['select']) ? $_GET['select'] : null; 
       global $wp;
       $url_actual = home_url( add_query_arg( array() ) );
        $url = add_query_arg( $wp->query_vars, home_url() );
        $rebuildUrl = explode("select=", $url_actual);
        
  $payment = new allPayment($paginationValue, $url, $database); 
  $allusers = $payment->tryGetAllPayment();
  $elementsPagination = $payment->paginationElements();
    ?>
      <div class="AdministracionVentas">
          <h2>Administracion de ventas</h2>
          <section class="AdministracionVentas-table">
            <div class="AdministracionVentas-table-thead">
              <ul>
                <li class="AdministracionVentas-table-thead_id"><button>↓</button></li>
                <li class="AdministracionVentas-table-thead-frase"><?php echo esc_html( 'Frase' ); ?></li>
                <li class="AdministracionVentas-table-thead_precio"><?php echo esc_html( 'Precio' ); ?></li>
                <li class="AdministracionVentas-table-thead_payment"><?php echo esc_html( 'Pagado' ); ?></li>
                <li class="AdministracionVentas-table-thead_proceso"><?php echo esc_html( 'En proceso' ); ?></li>
                <li class="AdministracionVentas-table-thead_enviado"><?php echo esc_html( 'enviado' ); ?></li>
                <li class="AdministracionVentas-table-thead_fecha"><?php echo esc_html( 'fecha' ); ?></li>
                <li class="AdministracionVentas-table-thead_express"><?php echo esc_html( 'express' ); ?></li>
              </ul>
            </div>
          <div class="AdministracionVentas-table-tbody">
             <?php  
                 foreach ($allusers as $value) {
                   $payment = $value->pagoRealizado == 0? 'no pagado' : 'Pagado';
                   $express = $value->express == 'on' ? 'expressOn' : $payment;
                   $proceso = $value->enProceso == 0? '...' : 'Procesando';
                   $enviado = $value->enviado == 0? '...' : 'Enviado';
                   $repareFrase = str_replace('?','♥', $value->frase);  
                   $isExpress = $value->express == "on" ? "<img src='".substr(plugin_dir_url(__DIR__), 0, -6) ."img/XlQO.gif"."' />": "" ;
                 
                       echo '<ul class="'. str_replace( " ", "_",esc_attr($express))  .' ">';
                       echo '<li class="AdministracionVentas-table-tbody_id"><button id="openPannel_'.$value->id.'">↓</button></li>';
                       echo '<li class="AdministracionVentas-table-tbody-frase">'.$repareFrase.'</li>';
                       echo '<li class="AdministracionVentas-table-tbody_precio">'.$value->precio.'€</li>';
                       echo '<li class="AdministracionVentas-table-tbody_payment">'.$payment.'</li>';
                       echo '<li class="AdministracionVentas-table-tbody_proceso">'.$proceso.'</li>';
                       echo '<li class="AdministracionVentas-table-tbody_enviado">'.$enviado.'</li>';
                       echo '<li class="AdministracionVentas-table-tbody_fecha">'.$value->fecha.'</li>'; 
                       echo '<li class="AdministracionVentas-table-tbody_express">'.  $isExpress .'</li>'; 
                       echo '</ul>';
                       echo '<li id="infoPannel_'.$value->id.'" class="AdministracionVentas-table-tbody_hidenInfo"> ';
                       echo  userdata($value);   
                       if($value->message != ""){ echo getMessage($value->message); }
                       echo  useractions($value->id, $value->email , $value->enProceso, $value->enviado);  
                       echo ' </li>';
                       
                 }  
             ?> 
            </div> 
          </section>  
          <section class="AdministracionVentas__pagination">
          <?php
          //  $paginationValue = isset($_GET['select']) ? $_GET['select'] : null; 
           $getPages = $elementsPagination / 10;
           for ($b=0; $b < $getPages; $b++) { 
            $sum = $b + 1;
            $isDisabled = '';
             if(!$paginationValue && $sum == 1 || $paginationValue == $sum){
                 $isDisabled = 'disabled'; 
               }

             
              echo '<a href="'.$rebuildUrl[0].'&select='.$sum.'"><button '.$isDisabled.' >'. $sum .' </button></a>'; 
           }
           ?>
          </section> 
           
      </div>  
     
    <?php  
}       
    