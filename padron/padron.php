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
    <div class="container-fluid" style=" padding: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header" style=" background-color: white; border-bottom: 1px solid #B9B9B9;  box-shadow: 1px 1px 5px #999;">
            <h1><span><label class="gray"> <span class="fa fa-rocket"></span></label></span> Padrón de armamento</h1>            
        </section>        
        <!-- Main content -->
        <section class="content" style=" background-color: white; padding: 20px" >
            <div class="row text-center">
                <div class="nav-tabs-custom" style=" border: solid 1px #B0B3B6 !important;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a class="text1" href="#tab_1" data-toggle="tab"><i class="fa fa-plus-square"></i> &nbsp;AGREGAR ARMAMENTO</a></li>
                        <!--<li ><a class="text1" href="#tab_2" data-toggle="tab"><i class="fa fa-pencil-square"></i> &nbsp;EDITAR ARMAMENTO</a></li>-->
                        <li ><a class="text1" href="#tab_3" data-toggle="tab"><i class="fa fa-search"></i> &nbsp;CONSULTAR ARMAMENTO</a></li>              
                        <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active text-left" id="tab_1">   
                            <center><H4><label> <span class="fa fa-plus" style=" color: #114D87"></span> INGRESAR NUEVO ARMAMENTO</label></H4></center>
                            <hr>                                    
                            <form method="POST" id="addArmamento" name="addArmamento">                                                                                
                                <div class="row text-center">                                            
                                    <div class="col-lg-1 col-xs-0 text-center"></div>  
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MATRICULA</label>
                                        <input required="true" class="form form-control" type="text" name="matricula" id="matricula">
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>CLASIFICACIÓN</label>
                                        <select required="true" class="form form-control select2" name="clasificacion" id="clasificacion" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>TIPO</label>
                                        <select required="true" class="form form-control select2" name="tipo" id="tipo" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MARCA</label>
                                        <select required="true" class="form form-control select2" name="marca" id="marca" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MODELO</label>
                                        <select required="true" class="form form-control select2" name="modelo" id="modelo" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                                                                                                                                                                                                                                    
                                </div>
                                <div class="row text-center">     
                                    <div class="col-lg-1 col-xs-0 text-center"></div>  
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>RFAFE</label>
                                        <input required="true" class="form form-control" type="text" name="rfafe" id="rfafe">
                                    </div> 
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>CALIBRE</label>
                                        <select required="true" class="form form-control select2" name="calibre" id="calibre" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>PROPIETARIO</label>
                                        <select required="true" class="form form-control select2" name="propietario" id="propietario" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                        
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>SITUACIÓN</label>
                                        <select required="true" class="form form-control select2" name="situacion" id="situacion" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                        </select>
                                    </div>                                        
                                </div>
                                <br>
                                <div class="row text-center">
                                    <button class="btn btn-primary" name="guardar" value="1" type="submit"><i class="fa fa-save"></i> GUARDAR</button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <div class="" id="alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Mensaje: </strong>
                                        <div id="msg"></div>
                                    </div>   
                                </div>
                                <div class="col-md-4"></div>
                            </div> 
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane text-left" id="tab_2">
                            <br>                                    
                            <form method='POST' id='encargadoChange'>
                                <input type='hidden' id='id_usu2' name='id_usu2'>
                                <div class='row'>
                                    <div class='col-lg-1 col-xs-1 text-center'></div>  
                                    <div id="tab_22"></div>
                                    <div class='col-lg-2 col-xs-12 text-center'>
                                        <br>
                                        <button class='btn btn-primary' type='submit'><i class='fa fa-save'></i> &nbsp;ACTUALIZAR</button>
                                    </div>
                                </div> 
                            </form>   
                            <br>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane text-left" id="tab_3">

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
                                    <br><hr>                                            
                                    <div id="padronArmamento" class="table-responsive"></div>
                                    <br>                                            

                                </div>
                            </form>                                       

                            <hr>                                  
                            <div id="cuentasUsuario"></div>
                            <div class="modal fade" id="updateArma" role="dialog" >
                                <div class="modal-dialog mymodal modal-lg" style=" width: 100% !important">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header title_left" style=" background-color: #2C3E50;">
                                            <button type="button" class="close" data-dismiss="modal" style=" background-color: white;">&nbsp&nbsp;&times;&nbsp&nbsp;</button>
                                            <span style="text-align: center">
                                                <h4 style=" color: white; font-weight: 600"><i class='fa fa-edit'></i> &nbsp;EDITAR ARMA.</h4>
                                            </span>
                                        </div>   
                                        <div class="modal-body">
                                            <div id="">
                                                <div class="col-md-12">
                                                    <form id='updateArmas' name='updateArmas' method="POST"><div class="row text-center">   
                                                            <div class="col-lg-1 col-xs-0  text-center"></div>  
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>MATRICULA</label>
                                                                <input readonly="true" class="form form-control" type="text" name="matricula2" id="matricula2">
                                                            </div>                                                                                                                                                                        
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>CLASIFICACIÓN</label>
                                                                <select class="form form-control" name="clasificacion2" id="clasificacion2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                                </select>
                                                            </div>                                                                                                                                                                        
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>TIPO</label>
                                                                <select class="form form-control" name="tipo2" id="tipo2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                                                </select>
                                                            </div>                                                                                                                                                                        
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>MARCA</label>
                                                                <select class="form form-control" name="marca2" id="marca2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                                </select>
                                                            </div>                                                                                                                                                                        
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>MODELO</label>
                                                                <select class="form form-control" name="modelo2" id="modelo2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                                </select>
                                                            </div>                                                                                                                                                                                                                                                                                                                                                                                                        
                                                        </div>
                                                        <div class="row text-center">
                                                            <div class="col-lg-1 col-xs-0  text-center"></div>  
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>RFAFE</label>
                                                                <input class="form form-control" type="text" name="rfafe2" id="rfafe2">
                                                            </div>
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>CALIBRE</label>
                                                                <select class="form form-control" name="calibre2" id="calibre2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>PROPIETARIO</label>
                                                                <select class="form form-control " name="propietario2" id="propietario2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                                </select>
                                                            </div>                                                                                                                                                                        
                                                            <div class="col-lg-2 col-xs-12 text-center">  
                                                                <label>SITUACIÓN</label>
                                                                <select class="form form-control " name="situacion2" id="situacion2" style="width: 100%;">
                                                                    <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                                                </select>
                                                            </div>                                                           
                                                        </div>
                                                        <hr>
                                                        <div class="row text-center">
                                                            <a class='btn btn-success' value='' onclick='updateConfirma()' ><i class='fa fa-refresh'></i> ACTUALIZAR</a>                                                        
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" ><i class="fa fa-close" ></i> CERRAR</button>
                                                        </div>
                                                    </form>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!--                <button type="button" class="close" data-dismiss="modal" style=" background-color: black;">&nbsp&nbsp;&times;&nbsp&nbsp;</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="usrresguardo" style=" display: none"></div>
                            <div class='modal fade' id='pregunta' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header' style=' background-color: #2C3E50;'>
                                            <h5 class='modal-title' id='exampleModalLabel' style='display:inline'></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <center> <h4><label> <span id="responsePago"></span></label></h4></center>
                                        </div>
                                        <div class='modal-footer'>
                                            <center>
                                                <button onclick="updatearma()" type='button'  class='btn btn-primary' data-dismiss='modal'>ACEPTAR</button>                                
                                                <button type='button' class='btn btn-warning' data-dismiss='modal'>CANCELAR</button>                                
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='modal fade' id='respuesta' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header' style=' background-color: #2C3E50;'>
                                            <h5 class='modal-title' id='exampleModalLabel' style='display:inline'></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <center> <h4><label> <span id="responsePago2"></span></label></h4></center>
                                        </div>
                                        <div class='modal-footer'>
                                            <center>
                                                <button type='button'  class='btn btn-primary' data-dismiss='modal'>ACEPTAR</button>                                                                                                              
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->                                
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <!--Modal usuarios-->            
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

    var $alerta = $("#alert");
    var $msg = $('#msg');
    $alerta.hide();

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
            }
        });

        return false;

    });

    function editPadron(id, mat) {
        var url = "<?php echo BASE_URL; ?>includes/armamento/buscarArma.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                matricula: mat
            },
            success: function (data)
            {
                $("#matricula2").val(data[1]);
                $("#tipo2 option:selected").removeAttr("selected");
                $("#tipo2 option[value=" + data[2] + "]").attr("selected", true);
                $("#calibre2 option:selected").removeAttr("selected");
                $("#calibre2 option[value=" + data[3] + "]").attr("selected", true);
                $("#rfafe2").val(data[4]);
                $("#marca2 option:selected").removeAttr("selected");
                $("#marca2 option[value=" + data[5] + "]").attr("selected", true);
                $("#clasificacion2 option:selected").removeAttr("selected");
                $("#clasificacion2 option[value=" + data[6] + "]").attr("selected", true);
                $("#modelo2 option:selected").removeAttr("selected");
                $("#modelo2 option[value=" + data[7] + "]").attr("selected", true);
                $("#propietario2 option:selected").removeAttr("selected");
                $("#propietario2 option[value=" + data[8] + "]").attr("selected", true);
                $("#situacion2 option:selected").removeAttr("selected");
                $("#situacion2 option[value=" + data[9] + "]").attr("selected", true);
                $("#updateArma").modal("show");
            }
        });
        return false;
    }

    $("#addArmamento").submit(function () {

        load();
        var url = "<?php echo BASE_URL; ?>includes/armamento/add_arma.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#addArmamento").serialize(),
            success: function (data)
            {
                if (data == 1) {
                    $("#addArmamento").trigger("reset");
                    loadsec();
                    $("#ModalLoad").modal('hide');
                    $alerta.removeClass();
                    $alerta
                            .addClass('alert')
                            .addClass('alert-success')
                            .addClass('alert-dismissible');
                    $msg.text('!Registro agregado correctamente!');
                    $alerta.show();
                    setTimeout(function () {
                        $alerta.hide();
                    }, 3000);
                }
                if (data == 2) {
                    $alerta.removeClass();
                    $alerta
                            .addClass('alert')
                            .addClass('alert-warning')
                            .addClass('alert-dismissible');
                    $msg.text('!La matricula ya existe!');
                    $alerta.show();
                    setTimeout(function () {
                        $alerta.hide();
                    }, 3000);
                } else if (data == 3) {
                    $alerta.removeClass();
                    $alerta
                            .addClass('alert')
                            .addClass('alert-danger')
                            .addClass('alert-dismissible');
                    $msg.text('!Ocurrio un error!');
                    $alerta.show();
                    setTimeout(function () {
                        $alerta.hide();
                    }, 3000);
                }

                $("#ModalLoad").modal('hide');
            }
        });

        return false;
    });

    function updateConfirma() {
        $("#responsePago").text("¿Está seguro de guardar los cambios realizados?");
        $("#pregunta").modal("show");
    }

    function updatearma() {

        load();
        var url = "<?php echo BASE_URL; ?>includes/armamento/update_armas.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#updateArmas").serialize(),
            success: function (data)
            {
                $("#updateArma").modal('hide');
                $("#ModalLoad").modal('hide');

                if (data == 1) {
                    $("#responsePago2").text("Registro actualizado correctamente!");
                } else {
                    $("#responsePago2").text("El registro no se ha actualizado!");
                }
                $("#respuesta").modal("show");
            }
        });

        return false;
    }

    function dispElementAsig(matriclua) {
        
        var url = "<?php echo BASE_URL; ?>includes/armamento/resguardo_de_armas.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {
                matricula: matriclua
            },
            success: function (data)
            {                
                $("#elementsData").html(data);
            }
        });

        return false;
    }
</script>



