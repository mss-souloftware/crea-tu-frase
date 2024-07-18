<?php
/**
 * 
 * author: M. Sufyan Shaikh
 * description: process form and send info to cookie
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
 * 
 */

function modelemail($typeEmail)
{
    if ($typeEmail === 'nuevo') {
        $output = typenuevo();
    } elseif ($typeEmail === 'proceso') {
        $output = typeproceso();
    } else {
        $output = typeEnviado();
    }
    return $output;
}

function typenuevo()
{
    if (isset($_COOKIE['chocoletraOrderData'])) {
        // Decode the JSON data from the cookie
        $getOrderData = json_decode(stripslashes($_COOKIE['chocoletraOrderData']), true);
    }

    $currentOrderDate = date('d F Y');

    $email = '
    
    <table cellspacing="0"
        style="max-width: 650px; width: 100%; margin: 0 auto; border: 1px solid #CCCCCC; padding: 15px; font-family: Arial, Helvetica, sans-serif;">
        <thead>
            <tr style="border-bottom: 2px solid #CCCCCC;">
                <td>
                    <a style="max-width: 150px;" href="https://chocoletra.com/" target="_blank">
                        <img style="max-width: 150px;"
                            src="https://chocoletra.com/wp-content/uploads/2022/03/imagenlogotipoOFCIALCHOCOLETRA-1.png"
                            alt="Chocoletra">
                    </a>
                </td>
                <td>
                    <p style="text-align: right; color: #7d7d7d;">
                        ' . $currentOrderDate . '                
                     </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="border-bottom: 1px solid #CCCCCC;"></div>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <h2 style="font-size: 24px; font-weight: bold; text-align: center; margin-top: 40px;">¡Gracias por
                        su compra!</h2>
                    <p style="text-align: center; font-size: 16px;  margin-bottom: 40px;">
                        Hemos recibido su pedido y le informaremos sobre este pedido en futuras actualizaciones. Su
                        pedido es: <span
                            style="text-decoration: underline; line-height: 16.8px;"><strong><em>' . $getOrderData['uoi'] . '</em></strong></span>
                    </p>
                </td>
            </tr>
            <tr style="background: #000;">
                <td style=" background: #000; padding:10px 20px;">
                    <p style="color: #fff; font-size: 14px; margin: 0;">Detalles Perfil</p>
                </td>
                <td style="background: #000; padding:10px 20px;">
                    <p style="color: #fff; font-size: 14px; margin: 0;">Detalles Envio</p>
                </td>
            </tr>
            <tr>
                <td style="padding:10px 20px;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                <li>
                    <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Nombre:</strong> ' . $getOrderData['fname'] . '</p>
                </li>
                <li>
                    <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Email:</strong>' . $getOrderData['email'] . '</p>
                </li>
                <li>
                    <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Telefono:</strong>' . $getOrderData['tel'] . '</p>
                </li>';
    $repareFrase = $getOrderData['mainText'];
    if (is_array($repareFrase)) {
        $fraseCount = count($repareFrase);
    } else {
        $fraseCount = 0;
    }

    $email .= '<li>
                    <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Frases: (' . $fraseCount . ')</strong></p>
                </li> ';
    if (is_array($repareFrase)) {
        foreach ($repareFrase as $frase) {
            $email .= '<li><p style="font-size: 14px; line-height: 120%; color: #000;">' . htmlspecialchars($frase) . '</p></li>';
        }
    }

    $email .= '<li>
                    <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Mensaje:</strong><br>
                    ' . $getOrderData['message'] . '    
                    </p>
                </li>
            </ul>
                        </td>

                <td style="padding:10px 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Direccion:</strong>
                            ' . $getOrderData['address'] . '
                            </p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Ciudad:</strong>
                            ' . $getOrderData['city'] . '
                            </p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Provincia:</strong>
                                ' . $getOrderData['province'] . '
                            </p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Codigo Postal:</strong>
                                ' . $getOrderData['postal'] . '
                            </p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Fecha de
                                    Entrega:</strong> ' . $getOrderData['picDate'] . '
                            </p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Pagado:</strong> 
                            ' . $getOrderData['payment'] . '
                            </p>
                        </li>';
    if ($getOrderData['coupon']) {
        $email .= '<li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;"><strong>Cupón:</strong>
                            ' . $getOrderData['coupon'] . '
                            </p>
                        </li>';
    }
    $email .= '</ul>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="margin: 20px 0;"></div>
                </td>
            </tr>
            <tr style="background: #000;">
                <td style=" background: #000; padding:10px 20px;">
                    <p style="color: #fff; font-size: 14px; margin: 0;">Elementos</p>
                </td>
                <td style="background: #000; padding:10px 20px;">
                    <p style="color: #fff; font-size: 14px; margin: 0; text-align: right;">Precio</p>
                </td>
            </tr>
            <tr>
                <td style="padding:10px 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;">Frases - ' . $fraseCount . '</p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;">Envío Normal</p>
                        </li>';
    if ($getOrderData['coupon']) {
        $email .= '<li>
                            <p style="font-size: 14px; line-height: 120%; color: #000;">Cupón</p>
                        </li>';
    }
    $email .= '</ul>
                </td>

                <td style="padding:10px 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000; text-align: right;">€' . $getOrderData['priceTotal'] . '</p>
                        </li>
                        <li>
                            <p style="font-size: 14px; line-height: 120%; color: #000; text-align: right;">€10</p>
                        </li>';
    if ($getOrderData['coupon']) {
        $email .= '<li>
                            <p style="font-size: 14px; line-height: 120%; color: #000; text-align: right;">- €10</p>
                        </li> ';
    }

    $email .= ' </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="border-bottom: 1px dotted #CCCCCC;"></div>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 20px;">
                    <p style="font-size: 14px; line-height: 120%; color: #000;">TOTAL</p>
                </td>

                <td style="padding:0px 20px;">
                    <p style="font-size: 14px; line-height: 120%; color: #000; text-align: right;">€' . $getOrderData['priceTotal'] . '</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="border-bottom: 1px dotted #CCCCCC;"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center; font-size: 16px;  margin: 40px 0;">
                        Gracias por comprar en Chocoletra, suscríbase a nuestro boletín y manténgase actualizado con
                        nuestros descuentos y ofertas.
                    </p>
                </td>
            </tr>
        </tbody>
        <tfoot style="background: #000; padding: 20px;">
            <tr>
                <td colspan="2">
                    <p style="text-align: center; margin: 25px 0;">
                        <span style="color: #ffffff; line-height: 1; font-size: 14px;">
                            <a rel="noopener" href="https://chocoletra.com/choco-store/" target="_blank"
                                style="color: #ffffff;">Tienda</a> |
                            <a rel="noopener" href="https://chocoletra.com/crea-tu-frase/" target="_blank"
                                style="color: #ffffff;">Frase</a> |
                            <a rel="noopener" href="https://chocoletra.com/my-account/" target="_blank"
                                style="color: #ffffff;">Cuenta </a>|
                            <a rel="noopener" href="https://chocoletra.com/about/" target="_blank"
                                style="color: #ffffff;">Quienes somos </a>|
                            <a rel="noopener" href="https://chocoletra.com/contact-us/" target="_blank"
                                style="color: #ffffff;">Contacto</a>
                        </span>
                    </p>
                    <p style="font-size: 14px; line-height: 1; text-align: center; color: #fff; margin-bottom: 30px;">Copyright © 2024 <span
                            style="color: #ffffff; line-height: 1;"><a rel="noopener"
                                href="https://chocoletra.com/" target="_blank"
                                style="color: #ffffff;">Chocoletra</a>.</span></p>
                </td>
            </tr>
        </tfoot>
    </table>
    ';

    return $email;
}

