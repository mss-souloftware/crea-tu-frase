<?php

/**
 * 
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
 */

require_once ('confirmPayment/paymentfinish.php');
require_once ('confirmPayment/closeprocess.php');
require_once ('report/reportProblem.php');


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
    require_once ('finishprocess/finishProcessStripe.php');
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
        <div class="chocoletrasPlg-spiner">
            <img src="<?php echo plugins_url('../img/logospiner.gif', __FILE__); ?>" alt="<?php echo _e('Chocoletras'); ?>">
            <div class="chocoletrasPlg-spiner-ring">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-md-7 col-12 text-center mb-2">
                    <div id="typewriter">
                        <div class="typewriterInner"></div>
                        <img class="dummyImg" src="<?php echo plugin_dir_url(__DIR__) . "img/orders/dummy.png"; ?>" alt="">
                    </div>
                </div>

                <div class="col-md-5 col-12 text-center mb-2">
                    <div class="chocoletrasPlg-spiner">
                        <img src="<?php echo plugins_url('../img/logospiner.gif', __FILE__); ?>"
                            alt="<?php echo _e('Chocoletras'); ?>">
                        <div class="chocoletrasPlg-spiner-ring">
                        </div>
                    </div>
                    <div class="card">
                        <form id="ctf_form" class="chocoletrasPlg__wrapperCode-dataUser-form" action="test_action">
                            <input type="hidden" name="action" value="test_action" readonly>
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li <?php
                                if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                    echo ' class="active"';
                                }
                                ?> id="account"><strong>Frase</strong></li>
                                <li <?php
                                if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                    echo ' class="active"';
                                }
                                ?> id="personal"><strong>Shiping</strong></li>
                                <li <?php
                                if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                    echo ' class="active"';
                                }
                                ?> id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <fieldset <?php
                            if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                echo ' style="display: none; opacity: 0;"';
                            }
                            ?>>
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
                                        <option selected value="heart" class="attached enabled">Corazón</option>
                                        <option value="star" class="attached enabled">Estrella</option>
                                    </select>

                                    <div class="fraseWrapper">
                                        <div class="frasePanel">
                                            <input id="<?php echo _e('getText') ?>" type="text"
                                                placeholder="<?php echo _e('Escriba su frase aqu&iacute;..'); ?>" required>
                                        </div>
                                    </div>
                                    <button id="addNewFrase" disabled>
                                        <img src="<?php echo plugins_url('../img/add-icon.png', __FILE__); ?>"> Add New
                                    </button>
                                </div> <button id="<?php echo _e('continuarBTN') ?>" type="button" name="next"
                                    class="next action-button" disabled>Continuar</button>
                            </fieldset <?php
                            if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                echo ' style="display: none; opacity: 0;"';
                            }
                            ?>>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Información De Envío</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">
                                                <b class="priceCounter"></b>
                                                €
                                            </h2>
                                        </div>
                                    </div>
                                    <input type="text" name="name" id="" placeholder="Nombre Completo" required />
                                    <input type="email" name="email" id="" placeholder="Email del comprador" required />
                                    <div class="twiceField">
                                        <input type="tel" name="tel" id="chocoTel" placeholder="Tel&#233;fono" minlength="9"
                                            required />
                                        <input type="number" name="cp" id="" placeholder="C&#243;digo postal" />
                                    </div>
                                    <div class="twiceField">
                                        <input type="text" name="city" id="" placeholder="Ciudad" />
                                        <input type="text" name="province" id="" placeholder="Provincia" />
                                    </div>
                                    <input type="text" name="address" id="" placeholder="Direccion de entrega" required />
                                    <div class="shippingPanel">
                                        <div class="normalShipping selected">
                                            <p>Envío Normal</p>
                                            <svg fill="#000000" width="60px" height="60px" viewBox="0 0 32 32" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.722 21.863c-0.456-0.432-0.988-0.764-1.569-0.971l-1.218-4.743 14.506-4.058 1.554 6.056-13.273 3.716zM12.104 9.019l9.671-2.705 1.555 6.058-9.67 2.705-1.556-6.058zM12.538 20.801c-0.27 0.076-0.521 0.184-0.765 0.303l-4.264-16.615h-1.604c-0.161 0.351-0.498 0.598-0.896 0.598h-2.002c-0.553 0-1.001-0.469-1.001-1.046s0.448-1.045 1.001-1.045h2.002c0.336 0 0.618 0.184 0.8 0.447h3.080v0.051l0.046-0.014 4.41 17.183c-0.269 0.025-0.538 0.064-0.807 0.138zM12.797 21.811c1.869-0.523 3.79 0.635 4.291 2.588 0.501 1.951-0.608 3.957-2.478 4.48-1.869 0.521-3.79-0.637-4.291-2.588s0.609-3.957 2.478-4.48zM12.27 25.814c0.214 0.836 1.038 1.332 1.839 1.107s1.276-1.084 1.062-1.92c-0.214-0.836-1.038-1.332-1.839-1.109-0.802 0.225-1.277 1.085-1.062 1.922zM29.87 21.701l-11.684 3.268c-0.021-0.279-0.060-0.561-0.132-0.842-0.071-0.281-0.174-0.545-0.289-0.799l11.623-3.25 0.482 1.623z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="expressShipping">
                                            <p>Envío Express</p>
                                            <div class="expressBox">
                                                <!-- <input type="checkbox" id="ExpressActivatorSwith"> -->
                                                <svg fill="#000000" width="60px" height="60px" viewBox="0 -64 640 640"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="standardShipping">
                                            <h4>Fecha deseada de entrega.</h4>
                                            <p>Todos nuestros envíos se realizan en días laborables e igualmente las
                                                entregas se
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
                                        <!-- <input type="submit" name="next" class="next action-button" value="Next" /> -->
                                        <input type="submit" name="next" class="action-button" value="Next" />
                                    </div>
                                    <input class="chocoletrasPlg__wrapperCode-dataUser-form-input" type="hidden"
                                        name="chocofrase" readonly>
                                    <input class="chocoletrasPlg__wrapperCode-dataUser-form-input-price" type="hidden"
                                        name="price" readonly>
                                    <input id="ExpressActivator" type="hidden" name="express" value="off" readonly>
                            </fieldset>
                            <fieldset <?php
                            if (isset($_COOKIE['chocol_cookie']) && get_option($_COOKIE['chocol_cookie'])) {
                                echo ' style="display: block; opacity: 1;"';
                            }
                            ?>>
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
                                        <?php
                                        $getOrderData = json_decode(stripslashes($_COOKIE['chocoletraOrderData']), true);

                                        // echo '<pre>';
                                        // print_r($getOrderData);
                                        // echo '</pre>';


                                        foreach ($getOrderData['mainText'] as $frase) {
                                            ?>

                                            <div class="orderDetails">
                                                <div class="closeBtn" id="cancelProcessPaiment">
                                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z"
                                                            fill="#E64C3C" />
                                                    </svg>
                                                </div>
                                                <div class="orderThumb">
                                                    <img src="<?php echo plugin_dir_url(__DIR__) . "img/orders/dummy.png"; ?>"
                                                        alt="">
                                                </div>
                                                <div class="orderData">
                                                    <p>Frase: <?php echo $frase; ?></p>
                                                    <p>Precio: 19 €</p>

                                                    <div class="pinsPanel">
                                                        <div class="deliveryDate">
                                                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10"
                                                                    stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                           <?php 
                                                           $date = substr($getOrderData['timestamp'], 0, 10);
                                                           echo $date; ?>
                                                        </div>
                                                        <div class="deliveryDate">

                                                            <svg fill="#fff" width="16px" height="16px" viewBox="0 0 32 32"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M 0 6 L 0 8 L 19 8 L 19 23 L 12.84375 23 C 12.398438 21.28125 10.851563 20 9 20 C 7.148438 20 5.601563 21.28125 5.15625 23 L 4 23 L 4 18 L 2 18 L 2 25 L 5.15625 25 C 5.601563 26.71875 7.148438 28 9 28 C 10.851563 28 12.398438 26.71875 12.84375 25 L 21.15625 25 C 21.601563 26.71875 23.148438 28 25 28 C 26.851563 28 28.398438 26.71875 28.84375 25 L 32 25 L 32 16.84375 L 31.9375 16.6875 L 29.9375 10.6875 L 29.71875 10 L 21 10 L 21 6 Z M 1 10 L 1 12 L 10 12 L 10 10 Z M 21 12 L 28.28125 12 L 30 17.125 L 30 23 L 28.84375 23 C 28.398438 21.28125 26.851563 20 25 20 C 23.148438 20 21.601563 21.28125 21.15625 23 L 21 23 Z M 2 14 L 2 16 L 8 16 L 8 14 Z M 9 22 C 10.117188 22 11 22.882813 11 24 C 11 25.117188 10.117188 26 9 26 C 7.882813 26 7 25.117188 7 24 C 7 22.882813 7.882813 22 9 22 Z M 25 22 C 26.117188 22 27 22.882813 27 24 C 27 25.117188 26.117188 26 25 26 C 23.882813 26 23 25.117188 23 24 C 23 22.882813 23.882813 22 25 22 Z" />
                                                            </svg>
                                                            Express Shipping
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Submit" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
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
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"
                                                        fill="#55C12D" />
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
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/google-pay.png"; ?>"
                                                    alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Google Pay
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/apple-pay.png"; ?>"
                                                    alt="">
                                            </div>
                                            <div class="paymentData">
                                                Pagar Con Apple Pay
                                            </div>
                                        </div>

                                        <div class="paymentCard">
                                            <div class="paymentIcon">
                                                <img src="<?php echo plugin_dir_url(__DIR__) . "img/cash-app.png"; ?>"
                                                    alt="">
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
