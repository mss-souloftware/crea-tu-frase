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
    $email = '
    
<style type="text/css">
    @media only screen and (min-width: 620px) {
        .u-row {
            width: 600px !important;
        }

        .u-row .u-col {
            vertical-align: top;
        }

        .u-row .u-col-50 {
            width: 300px !important;
        }

        .u-row .u-col-100 {
            width: 600px !important;
        }

    }

    @media (max-width: 620px) {
        .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
        }

        .u-row {
            width: 100% !important;
        }

        .u-col {
            width: 100% !important;
        }

        .u-col>div {
            margin: 0 auto;
        }
    }

    body {
        margin: 0;
        padding: 0;
    }

    table,
    tr,
    td {
        vertical-align: top;
        border-collapse: collapse;
    }

    p {
        margin: 0;
    }

    .ie-container table,
    .mso-container table {
        table-layout: fixed;
    }

    * {
        line-height: inherit;
    }

    a[x-apple-data-detectors="true"] {
        color: inherit !important;
        text-decoration: none !important;
    }

    @media (min-width: 481px) and (max-width: 768px) {}

    table,
    td {
        color: #000000;
    }

    #u_body a {
        color: #0000ee;
        text-decoration: underline;
    }
</style>
<div class="clean-body u_body"
    style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000; max-width: 650px;">
    <!--[if IE]><div class="ie-container"><![endif]-->
    <!--[if mso]><div class="mso-container"><![endif]-->
    <table id="u_body"
        style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%"
        cellpadding="0" cellspacing="0">
        <tbody>
            <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->



                    <div class="u-row-container" style="padding: 10px 10px 0px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 10px 10px 0px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:20px 20px 0px 10px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                                border="0">
                                                                <tr>
                                                                    <td style="padding-right: 0px;padding-left: 0px;"
                                                                        align="left">
                                                                        <a href="https://chocoletra.com/"
                                                                            target="_blank">
                                                                            <img align="left" border="0"
                                                                                src="https://chocoletra.com/wp-content/uploads/2022/03/imagenlogotipoOFCIALCHOCOLETRA-1.png" alt="Image"
                                                                                title="Image"
                                                                                style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 50%;max-width: 135px;"
                                                                                width="135" />
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:31px 20px 0px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; line-height: 150%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 150%;"><span
                                                                        style="font-family: Lato, sans-serif; font-size: 14px; line-height: 21px; color: #7d7d7d;"><span
                                                                            style="line-height: 21px; font-size: 14px;">30th
                                                                            July 20XX</span></span></p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px 3px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 3px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <table height="0px" align="center" border="0"
                                                                cellpadding="0" cellspacing="0" width="100%"
                                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #CCC;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                <tbody>
                                                                    <tr style="vertical-align: top">
                                                                        <td
                                                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                            <span>&#160;</span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px 10px;background-color: #ffffff">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 10px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:20px 20px 5px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="line-height: 120%; text-align: center;"><span
                                                                        style="font-size: 30px; line-height: 36px;"><strong><span
                                                                                style="line-height: 16.8px;">¡Gracias
                                                                                por su compra!</span></strong></span>
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:30px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: center; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;"><span
                                                                        style="font-size: 16px; line-height: 19.2px;">Hemos
                                                                        recibido su pedido y le informaremos sobre este
                                                                        pedido en futuras actualizaciones. Su pedido es:
                                                                        <span
                                                                            style="text-decoration: underline; line-height: 16.8px;"><strong><em>sdfs38zz9</em></strong></span></span>
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: left; word-wrap: break-word; padding:10px 20px;">
                                                                <p style="font-size: 14px; line-height: 120%;">Detalles
                                                                    Perfil</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif; padding:10px 20px;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">Detalles
                                                                    Envio</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Nombre:</strong> M Sufyan Sheikh</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Direccion:</strong> North Nazimabad, Karachi
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Email:</strong> sufyan.souloftware@gmail.com
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Ciudad:</strong> Karachi</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Telefono:</strong> 361054938</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Provincia:</strong> asddd</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Frases: (1)</strong></p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Codigo Postal:</strong> 74600</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    SUYFAN♥SHAIKH♥</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Fecha de Entrega:</strong> 2024-07-06</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    SUYFAN♥SHAIKH♥</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Pagado:</strong> Redsys</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Mensaje:</strong></p>
                                                                <p style="font-size: 14px; line-height: 120%;">Lorem
                                                                    ipsum mensaje...</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:5px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">
                                                                    <strong>Cupón:</strong> CRIS10</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 30px 10px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 30px 10px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif; padding:10px 20px;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">Elementos
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif; padding:10px 20px;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">Precio
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">Frases -
                                                                    3</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="line-height: 120%;">Envío Normal</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">€50</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">€10</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">Cupón</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">- €10</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px 7px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 7px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <table height="0px" align="center" border="0"
                                                                cellpadding="0" cellspacing="0" width="100%"
                                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px dotted #CCC;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                <tbody>
                                                                    <tr style="vertical-align: top">
                                                                        <td
                                                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                            <span>&#160;</span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif; padding:10px 20px;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; line-height: 120%; text-align: left; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">TOTAL</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]><td align="center" width="300" style="width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:"Lato",sans-serif; padding:10px 20px;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; line-height: 120%; text-align: right; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 120%;">€80</p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 10px 5px;background-color: rgba(255,255,255,0)">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 5px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <table height="0px" align="center" border="0"
                                                                cellpadding="0" cellspacing="0" width="100%"
                                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px dotted #CCC;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                <tbody>
                                                                    <tr style="vertical-align: top">
                                                                        <td
                                                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                            <span>&#160;</span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 0px 20px;background-color: #ffffff">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 20px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #303030; line-height: 170%; text-align: center; word-wrap: break-word;">
                                                                <p
                                                                    style="font-size: 14px; line-height: 170%; text-align: center;">
                                                                    <span
                                                                        style="font-size: 16px; line-height: 27.2px;">Gracias
                                                                        por comprar con Chocolate, suscríbase a nuestro
                                                                        boletín y manténgase actualizado con nuestros
                                                                        descuentos y ofertas.</span></p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>





                    <div class="u-row-container" style="padding: 0px 0px 20px;background-color: #ffffff">
                        <div class="u-row"
                            style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 0px 20px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->

                                <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #000000;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="background-color: #000000;height: 100%;width: 100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                            <!--<![endif]-->

                                            <table style="font-family:"Lato",sans-serif;" role="presentation"
                                                cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:"Lato",sans-serif;"
                                                            align="left">

                                                            <div
                                                                style="font-size: 14px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                <p style="font-size: 14px; line-height: 140%;"><span
                                                                        style="color: #ffffff; line-height: 19.6px;"><a
                                                                            rel="noopener"
                                                                            href="https://chocoletra.com/choco-store/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Tienda</a> | <a
                                                                            rel="noopener"
                                                                            href="https://chocoletra.com/crea-tu-frase/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Frase</a> | <a
                                                                            rel="noopener"
                                                                            href="https://chocoletra.com/my-account/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Cuenta </a>| <a
                                                                            rel="noopener"
                                                                            href="https://chocoletra.com/about/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Quienes somos </a>|
                                                                        <a rel="noopener"
                                                                            href="https://chocoletra.com/contact-us/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Contacto</a></span>
                                                                </p>
                                                                <p style="font-size: 14px; line-height: 140%;"> </p>
                                                                <p style="font-size: 14px; line-height: 140%;">Copyright
                                                                    © 2024 <span
                                                                        style="color: #ffffff; line-height: 19.6px;"><a
                                                                            rel="noopener"
                                                                            href="https://chocoletra.com/"
                                                                            target="_blank"
                                                                            style="color: #ffffff;">Chocoletra</a>.</span>
                                                                </p>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!--[if (!mso)&(!IE)]><!-->
                                        </div><!--<![endif]-->
                                    </div>
                                </div>
                                <!--[if (mso)|(IE)]></td><![endif]-->
                                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                        </div>
                    </div>



                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <!--[if mso]></div><![endif]-->
    <!--[if IE]></div><![endif]-->
</div>

    
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