function typeproceso()
{
    $email = '<div style="background: rgb(245, 242, 242);  padding: 20px 0;">';
    $email .= '<div style="width: 95%; max-width: 500px; display: block; margin:0 auto; background: white;">';
    $email .= '<div style="height: 59px; display: flex; justify-content: flex-start; padding: 10px; border-bottom: solid 1px #bfb6b6;">';
    $email .= '<img width="100px" height="60px" src="https://chocoletra.com/wp-content/uploads/2022/02/logoChocoletra.jpg" alt="">';
    $email .= '</div>';
    $email .= '<figure style="display: block; margin: 20px auto 0; font-size: 40px;"><img style="display:block; margin:0 auto;" src="https://chocoletra.com/wp-content/uploads/2022/01/on-process.jpg" width="100px"></figure>';
    $email .= '<h4 style="text-align: center; margin: 20px auto; display: block; padding: 10px 30px 0; font-size: 25px; font-family: helvetica;">Enhorabuena, tu producto ha cambiado a estado: En Proceso!</h4>';
    $email .= '<span style="text-align: center; padding: 0 auto 50px; line-height: 4; display: block; font-size: 15px; font-family: arial;">Pronto recibir&aacute;s m&aacute;s actualizaciones de tu pedido.</span>';
    $email .= '</div>';
    $email .= '<footer style="width: 95%; max-width: 500px; background: black; margin: 0 auto;">';
    $email .= '<ul style="color: gray; list-style: none; font-size: 10px; padding: 10px 30px; margin:0;">';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/choco-store/">Tienda</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;"  href="https://chocoletra.com/crea-tu-frase/">Frase</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/my-account/">Cuenta</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/about/">Quienes somos</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/contact-us/">Contacto</a></li>';
    $email .= '</ul>';
    // $email .= '<div style="background: rgb(63, 61, 61);"><a style="color: gold; display: block; font-size: 10px; padding: 10px; text-decoration: none;" href="mailto:infoarte247@gmail.com">Design by: Lic. M. Sufyan Shaikh</a></div>';
    $email .= '</footer>';
    $email .= '</div>';

    return $email;
}

