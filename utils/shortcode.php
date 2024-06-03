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
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-md-7 col-12 text-center mb-2">
                    <div id="typewriter"></div>
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
                                    <input id="<?php echo _e('getText') ?>" type="text"
                                        placeholder="<?php echo _e('Escriba su frase aqu&iacute;..'); ?>" required>
                                    <div id="addNewFrase">
                                        <img src="<?php echo plugins_url('../img/add-icon.png', __FILE__); ?>"> Add New
                                    </div>
                                </div> <button id="<?php echo _e('continuarBTN') ?>" type="button" name="next"
                                    class="next action-button">Continuar</button>
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
                                        <input type="tel" name="tel" id="chocoTel" placeholder="Tel&#233;fono" minlength="9"
                                            required />
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
                                    <input type="hidden" name="uoi" id="uniqueOrderID" value="<?php // echo $finalUON; ?>"
                                        placeholder="Unique Order ID">
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
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </div>
                                <input class="chocoletrasPlg__wrapperCode-dataUser-form-input" type="hidden"
                                    name="chocofrase" readonly>
                                <input class="chocoletrasPlg__wrapperCode-dataUser-form-input-price" type="hidden"
                                    name="price" readonly>
                                <input id="ExpressActivator" type="hidden" name="express" value="off" readonly>
                            </fieldset>
                            <fieldset style="display: block; opacity: 1;">
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
                                    <p><b>Frase: </b>TE♥QUERO♥MUCHO♥PAPA</p>
                                    <p><b>Nombre Completo: </b>TE♥QUERO♥MUCHO♥PAPA</p>
                                    <p><b>Email de comprador: </b>TE♥QUERO♥MUCHO♥PAPA</p>
                                    <p><b>Teléfono: </b>TE♥QUERO♥MUCHO♥PAPA</p>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Submit" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Finish:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 4 - 4</h2>
                                        </div>
                                    </div> <br><br>
                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                        </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
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
