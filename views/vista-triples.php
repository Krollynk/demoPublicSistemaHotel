<?php
$resultado = ' ';
if(isset($_POST['submit'])){

    require 'phpmailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='hotelumg@gmail.com';
    $mail->Password='umgpass1';

    $mail->setFrom('hotelumg@gmail.com','Hotel Platinum');
    $mail->addAddress($_POST['email']);
    $mail->addAddress('hotelumg@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);

    $mail->Subject="Reserva";
    $mail->isHTML(true);
    $mail->Body='<h1 align=center>Querido cliente: '.$_POST['nombre'].'</h1><br>
    <p>su reservacion se esta procesando exitosamente'.'<br> Su entrada sera el dia '.$_POST['entrada'].'<br>
    y su salida el dia'.$_POST['salida'].'<br>El precio final sera de: '.$_POST['preciofinal'].' 
    por un total de '.$_POST['dias'].' noches en una habitacion Triple de Q'.$_POST['precio'].'</p>'; 

    if(!$mail->send()){
        $resultado = "Algo esta mal, intentelo de nuevo";
    }else{
        $resultado = "Se ha enviado una copia de la reserva a tu correo, si no te aparece en el inicio por favor revisa el spam";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="../css/reserva_estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    </head>
    <body>
        <header>
            <nav class="nav">
                <a href="#" class="logo">PLATINUM</a>
                <ul id="navegacion">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="../backend/index.php">Iniciar Sesion</a></li>
                </ul>
            </nav>
        </header>
        
        <main class="main">
            <div class="contenedor">
                <h1>Habitacion Triple</h1>
                <h2>Reservar</h2>
                <h5 class="enviocorrecto"><?=$resultado;?></h5>
                
                <div class="cont_reserva">
                    <div class="reserva">
                        <div class="imgn">
                            <ul>
                                <li><img src="../img/fondo 2.jpg" class="imagen" alt="imagen"></li>
                                <li><img src="../img/fondo 1.jpg" class="imagen" alt="imagen"></li>
                                <li><img src="../img/prueba1.jpg" class="imagen" alt="imagen"></li>
                            </ul>
                        </div>
    
                        <div class="panel_reserva">
                            <h2>Q<span>800</span> Por Noche</h2>
                            <form action="" method="post">
                                <label for="dias">Entrada y Salida</label>
                                <br>
                                <input type="text" id="datepicker" name="entrada" class="fecha">
                                <input type="text" id="datepicker2" name="salida" class="fecha">
                                <br>

                                <label for="nombre">Ingrese su nombre</label>
                                <br>
                                <input type="text" name="nombre" class="nombre">
                                <br>
                                <label for="Email">Ingrese su correo</label>
                                <br>
                                <input type="email" name="email" class="email" required>
                                <br>
                                <label for="noches">Total de noches</label>
                                <br>
                                <span id="diascalculados"></span>
                                <br>
                                <label for="SubTotal">Sub Total</label>
                                <br>
                                <label><span id="subtotal"></span></label>
                                <br>
                                <input type="hidden" name="precio" id="precio" value="800">
                                <input type="hidden" name="preciofinal" id="preciofinal" value="">
                                <input type="hidden" name="dias" id="dias" value="">

                                <input type="submit" name="submit" value="Reservar">
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <h2>Reseña de habitacion</h2>
                <div class="resenia">
                    <div class="descripcion">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet porro alias officia aut laborum eaque praesentium accusamus natus quod, esse ratione ullam earum id pariatur qui quis aliquam, vel similique.</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam facere doloremque, ut vero harum labore in, veniam iste possimus natus cum nostrum neque numquam doloribus eum nisi aperiam sit nesciunt!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quas a vel incidunt sit, facere nesciunt, accusantium impedit ab eum dignissimos quod, natus aliquam id sed tempore deserunt eligendi voluptate?</p>
                    </div>
                    <ul class="lista_servicios">
                        <li>Una Cama Matrimonial</li>
                        <li>Televisor</li>
                        <li>Acceso a Internet</li>
                        <li>Agua Caliente</li>
                        <li>Baño Independiente</li>
                    </ul>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="contenedor">
                <div class="fila-footer">
                    <div class="img-footer"></div>
                    <div class="contacto-footer">
                        <ul class="info-contacto">
                            <li><i class="ri-mail-line"></i> ejemplocorreo@gmail.com</li>
                            <li><i class="ri-whatsapp-line"></i> Tel: 5555-6666</li>
                            <li><a href="#"><i class="ri-facebook-box-fill"></i> Facebook</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="../js/vista.js"></script>
        <script src="../js/datepicker.js"></script>
    </body>
</html>