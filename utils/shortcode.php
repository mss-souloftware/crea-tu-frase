<?php

/**
 * 
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
 */

require_once('confirmPayment/paymentfinish.php');
require_once('confirmPayment/closeprocess.php');
require_once('report/reportProblem.php');


// Check if the 'chocol_cookie' exists in the $_COOKIE array
if (isset($_COOKIE['chocol_cookie'])) {
    // Retrieve the option using the value from the cookie
    $getCookieOUI = get_option($_COOKIE['chocol_cookie']);
    $getCookieOUILast = explode("_", $getCookieOUI);
    $lastCookieVal = end($getCookieOUILast);
} else {
    $getCookieOUI = null;
    $getCookieOUILast = [];
    $lastCookieVal = null;
}

// Check if the payment parameter is set in the URL and equals true
if (isset($_GET['payment']) && $_GET['payment'] == true) {
    if (isset($_GET['payerID'])) {
        $payerID = $_GET['payerID'];
        global $wpdb;
        $tablename = $wpdb->prefix . 'chocoletras_plugin';
        $query = $wpdb->prepare("SELECT * FROM $tablename WHERE uoi = %s", $payerID);
        $result = $wpdb->get_row($query);

        if ($result) {
            $update_query = $wpdb->prepare("UPDATE $tablename SET pagoRealizado = 1 WHERE uoi = %s", $payerID);
            $wpdb->query($update_query);
            // echo "Row updated successfully.";
        }
    }
?>
    <script>
        document.cookie = `chocol_cookie=; Secure; Max-Age=-35120; path=/`;
        console.log("Payment True");
    </script>
    <?php
    require_once('finishprocess/finishProcessStripe.php');
    $finishProcessStripeResult = finishProcessTripe();
    if (
        $finishProcessStripeResult->payment_status == "paid" &&
        paymentfinish($finishProcessStripeResult->customer) === 1
    ) { ?>
        <script>
            document.cookie = `chocol_cookie=; Secure; Max-Age=-35120; path=/`;
            location.reload();
        </script>
    <?php
    }
}


