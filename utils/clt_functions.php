<?php 
/**
 * 
 * @package Chocoletras
 * @subpackage Ricardo Perez
 * 
*/
 
 

require_once plugin_dir_path(__FILE__) . 'shortcode.php';
require_once plugin_dir_path(__FILE__) . 'checkoutStripe.php'; 
require_once plugin_dir_path(__FILE__) . 'clt_saveInfo.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/outputBackend.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/statuschange/setStatus.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/opciones/submenu.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/opciones/itemsEmail.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/opciones/reportsPage.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/opciones/stripe.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/opciones/saveOptions.php'; 
require_once plugin_dir_path(__FILE__) . '../admin/emailOutputOption/emailOptions.php'; 
require_once plugin_dir_path(__FILE__) . './cancel/cancellProcess.php'; 
require_once plugin_dir_path(__FILE__) . './savestripeoption/stripeoption.php'; 
require_once plugin_dir_path(__FILE__) . './savestripeoption/stripeoption.php'; 
require_once plugin_dir_path(__FILE__) . './savestripeoption/stripeSession.php';  
require_once plugin_dir_path(__FILE__) . './report/saveReportToDatabase.php';  
require_once plugin_dir_path(__FILE__) . './report/deletteReport.php';  
// add styles to backend
 

function clt_admin_style() {
    wp_enqueue_style( 'backendStyleForClt', plugins_url( '../src/css/clt_style.css', __FILE__ ), array(), false );
    wp_enqueue_script( 'backendScript', plugins_url( '../src/clt_script.js', __FILE__ ), array(), '1.0.0', true ); 
    wp_localize_script( 'backendScript', 'ajax_variables', array(
      'ajax_url'    => admin_url( 'admin-ajax.php' ),
      'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
      'action' => 'proceso'
    ));
  }
add_action('admin_enqueue_scripts', 'clt_admin_style');

function chocoletrasInsertScripts() { 
  wp_enqueue_script( 'chocoletrasScript', plugins_url( '../src/main.js', __FILE__ ), array(), '1.0.0', true ); 
  wp_enqueue_style( 'pluginStylesClt', plugins_url( '../src/css/clt_style.css', __FILE__ ), array(), false );
 
  wp_localize_script( 'chocoletrasScript', 'ajax_variables', array(
    'ajax_url'       => admin_url( 'admin-ajax.php' ),
    'nonce'          => wp_create_nonce( 'my-ajax-nonce' ), 
    'action'         => 'event-list',
    'plgPage'        => get_option('pluginPage'),
    'stripe'         => isset($_COOKIE['stripeLoaded']) ? true : false,
    'publicKy'       => get_option("publishablekey"),
    'precLetra'      => get_option('precLetra'),
    'precCoraz'      => get_option('precCoraz'),
    'precEnvio'      => get_option('precEnvio'),
    'maxCaracteres'  => get_option('maxCaracteres'),
    'gastoMinimo'    => get_option('gastoMinimo'),
    'express'        => get_option('expressShiping'), 
    'pluginUrl'      => plugin_dir_url(__DIR__),
  ));
}
add_action( 'wp_enqueue_scripts', 'chocoletrasInsertScripts' ); 
 
// vincule data script to php file //
add_action( 'wp_ajax_nopriv_test_action', 'responseForm' );
add_action( 'wp_ajax_test_action', 'responseForm' );

// change status process
add_action( 'wp_ajax_nopriv_proces', 'resultProcess' );
add_action( 'wp_ajax_proces', 'resultProcess' );

// delette report
add_action( 'wp_ajax_nopriv_dellReport', 'deletteAnythings' );
add_action( 'wp_ajax_dellReport', 'deletteAnythings' );

// change conditionales
add_action( 'wp_ajax_nopriv_conditionales', 'saveConditionales' );
add_action( 'wp_ajax_conditionales', 'saveConditionales' ); 

// cancell process
add_action( 'wp_ajax_nopriv_cancelProcess', 'resultcancellProcess' );
add_action( 'wp_ajax_cancelProcess', 'resultcancellProcess' );

// save stripe keys  
add_action( 'wp_ajax_nopriv_saveStripekeys', 'ouputStripeOptions' );
add_action( 'wp_ajax_saveStripekeys', 'ouputStripeOptions' );

//new stripev3
// save stripe keys  
add_action( 'wp_ajax_nopriv_stripeCreateSession', 'responseStripe' );
add_action( 'wp_ajax_stripeCreateSession', 'responseStripe' );

// save stripe session saveStripeSectionId
add_action( 'wp_ajax_nopriv_saveStripeSectionId', 'tryTosaveStripeOption' );
add_action( 'wp_ajax_saveStripeSectionId', 'tryTosaveStripeOption' );


// save email admin option
add_action( 'wp_ajax_nopriv_saveOptionsEmail', 'outputSavedOptionsEmail' );
add_action( 'wp_ajax_saveOptionsEmail', 'outputSavedOptionsEmail' ); 

// save reportForm
add_action( 'wp_ajax_nopriv_reportForm', 'saveReportData' );
add_action( 'wp_ajax_reportForm', 'saveReportData' ); 

//=============================================================//
define('PROCESS_FRASE', plugins_url( 'clt_process_form.php', __FILE__ ));
 
add_shortcode( 'chocoletras', 'chocoletras_shortCode' );
  
// chocoletras admin menu
add_action('admin_menu', 'clt_adminMenu'); 
function clt_adminMenu(){
  add_menu_page('Chocoletras Admin', 
                 'Chocoletras',
                 'install_plugins',
                 'clt_amin',
                 'chocoletraMenu_ftn',
                  plugins_url( '../img/logo.svg', __FILE__ ),
                  27 );
   }

 add_action('admin_menu', 'addSubmenuChocoletras'); 
function addSubmenuChocoletras(){
  add_submenu_page( 'clt_amin', 
                    'Opciones Generales',
                    'Opciones',
                    'install_plugins',
                    'set_options' , 
                    'submenuOutput' ,2); 
  }

  add_action('admin_menu', 'addSubmenuStrypeKeys'); 
  function addSubmenuStrypeKeys(){
      add_submenu_page( 'clt_amin', 
      'Stripe setUp',
      'Stripe Keys',
      'install_plugins',
      'set_stripe_keys' , 
      'stripeOptions' ,2);
  }

  add_action('admin_menu', 'addSubmenuEmailOptions'); 
  function addSubmenuEmailOptions(){
      add_submenu_page( 'clt_amin', 
      'Email setUp',
      'email Items',
      'install_plugins',
      'set_email_items' , 
      'emailItemsOutput' ,2);
  }

  add_action('admin_menu', 'listOfReportProblems'); 
  function listOfReportProblems(){
      add_submenu_page( 'clt_amin', 
      'Error Reports',
      'Reportes',
      'install_plugins',
      'set_report_errors' , 
      'reportsPage' ,2);
  }

  // ACTIIVATION PLUGIN FUNCTION

//   register_activation_hook( __FILE__, 'createAllTables' );

//  function createAllTablesp(){
//   exit('=================');
// }

// register_deactivation_hook( __FILE__, 'tata');
// function tata(){
 
// }