function typeEnviado()
{
    $email = '<div style="background: rgb(245, 242, 242);  padding: 20px 0;">';
    $email .= '<div style="width: 95%; max-width: 500px; display: block; margin:0 auto; background: white;">';
    $email .= '<div style="height: 59px; display: flex; justify-content: flex-start; padding: 10px; border-bottom: solid 1px #bfb6b6;">';
    $email .= '<img width="100px" height="60px" src="https://chocoletra.com/wp-content/uploads/2022/02/logoChocoletra.jpg" alt="">';
    $email .= '</div>';
    $email .= '<figure style="display: block; margin: 20px auto 0; font-size: 40px;"><img style="display:block; margin:0 auto;" src="https://chocoletra.com/wp-content/uploads/2022/01/enviado.jpg" width="100px"></figure>';
    $email .= '<h4 style="text-align: center; margin: 20px auto; display: block; padding: 10px 30px 0; font-size: 25px; font-family: helvetica;">Enhorabuena, tu producto ha cambiado a estado: Enviado o programado para la fecha escogida.</h4>';
    $email .= '<span style="text-align: center; padding: 0 auto 50px; line-height: 4; display: block; font-size: 15px; font-family: arial;">Si tiene alguna pregunta? Cont&aacute;ctenos al siguiente email: info@chocoletra.com</span>';
    $email .= '</div>';
    $email .= '<footer style="width: 95%; max-width: 500px; background: black; margin: 0 auto;">';
    $email .= '<ul style="color: gray; list-style: none; font-size: 10px; padding: 10px 30px; margin:0;">';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/choco-store/">Tienda</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;"  href="https://chocoletra.com/crea-tu-frase/">Frase</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/my-account/">Cuenta</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/about/">Quienes somos</a></li>';
    $email .= '<li style="margin-bottom:5px;"><a style="color: #e3d5d5; text-decoration: none;" href="https://chocoletra.com/contact-us/">Contacto</a></li>';
    $email .= '</ul>';
    // $email .= '<div style="background: rgb(63, 61, 61);"><a style="color: gold; display: block; font-size: 10px; padding: 10px; text-decoration: none;" href="mailto:infoarte247@gmail.com">Design by: Lic. M. Sufyan Shaikh</a></div>';
    $email .= '</footer>';
    $email .= '</div>';

    return $email;
}