function chocoletras_shortCode()
{
    ob_start();
    ?>

    <section id="chocoletrasPlg" class="ctf_plugin_main">
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-md-7 col-12 text-center mb-2">
                    <div id="typewriter">
                        <img class="dummyImg" src="<?php echo plugin_dir_url(__DIR__) . "img/orders/dummy.png"; ?>" alt="">
                    </div>
                </div>

                <div class="col-md-5 col-12 text-center mb-2">
                    <div class="chocoletrasPlg-spiner">
                        <img src="<?php echo plugins_url('../img/logospiner.gif', __FILE__); ?>" alt="<?php echo _e('Chocoletras'); ?>">
                        <div class="chocoletrasPlg-spiner-ring">
                        </div>
                    </div>
                    <div class="card">
                        <form id="ctf_form" class="chocoletrasPlg__wrapperCode-dataUser-form" action="test_action">
                            <input type="hidden" name="action" value="test_action" readonly>
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Frase</strong></li>
                                <li id="personal"><strong>Shiping</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Crea tu frase</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">
                                                <pre id="<?php echo _e('actual') ?>">0</pre>
                                                <b id="<?php echo _e('counter') ?>">
                                                    <?php echo get_option('gastoMinimo') + get_option('precEnvio'); ?>
                                                </b>
                                                €
                                            </h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Tipo de espacio</label>
                                    <select id="letras" class="" name="attribute_letras">
                                        <option selected value="Corazón" class="attached enabled">Corazón</option>
                                        <option value="Estrella" class="attached enabled">Estrella</option>
                                    </select>
                                    <input id="<?php echo _e('getText') ?>" type="text" placeholder="<?php echo _e('Escriba su frase aqu&iacute;..'); ?>" required>
                                    <div id="addNewFrase">
                                        <img src="<?php echo plugins_url('../img/add-icon.png', __FILE__); ?>"> Add New
                                    </div>
                                </div> <button id="<?php echo _e('continuarBTN') ?>" type="button" name="next" class="next action-button">Continuar</button>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Información De Envío</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">
                                                <pre id="<?php echo _e('actual') ?>">0</pre>
                                                <b id="<?php echo _e('counter') ?>">
                                                    <?php echo get_option('gastoMinimo') + get_option('precEnvio'); ?>
                                                </b>
                                                €
                                            </h2>
                                        </div>
                                    </div>
                                    <input type="text" name="name" id="" placeholder="Nombre Completo" required />
                                    <input type="email" name="email" id="" placeholder="Email del comprador" required />
                                    <div class="twiceField">
                                        <input type="tel" name="tel" id="chocoTel" placeholder="Tel&#233;fono" minlength="9" required />
                                        <input type="number" name="cp" id="" placeholder="C&#243;digo postal" />
                                    </div>
                                    <div class="twiceField">
                                        <input type="text" name="city" id="" placeholder="Ciudad" />
                                        <input type="text" name="province" id="" placeholder="Provincia" />
                                    </div>
                                    <input type="text" name="address" id="" placeholder="Direccion de entrega" required />
                                    <div class="expressShipping">
                                        <div class="expressBox">
                                            <input type="checkbox" id="ExpressActivatorSwith">
                                            <label for="ExpressActivatorSwith">
                                                Envío Express! ( 24h-48h! días laborables ) por <b>
                                                    €10 </b>
                                            </label>
                                        </div>
                                        <div class="expressIcon">
                                            <img src="<?php echo plugin_dir_url(__DIR__) . "img/captura.png"; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="standardShipping">
                                        <h4>Fecha deseada de entrega.</h4>
                                        <p>Todos nuestros envíos se realizan en días laborables e igualmente las entregas se
                                            hacen días laborables de 24h a 72h, envio ordinario.
                                        </p>
                                        <input type="date" name="date" id="picDate" placeholder="Fecha de entrega" />
                                    </div>
                                    <?php /*
              $getCookieOUI = get_option($_COOKIE['chocol_cookie']);
              $getCookieOUILast = explode("_", $getCookieOUI);
              $lastCookieVal = end($getCookieOUILast);
              function uniqueOrderNum(int $lengthURN = 10): string
              {
                  $uniqueOrderNumber = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                  $randomOrderNum = '';
                  for ($i = 0; $i < $lengthURN; $i++) {
                      $randomOrderNum .= $uniqueOrderNumber[rand(0, strlen($uniqueOrderNumber) - 1)];
                  }
                  return $randomOrderNum;
              }

              $finalUON = uniqueOrderNum();
              */ ?>
                                    <input type="hidden" name="uoi" id="uniqueOrderID" value="<?php // echo $finalUON; 
                                                                                                ?>" placeholder="Unique Order ID">
                                </div>
                                <textarea name="message" placeholder="Agregue su comentario aquí."></textarea>
                                <div class="termCondition">
                                    <input type="checkbox" name="term" id="TermAndCond" required>
                                    <label for="TermAndCond">
                                        Para continuar acepte nuestros <a href="/terminos-y-condiciones/">
                                            terminos y condiciones. </a>
                                    </label>
                                </div>

                                <div class="swithcerBtnGroup">
                                    <!-- <input type="button" name="previous" class="previous action-button-previous" /> -->
                                    <div class="previous action-button-previous"></div>
                                    <input type="submit" name="next" class="next action-button" value="Next" />
                                    <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                                </div>
                                <input class="chocoletrasPlg__wrapperCode-dataUser-form-input" type="hidden" name="chocofrase" readonly>
                                <input class="chocoletrasPlg__wrapperCode-dataUser-form-input-price" type="hidden" name="price" readonly>
                                <input id="ExpressActivator" type="hidden" name="express" value="off" readonly>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Detalles Del Pedido</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">
                                                <pre id="<?php echo _e('actual') ?>">0</pre>
                                                <b id="<?php echo _e('counter') ?>">
                                                    <?php echo get_option('gastoMinimo') + get_option('precEnvio'); ?>
                                                </b>
                                                €
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="ordersPanel">
                                        <div class="orderDetails">
                                            <div class="closeBtn">

                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#E64C3C" />
                                                </svg>
                                            </div>
                                            <div class="orderThumb">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/orders/dummy.png"; ?>" alt="">
                                            </div>
                                            <div class="orderData">
                                                <p>Frase: TE♥QUERO♥MUCHO♥PAPA</p>
                                                <p>Precio: 20.40€</p>

                                                <div class="pinsPanel">
                                                    <div class="deliveryDate">
                                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        2024-06-04
                                                    </div>
                                                    <div class="deliveryDate">

                                                        <svg fill="#fff" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M 0 6 L 0 8 L 19 8 L 19 23 L 12.84375 23 C 12.398438 21.28125 10.851563 20 9 20 C 7.148438 20 5.601563 21.28125 5.15625 23 L 4 23 L 4 18 L 2 18 L 2 25 L 5.15625 25 C 5.601563 26.71875 7.148438 28 9 28 C 10.851563 28 12.398438 26.71875 12.84375 25 L 21.15625 25 C 21.601563 26.71875 23.148438 28 25 28 C 26.851563 28 28.398438 26.71875 28.84375 25 L 32 25 L 32 16.84375 L 31.9375 16.6875 L 29.9375 10.6875 L 29.71875 10 L 21 10 L 21 6 Z M 1 10 L 1 12 L 10 12 L 10 10 Z M 21 12 L 28.28125 12 L 30 17.125 L 30 23 L 28.84375 23 C 28.398438 21.28125 26.851563 20 25 20 C 23.148438 20 21.601563 21.28125 21.15625 23 L 21 23 Z M 2 14 L 2 16 L 8 16 L 8 14 Z M 9 22 C 10.117188 22 11 22.882813 11 24 C 11 25.117188 10.117188 26 9 26 C 7.882813 26 7 25.117188 7 24 C 7 22.882813 7.882813 22 9 22 Z M 25 22 C 26.117188 22 27 22.882813 27 24 C 27 25.117188 26.117188 26 25 26 C 23.882813 26 23 25.117188 23 24 C 23 22.882813 23.882813 22 25 22 Z" />
                                                        </svg>
                                                        Express Shipping
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="orderDetails">
                                            <div class="closeBtn">

                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#E64C3C" />
                                                </svg>
                                            </div>
                                            <div class="orderThumb">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/orders/dummy.png"; ?>" alt="">
                                            </div>
                                            <div class="orderData">
                                                <p>Frase: TE♥QUERO♥MUCHO♥PAPA</p>
                                                <p>Precio: 20.40€</p>
                                                <div class="pinsPanel">
                                                    <div class="deliveryDate">
                                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        2024-06-04
                                                    </div>
                                                    <div class="deliveryDate">

                                                        <svg fill="#fff" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M 0 6 L 0 8 L 19 8 L 19 23 L 12.84375 23 C 12.398438 21.28125 10.851563 20 9 20 C 7.148438 20 5.601563 21.28125 5.15625 23 L 4 23 L 4 18 L 2 18 L 2 25 L 5.15625 25 C 5.601563 26.71875 7.148438 28 9 28 C 10.851563 28 12.398438 26.71875 12.84375 25 L 21.15625 25 C 21.601563 26.71875 23.148438 28 25 28 C 26.851563 28 28.398438 26.71875 28.84375 25 L 32 25 L 32 16.84375 L 31.9375 16.6875 L 29.9375 10.6875 L 29.71875 10 L 21 10 L 21 6 Z M 1 10 L 1 12 L 10 12 L 10 10 Z M 21 12 L 28.28125 12 L 30 17.125 L 30 23 L 28.84375 23 C 28.398438 21.28125 26.851563 20 25 20 C 23.148438 20 21.601563 21.28125 21.15625 23 L 21 23 Z M 2 14 L 2 16 L 8 16 L 8 14 Z M 9 22 C 10.117188 22 11 22.882813 11 24 C 11 25.117188 10.117188 26 9 26 C 7.882813 26 7 25.117188 7 24 C 7 22.882813 7.882813 22 9 22 Z M 25 22 C 26.117188 22 27 22.882813 27 24 C 27 25.117188 26.117188 26 25 26 C 23.882813 26 23 25.117188 23 24 C 23 22.882813 23.882813 22 25 22 Z" />
                                                        </svg>
                                                        Express Shipping
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Submit" />
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Método De Pago</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">
                                                <pre id="<?php echo _e('actual') ?>">0</pre>
                                                <b id="<?php echo _e('counter') ?>">
                                                    <?php echo get_option('gastoMinimo') + get_option('precEnvio'); ?>
                                                </b>
                                                €
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="paymentPanel">
                                        <div class="paymentCard">
                                            <div class="selected">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="#55C12D" />
                                                </svg>
                                            </div>
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/paypal.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con PayPal
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/redsys.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Tarjeta
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/bizum.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Bizum
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/google-pay.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Google Pay
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/apple-pay.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Apple Pay
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/cash-app.png"; ?>" alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Cash App
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Pay Now" />
                            </fieldset>
                        </form>

                        <div class="chocoletrasPlg__wrapperCode-payment"></div>
                        <div class="chocoletrasPlg__wrapperCode-firstHead"></div>
                        <div class="chocoletrasPlg__wrapperCode-firstHead-dataUser"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php
    return ob_get_clean();
}
