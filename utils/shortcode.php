<?php

/**
 * 
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
 */


function chocoletras_shortCode()
{
    ob_start();
    ?>

    <section class="ctf_plugin_main">
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-md-7 col-12 text-center  mb-2">
                    <div id="typewriter"></div>
                </div>

                <div class="col-md-5 col-12 text-center  mb-2">
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
                                            <h2 class="steps">14,90€</h2>
                                        </div>
                                    </div>
                                    <!-- <label class="fieldlabels">Letras</label> -->
                                    <select id="letras" class="" name="attribute_letras">
                                        <option disabled selected value="">Elige una opción</option>
                                        <option value="Chocolate Blanco" class="attached enabled">Chocolate Blanco</option>
                                        <option value="Chocolate con Leche" class="attached enabled">Chocolate con Leche
                                        </option>
                                        <option value="Chocolate Puro" class="attached enabled">Chocolate Puro</option>
                                    </select>
                                    <input type="text" id="<?php echo _e('getText') ?>"
                                        placeholder="Escriba su frase aquí.." required>
                                    <div id="addNewFrase">
                                        <img src="<?php echo plugins_url('../img/add-icon.png', __FILE__); ?>"> Add New
                                    </div>
                                </div> <input id="<?php echo _e('continuarBTN') ?>" type="button" name="next"
                                    class="next action-button" value="Continuar" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Información De Envío</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">14,90€</h2>
                                        </div>
                                    </div>
                                    <input type="text" name="name" id="" placeholder="Nombre Completo" required />
                                    <input type="email" name="email" id="" placeholder="Email del comprador" required />
                                    <div class="twiceField">
                                        <input type="tel" name="tel" pattern="[0-9]{9}" id="chocoTel"
                                            placeholder="Tel&#233;fono" minlength="9" required />
                                        <input type="number" name="cp" id="" placeholder="C&#243;digo postal" />
                                    </div>
                                    <div class="twiceField">
                                        <input type="text" name="city" id="" placeholder="Ciudad" />
                                        <input type="text" name="province" id="" placeholder="Provincia" />
                                    </div>
                                    <input type="text" name="phno_2" placeholder="Direccion de entrega" />
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


                                <input type="submit" name="next" class="next action-button" value="Next" /> <input
                                    type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Image Upload:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                    </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file"
                                        name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature
                                        Photo:</label> <input type="file" name="pic" accept="image/*">
                                </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input
                                    type="button" name="previous" class="previous action-button-previous"
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
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php
    return ob_get_clean();
}
