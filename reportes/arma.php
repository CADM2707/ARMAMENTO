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
        .modal {

        overflow-y: auto;
    }
    .img2 {
        border-radius: 8px;
        width: 100px !important;        
    }
</style>   
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/bower_components/select2/dist/css/select2.min.css">   
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">               
<div class="content-wrapper">
    <div class="container-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style=" background-color: white; border-bottom: 1px solid #B9B9B9;  box-shadow: 1px 1px 5px #999;">
            <h1><span><label class="gray"> <span class="fa fa-rocket"></span></label></span> Reporte - Resguardo armas</h1>            
        </section>        
        <!-- Main content -->
        <section class="content" style=" background-color: white;" >          
            <form method="POST" id="searchPadron" name="searchPadron">                                                                                
                                <div class="row text-center">                                            
                                    <div class="col-lg-1 col-xs-0  text-center"></div>  
                                    <div class="col-lg-2 col-xs-12  text-center">  
                                        <label>MATRICULA</label>
                                        <input  class="form form-control" type="text" name="matricula1" id="matricula1">
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>CLASIFICACIÓN</label>
                                        <select  class="form form-control select2" name="clasificacion1" id="clasificacion1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>TIPO</label>
                                        <select  class="form form-control select2" name="tipo1" id="tipo1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MARCA</label>
                                        <select  class="form form-control select2" name="marca1" id="marca1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MODELO</label>
                                        <select  class="form form-control select2" name="modelo1" id="modelo1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                                                                                                                                                                                                                                    
                                </div>
                                <div class="row text-center">       
                                    <div class="col-lg-1 col-xs-0  text-center"></div>  
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>RFAFE</label>
                                        <input  class="form form-control" type="text" name="rfafe1" id="rfafe1">
                                    </div> 
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>CALIBRE</label>
                                        <select  class="form form-control select2" name="calibre1" id="calibre1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>PROPIETARIO</label>
                                        <select  class="form form-control select2" name="propietario1" id="propietario1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>SITUACIÓN</label>
                                        <select  class="form form-control select2" name="situacion1" id="situacion1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                        </select>
                                    </div>                                      
                                </div>
                                <div class="row text-center">
                                    <br>
                                    <button class="btn btn-success" name="Buscar" value="1" type="submit"><i class="fa fa-search"></i> Buscar</button>
                                    <button onclick="descargarExcel()" id="exportar" class="btn btn-warning disabled" name="Exportar" value="" type="button"><i class="fa fa-download"></i> Exportar</button>
                                    <br><hr>                                            
                                    <div id="padronArmamento" class="table-responsive"></div>
                                    <br>                                            

                                </div>
                            </form>    
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>      
<?php include_once '../footer.html'; ?>

<div class="modal fade in" id="modal-default">
    <div class="modal-dialog modal-lg" role="dialog" style=" width: 100% !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header title_left" style=" background-color: #2C3E50;">
                <button type="button" class="close" data-dismiss="modal" style=" background-color: white;">&nbsp&nbsp;&times;&nbsp&nbsp;</button>
                <span style="text-align: center">
                    <h4 style=" color: white; font-weight: 600"><i class='fa fa-user'></i> &nbsp;RESGUARDO DE ARMAMENTO.</h4>
                </span>
            </div>   
            <div class="modal-body">
                <div id="elementsData" class=" table-responsive"></div>
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
        loadsec();
        loadsecsearch();        
    });
    function loadDest() {

        var url = "<?php echo BASE_URL; ?>includes/Buzon/buzon_Options_op.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'html',
            data: {

            },
            success: function (data)
            {
                $('#dest').html(data);
            }
        });

        return false;
    }
    
    $("#searchPadron").submit(function () {
        load();
        var url = "<?php echo BASE_URL; ?>includes/armamento/padron_armamento.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#searchPadron").serialize(),
            success: function (data)
            {
                $("#padronArmamento").html(data); 
                $("#ModalLoad").modal('hide');
                $(".hidex").hide();
                $(".hidey").show();
                var nFilas = $("#padronSearch tr").length - 1;
                if(nFilas>0){
                    $("#exportar").removeClass('disabled');
                    $("#exportar").show(1000);
                    $(".hidex").show();
                    $(".hidez").hide();
                    $(".hidey").hide();
                }else{
                    $("#exportar").addClass('disabled');
                    $("#exportar").hide(1000);
                }
                
                
            }
        });

        return false;

    });
    
        function loadsec() {

        var url = "<?php echo BASE_URL; ?>includes/catalogos/selectores.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                loadSelectores: 1
            },
            success: function (data)
            {
                $("#clasificacion").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[0]);
                $("#tipo").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[1]);
                $("#marca").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[2]);
                $("#modelo").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[3]);
                $("#calibre").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[4]);
                $("#situacion").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[5]);
                $("#areaRes").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[6]);
                $("#propietario").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[7]);
                
                $("#clasificacion2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[0]);
                $("#tipo2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[1]);
                $("#marca2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[2]);
                $("#modelo2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[3]);
                $("#calibre2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[4]);
                $("#situacion2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[5]);
                $("#areaRes2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[6]);
                $("#propietario2").html("<option selected='selected' value='' disabled=''>Opciones</option>" + data[7]);
            }
        });

        return false;
    }
        function loadsecsearch() {

        var url = "<?php echo BASE_URL; ?>includes/catalogos/selectores.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                loadSelectores: 1,
                dos: 1
            },
            success: function (data)
            {
                $("#clasificacion1").html("<option selected='selected' value='' >Selecciona</option>" + data[0]);
                $("#tipo1").html("<option selected='selected' value='' >Selecciona</option>" + data[1]);
                $("#marca1").html("<option selected='selected' value='' >Selecciona</option>" + data[2]);
                $("#modelo1").html("<option selected='selected' value='' >Selecciona</option>" + data[3]);
                $("#calibre1").html("<option selected='selected' value='' >Selecciona</option>" + data[4]);
                $("#situacion1").html("<option selected='selected' value='' >Selecciona</option>" + data[5]);
                $("#areaRes1").html("<option selected='selected' value='' >Selecciona</option>" + data[6]);
                $("#propietario1").html("<option selected='selected' value='' >Selecciona</option>" + data[7]);
            }
        });

        return false;
    }
    
        function descargarExcel(){
        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la información desde el div que lo contiene en el html
        // Obtenemos la información de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('padronSearch');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Reporte_Global.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();
    }
        function dispElementAsig(matriclua) {
        var url = "<?php echo BASE_URL; ?>includes/armamento/resguardo_de_armas.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {
                matricula: matriclua,
                armas:1
            },
            success: function (data)
            {
                if(data!=0){                    
                    $("#elementsData").html(data);                    
                }else{
                    $("#elementsData").html("<div class='alert alert-warning' role='alert'><center><b>  No se encontraron resultados!</center><b></div>");
               }
            }
        });

        return false;
    }
</script>



