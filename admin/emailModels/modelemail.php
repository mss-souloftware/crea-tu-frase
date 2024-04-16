<?php
/**
 * 
 * author: M. Sufyan Shaikh
 * description: process form and send info to cookie
 * @package Chocoletras
 * @subpackage M. Sufyan Shaikh
 * 
 * 
*/ 

function modelemail($typeEmail){
   $output = $typeEmail === 'proceso' ? typeproceso() : typeEnviado();
   return $output;
}
function typeproceso(){ 
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

function typeEnviado(){ 
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