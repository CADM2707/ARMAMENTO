<?php
include_once '../config.php';
include_once '../head.html';
?>     
<style>
    .text1{
        color: #094F93 !important;
        font-weight: 600 !important;
        font-size: 15px;
    }
    label{
        color: #525558 !important;
        font-weight: 600 !important;
    }
    a{
        text-decoration: none;
    }
    .select2-selection__choice{
        background-color: #28B463 !important;
        color: #EAECEE !important;
    }
    .select2-selection__choice__remove{
        color: #D5D8DC !important;
    }
    .unread {
        font-weight:800;
    }
    .textFont{
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif ;
    }
    .inptRI{
        background-color: #FFF2BD !important;
    }
    .modal {

        overflow-y: auto;
    }
    .img2 {
        border-radius: 8px;
        width: 100px !important;
    }
    .b2{
        color: #024589;
    }
</style>   
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/bower_components/select2/dist/css/select2.min.css">   
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">               
<div class="content-wrapper">
    <div class="container-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style=" background-color: white; border-bottom: 1px solid #B9B9B9;  box-shadow: 1px 1px 5px #999;">
            <h1><span><label class="gray"> <span class="fa fa-users"></span></label></span> Reporte - Resguardos por elemento</h1>            
        </section>        
        <!-- Main content -->
        <section class="content" style=" background-color: white;" >          

            <center><H4><label> <span class="fa fa-search" style=" color: #114D87"></span> BUSCAR ARMAMENTO RESGUARDADO</label></H4></center>
            <hr style=" margin: 2px">  
            <div class="row text-center">
                <div class="col-lg-4 col-xs-0 text-center"> </div> 
                <div class="col-lg-4 col-xs-12 text-center">  
                    <h4 class="titles1"><u>BUSCAR USUARIO</u></h4>                                      
                </div> 
            </div>
            <div class="row text-center">
                <div class="col-lg-4 col-xs-0 text-center"> </div> 
                <div class="col-lg-2 col-xs-6 text-center">  
                    <label>ID ELEMENTO</label>
                    <input onchange="searchElement()" type="text" class="form form-control" name="id_elemE" id="id_elemE">
                </div> 
                <div class="col-lg-2 col-xs-6 text-center">  
                    <label>PLACA</label>
                    <input onchange="searchElement()" type="text" class="form form-control" name="placaUsrE" id="placaUsrE">
                </div> 
            </div>
            <div id="usrdates" style=" display: none">
                <div class="row text-center">
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>SECTOR</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="sectorRI" id="sectorRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>DESTTO</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="desttoRI" id="desttoRI">
                    </div>
                    <div class="col-lg-4 col-xs-12 text-center">
                        <label>NOMBRE</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="nombreRI" id="nombreRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>ID USUARIO</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="idUsuarioRI" id="idUsuarioRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>PORTACION</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="portacionRI" id="portacionRI">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-2 col-xs-12 text-center">
                        <label>RAZÓN SOCIAL</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="RsocialRI" id="RsocialRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>DOMICILIO</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="domicilioRI" id="domicilioRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>COLONIA</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="coloniaRI" id="coloniaRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>ENTIDAD</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="entidadRI" id="entidadRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>LOCALIDAD</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="localidadRI" id="localidadRI">
                    </div>
                    <div class="col-lg-2 col-xs-6 text-center">
                        <label>CP</label>
                        <input readonly="true" type="text" class="form form-control inptRI" name="cpRI" id="cpRI">
                    </div>
                </div><hr>  
                <div class="row text-center">
                    <div class="col-lg-4 col-xs-0 text-center"> </div> 
                    <div class="col-lg-4 col-xs-12 text-center">  
                        <h4 class="titles1"><u>ARMAS EN RESGUARDO</u></h4>                                      
                    </div> 
                </div>
                <div id="armasResguardo" class="row text-center"></div>
            </div>
            <div id='alertaRespuesta' style=" display: none;">
                <center>
                    <div class="alert alert-warning" role="alert">
                        <h4>  No se encontraron resultados, verifique que los datos sean correctos!</h4>
                    </div>
                </center>
            </div> 
            <div id='alertaRespuesta2' style=" display: none;">
                <center>
                    <div class="alert alert-warning" role="alert">
                        <h4>  No se encontraron resguardos del usuario!</h4>
                    </div>
                </center>
            </div> 
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>      
<?php include_once '../footer.html'; ?>
<div class="modal fade in" id="modal-default">
    <div class="modal-dialog modal-lg " role="dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header title_left" style=" background-color: #2C3E50;">
                <button type="button" class="close" data-dismiss="modal" style=" background-color: white;">&nbsp&nbsp;&times;&nbsp&nbsp;</button>
                <span style="text-align: center">
                    <h4 style=" color: white; font-weight: 600"><i class='fa fa-user'></i> &nbsp;<span id="tipoAutoriza"></span></h4>
                </span>
            </div>   
            <div class="modal-body">                
                    <div id="elementsData"></div>                
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="close" data-dismiss="modal" style=" background-color: black;">&nbsp&nbsp;&times;&nbsp&nbsp;</button>-->
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $('.select2').select2();
    $(document).ready(function () {
//        loadsec();
//        loadsecsearch();
    });

    function searchElement() {
        var placa = $("#placaUsrE").val();
        var id_elemento = $("#id_elemE").val();
        $("#usrdates").hide(1000);
        var url = "<?php echo BASE_URL; ?>includes/catalogos/elementos.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                Placa: placa,
                Elemento: id_elemento
            },
            success: function (data)
            {
                if (data.length) {
                    $("#id_elemE").val(data[0]);
                    $("#placaUsrE").val(data[1]);
                    $("#nombreRI").val(data[2]);
                    $("#sectorRI").val(data[3]);
                    $("#desttoRI").val(data[4]);
                    $("#idUsuarioRI").val(data[5]);
                    $("#RsocialRI").val(data[6]);
                    $("#portacionRI").val(data[7]);
                    $("#domicilioRI").val(data[8]);
                    $("#coloniaRI").val(data[9]);
                    $("#entidadRI").val(data[10]);
                    $("#localidadRI").val(data[11]);
                    $("#cpRI").val(data[12]);
                    $("#id_elemES").val(data[0]);
                    $("#placaUsrES").val(data[1]);
                    $("#nombreRIS").val(data[2]);
                    $("#sectorRIS").val(data[3]);
                    $("#desttoRIS").val(data[4]);
                    $("#idUsuarioRIS").val(data[5]);
                    $("#RsocialRIS").val(data[6]);
                    $("#portacionRIS").val(data[7]);
                    $("#domicilioRIS").val(data[8]);
                    $("#coloniaRIS").val(data[9]);
                    $("#entidadRIS").val(data[10]);
                    $("#localidadRIS").val(data[11]);
                    $("#cpRIS").val(data[12]);

                    $("#usrdates").show(1000);

                    armasResguardadas(id_elemento);
                } else {
                    $("#alertaRespuesta").show();
                    $("#placaUsrE").val('');
                    $("#id_elemE").val('');

                    setTimeout(function () {
                        $("#alertaRespuesta").hide()
                    }, 4000);
                }
            }, error: function (data) {
                $("#alertaRespuesta").show();
                $("#placaUsrE").val('');
                $("#id_elemE").val('');

                setTimeout(function () {
                    $("#alertaRespuesta").hide()
                }, 4000);
            }
        });
        return false;
    }

    function armasResguardadas(id_elemento) {

        var url = "<?php echo BASE_URL; ?>includes/resguardos/resguardos_usuarios.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {
                id_elemento: id_elemento
            },
            success: function (data)
            {
                $("#armasResguardo").html(data);


            }, error: function (data) {
                $("#alertaRespuesta2").show();
                setTimeout(function () {
                    $("#alertaRespuesta2").hide()
                }, 4000);
            }
        });
        return false;
    }
    function dispElementAsig(id_elemento, id_autoriza) {

        
        var url = "<?php echo BASE_URL; ?>includes/armamento/busca_autorizan.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {
                id_elemento: id_elemento
            },
            success: function (data)
            {                
                if (id_autoriza == 1) {
                    $("#tipoAutoriza").text("VISTO BUENO");
                } else {
                    $("#tipoAutoriza").text("AUTORIZA");
                }
                $("#elementsData").html(data);
            }
        });

        return false;
    }

</script>



