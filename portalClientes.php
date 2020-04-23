<?php
    include("conn.php");
    include("nombre_mes.php");
    session_start();
     
    $rut = $_SESSION['login_rut'];
    $sql = "SELECT * FROM usuarios WHERE rut = '$rut' and activo = 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
     
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1){
        $nombres = $row['nombres'];
        echo $nombres;
        $apellidos =utf8_encode($row['apellidos']); 
        $email =  $row['email'];
        $fono =  $row['fono']; 
      }
      mysqli_free_result($result);
      //mysqli_close($db);   
?>

<?php
    $sql = "SELECT * FROM proceso WHERE activo = 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1){
        echo $mes_numero;
        $mes_numero = $row['mes_proceso'];
        $ano_proceso = $row['ano_proceso'];
        $mes_nombre= nombre_mes($row['mes_proceso']);
      
    }
    mysqli_free_result($result);
?>

<?php
    //Departamento
    $sql = "SELECT * FROM departamentos where rut_propietario='$rut'"; 
    $result = mysqli_query($db,$sql);
                                                  
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
    $numero_depto = $row['numero_depto'];
    $porc_prorrateo = $row['porc_prorrateo'];
    }
    mysqli_free_result($result);
?>


<?php
    //Total Gastos Comunes
    $sql = "SELECT * FROM total_gcomunes where ano='$ano_proceso' and mes='$mes_numero' and numero_depto='$numero_depto'"; 
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1){
        $total_gcomun = $row['total_gcomun'];
        $total_gcomun= number_format($total_gcomun, 0, ",", ".");
        $total_cobranza = $row['total_cobranza'];
        $total_cobranza= number_format($total_cobranza, 0, ",", ".");
    }
    mysqli_free_result($result);
?>

<?php
    //Ruta Archivo Gastos
    $ruta_pdf = $ano_proceso.'-'.$mes_numero.'/'.$numero_depto.'.pdf';
?>
<html>

<head>
    <meta name="generator"
        content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LLEUQUES | Acceso Clientes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="dist/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="dist/plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="dist/plugins/summernote/summernote-bs4.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body>

    <style type="text/css">
    .container-fixed {
        margin: 0 30px;
        /*  max-width: 960px; */
    }
    </style>
    <div class="container-fixed">
        <div class="row">
            <div class="col-md-12">
                <img src="images/logo_lleuques_white_small.jpg" />
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Información del Propietario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>RUT</label>
                                    <p><label class="text-success"><?= $rut?></label></p>
                                </div>
                                <div class="form-group">
                                    <label>Propietario</label>
                                    <p><label class="text-success"><?= $nombres.' '.$apellidos?></label></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Fono</label>
                                    <p><label class="text-success"><?= $fono?></label></p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p><label class="text-success"><?= $email?></label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Propiedades</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table">
                                    <tr>
                                        <td width="200px">Departamento</td>
                                        <td width="200px"><label class="text-success"><?= $numero_depto?></label></td>
                                        <td width="600px">% Prorrateo</td>
                                        <td width="200px"><label class="text-success"><?= $porc_prorrateo?></label></td>
                                    </tr>
                                    <?php
                                        $sql = "SELECT * FROM unidades_por_departamento where rut_propietario='$rut'"; 
                                        $result = mysqli_query($db,$sql);
                                                  
                                         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                                             if($row['tipo_unidad']==1){
                                                 $tipo_unidad='Bodega';
                                             }else{
                                                 $tipo_unidad='Estacionamiento';
                                             }
                                             echo '<tr>';
                                             echo '<td width="200px">'.$tipo_unidad.'</td>';
                                             echo '<td width="200px"><label class="text-success">'.$row['numero_unidad'].'</label></td>';
                                             echo '<td width="600px">% Prorrateo</td>';
                                             echo '<td width="200px"><label class="text-success">'.$row['porc_prorrateo'].'</label></td>';
                                             echo '</tr>';
                                        }
                                         mysqli_free_result($result);
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gastos Comunes del Mes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Mes</label>
                                        <p>
                                            <label class="text-info"><?= $mes_nombre.' '.$ano_proceso?></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Total Gastos</label>
                                        <p>
                                            <label class="text-info"><?= $total_cobranza?></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Casa/Depto</label>
                                        <p>
                                            <label class="text-info"><?= $numero_depto?></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Total Depto.</label>
                                        <p>
                                            <label class="text-info"><?= $total_gcomun?></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Morosidad</label>
                                        <p>
                                            <label class="text-info"></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Total a Pagar</label>
                                        <p>
                                            <label class="text-success"><?= $total_gcomun?></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body 
                    <div class="card-footer">
                        <a href="informeGastos.php" target="_blank"
                            class="btn btn-outline-primary btn-lg btn-block">Informe de Gastos</a>
                        <a href="informeCobranza.php" target="_blank"
                            class="btn btn-outline-primary btn-lg btn-block">Informe de Cobranza</a>
                    </div>-->
                    <div class="card-footer">
                        <a href=<?= $ruta_pdf?> target="_blank" class="btn btn-outline-primary btn-lg btn-block">Informe
                            de
                            Gastos</a>
                        <a href="" target="" class="btn btn-outline-primary btn-lg btn-block">Informe de
                            Cobranza</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-4">
                <!-- general form elements disabled -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Resumen de Gastos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Mes</label>
                                            </td>
                                            <td>
                                                <label class="text-info"><?= $mes_nombre.' '.$ano_proceso?></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 70%">Concepto</th>
                                            <th style="width: 30%">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Remuneraciones</td>
                                            <td>2.592.727</td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Gastos de Administración</td>
                                            <td>15.980</td>
                                        </tr>-->
                                        <tr>
                                            <td>Gastos de Consumo</td>
                                            <td>450.050</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Mantención</td>
                                            <td>456.778</td>
                                        </tr>
                                        <tr>
                                            <td>Varios</td>
                                            <td>260.564</td>
                                        </tr>
                                        <tr>
                                            <td>Utiles de Aseo</td>
                                            <td>7.910</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="text-success">Total a Recaudar</label>
                                            </td>
                                            <td>
                                                <label class="text-success">3.768.029</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ultimos Pagos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Mes</label>
                                            </td>
                                            <td>
                                                <label class="text-info"><?= $mes_nombre.' '.$ano_proceso?></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%">Año</th>
                                            <th style="width: 30%">Mes</th>
                                            <th style="width: 30%">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Ultimos 7 Pagos
                                        $sql = "select ano,mes, numero_depto, sum(total_pagado) as pagado from pagos where numero_depto='$numero_depto' group by ano, mes order by idenc_pagos desc limit 6;"; 
                                        $result = mysqli_query($db,$sql);
                                        
                                        $ano_pagado = 0;
                                        $mes_pagado = 0;
                                        $total_pagado = 0;
                                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                                            $ano_pagado = $row['ano'];
                                            $mes_pagado = $row['mes'];
                                            $total_pagado= number_format($row['pagado'], 0, ",", ".");
                                            echo '<tr>';
                                                echo '<td>'.$ano_pagado.'</td>';
                                                echo '<td>'.nombre_mes($mes_pagado).'</td>';
                                                echo '<td>'.$total_pagado.'</td>';
                                            echo '</tr>';
                                        }
                                        mysqli_free_result($result);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- fin row de las 3 card -->
    </div>
    <!-- /container -->
</body>

</html>