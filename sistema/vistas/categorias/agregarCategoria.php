<?php

session_start();

if (empty($_SESSION['admin']['activo'])) {
    header("location: ../../../");
} else {

    require "../../conexion.php";
    require "../../modelos/productos.php";

    $consulta = @mysqli_query($conn, "SELECT * FROM categoria_producto");

}

?>






<!DOCTYPE html>
<php lang="en">

    <head>
        <title>Agregar Categorías</title>
        <?php
        include "../../php/usefull/cabecera.php";
        ?>
    </head>

    <body>

        <section id="container">
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

                    <h3><i class="fa fa-newspaper-o"></i> Agregar categoría</h3>

                    <!-- BASIC FORM ELELEMNTS -->
                    <div class="row mt">
                        <div class="col-lg-12">
                            <div class="form-panel">
                                <h4 class="mb"><i class="fa fa-angle-right"></i> Agregar nueva categoría</h4>
                                <form class="form-horizontal style-form"
                                    action="../../controladores/categorias/agregarCategorias.php" method="POST">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nombre" required class="form-control">
                                            <div class="asterisco">*</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descripcion" required class="form-control">
                                            <div class="asterisco">*</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10" style="width:100%; display: flex; justify-content: center;">
                                            <input style="background: #7272df; color: white;" type="submit"
                                                class="form-control" value="Agregar">
                                        </div>
                                    </div>

                                    <div>Los campos obligatorios estan resaltados con un <div class="asterisco">*</div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- col-lg-12-->
                    </div><!-- /row -->

                </section><!-- /wrapper -->
            </section><!-- /MAIN CONTENT -->








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
                $("#date-popover").popover({ php: true, trigger: "manual" });
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
                        { type: "text", label: "Special event", badge: "00" },
                        { type: "block", label: "Regular event", }
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