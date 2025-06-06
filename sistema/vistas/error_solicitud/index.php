<?php

	session_start();

	require "../../conexion.php";
	require "../../php/funciones/CRUDS.php";

    if (empty($_SESSION['admin']['activo'])) {
        header("location: ../../../");
    }

	$sql = @mysqli_query($conn,"SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.imagen, c.nombre_categoria FROM producto p 
											INNER JOIN categoria_producto c ON p.id_categoria = c.id_categoria 
											WHERE estado = 1");
    
    // productos
    $p = mysqli_query($conn, "SELECT COUNT(*) AS total FROM producto WHERE estado = 1");
    $row = mysqli_fetch_assoc($p);
    $total_productos = $row['total'];

    // clientes
    $c = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cliente");
    $row = mysqli_fetch_assoc($c);
    $clientes = $row['total'];

    // pedidos
    $ped = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pedido");
    $row = mysqli_fetch_assoc($ped);
    $pedidos = $row['total'];
    
    // Solicitudes
    $sol = mysqli_query($conn, "SELECT COUNT(*) AS total FROM solicitud_cedula");
    $row = mysqli_fetch_assoc($sol);
    $solicitudes = $row['total'];

    // Bitácora
    $bit = mysqli_query($conn, "SELECT COUNT(*) AS total FROM bitacora");
    $row = mysqli_fetch_assoc($bit);
    $bitacora = $row['total'];

?>






<!DOCTYPE html>
<php lang="en">
  <head>
    
    <title>Error en la solicitud</title>

    <?php
        include "../../php/usefull/cabecera.php";
    ?>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->


        <?php
        
            require "../../php/usefull/header.php";

        ?>


      <!--header end-->







      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->









      <?php
        
            require "../../php/usefull/sidebar.php";
        
        ?>





      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          	<section class="wrapper">

              	<div class="contentPanel centrarContentPanel">
                    <h1>Oh... Parece que ha ocurrido un problema con su solicitud</h1>
                    <h3>Por favor, inténtelo de nuevo más tarde</h3>
                </div>

			</section>

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../../assets/js/sparkline-chart.js"></script>    
	<script src="../../assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '¡Bienvenido a PyR Cosmetics!',
            // (string | mandatory) the text inside the notification
            text: 'Disfrute su experiencia.',
            // (string | optional) the image to display on the left
            image: '../../assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({php: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</php>
