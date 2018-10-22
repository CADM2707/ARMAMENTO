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
    .hidentd{
        display: none;
    }
    .inptRI{
        background-color: #FFF2BD !important;
    }
    .titles1{
        color: #073768 !important;
        font-weight: 500;
    }
</style>   
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/bower_components/select2/dist/css/select2.min.css">   
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">               
<div class="content-wrapper">
    <div class="container-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style=" background-color: white; border-bottom: 1px solid #B9B9B9;  box-shadow: 1px 1px 5px #999;">
            <h1><span><label class="gray"> <span class="fa fa-plus-square "></span></label></span> Asignar resguardos</h1>            
        </section>        
        <!-- Main content -->
        <section class="content" style=" background-color: white; padding: 20px" >
            <div class="row text-center">
                <div class="nav-tabs-custom" style=" border: solid 1px #B0B3B6 !important;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a class="text1" href="#tab_1" data-toggle="tab"><i class="fa fa-files-o"></i> &nbsp;RESGUARDOS GENERALES</a></li>                        
                        <li ><a class="text1" href="#tab_3" data-toggle="tab"><i class="fa fa-file-text-o"></i> &nbsp;RESGUARDOS INDIVIDUALES</a></li>              
                        <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active text-left" id="tab_1">   
                            <center><H4><label> <span class="fa fa-plus" style=" color: #114D87"></span> ASIGNAR ARMAMENTO</label></H4></center>
                            <hr>                                    
                            <form method="POST" id="searchPadron" name="searchPadron">    
                                <input type="hidden" value="addResg" name="resguardoG" id="resguardoG">                                                                                                                                                                                                                                                                                                                     
                                <div class="row text-center">
                                    <div class="col-lg-2 col-xs-12 text-center">  
                                        <label>MATRICULA</label>
                                        <input type="text" class="form form-control" name="matricula1" id="matricula1">
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
                                    <div class="col-lg-1 col-xs-12 text-center">  
                                        <label>CALIBRE</label>
                                        <select  class="form form-control select2" name="calibre1" id="calibre1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                        </select>
                                    </div>                                                                                                                                                                                                          
                                    <div class="col-lg-1 col-xs-12 text-center">  
                                        <label>SITUACIÓN</label>
                                        <select  class="form form-control select2" name="situacion1" id="situacion1" style="width: 100%;">
                                            <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                        </select>
                                    </div>                                        
                                </div>
                                <br>
                                <div class="row text-center">
                                    <button class="btn btn-primary" name="guardar" value="1" type="submit"><i class="fa fa-search"></i> BUSCAR</button>
                                </div>
                                <hr>
                            </form>                            
                            <div id="contentAsign">                                
                                <div id="listado1" class="col-lg-5 col-xs-12 text-center"></div>
                                <div id="listado2" class="col-lg-2 col-xs-12 text-center"></div>
                            </div>
                            <form id="frmAddRsg">
                                <div class="row" id="controlAsign" style=" display: none;">
                                    <div class="col-lg-2 col-xs-0 text-center"></div>
                                    <div class="col-lg-2 col-xs-6 text-center">                                        
                                        <div id="sectorRG">
                                            <label>SECTOR</label>
                                            <select onchange="loadDestto()" id="addSec" name="addSec" class="form-control select2" data-placeholder="Selecciona un sector" style="width: 100%;">                                        
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-xs-6 text-center">
                                        <label>DESTACAMENTO</label>
                                        <select  id="addSdestto" name="addSdestto" class="form-control select2" data-placeholder="Selecciona un destacamento" style="width: 100%;">                                        
                                        </select> 
                                    </div>
                                    <div class="col-lg-4 col-xs-12 text-center">
                                        <label>USUARIO A ASIGNAR</label>
                                        <select required="true"  id="addUsrSelect" name="addUsrSelect" class="form-control select2" data-placeholder="Selecciona un usuario" style="width: 100%;">                                        
                                        </select> 
                                    </div>
                                </div>                               
                                <div id="listado3" class="col-lg-5 col-xs-12 text-center"></div>
                                <input name="filasSend" id="filasSend" type="hidden">
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
                        <!--RESGUARDOS INDIVIDUALES-->
                        <div class="tab-pane text-left" id="tab_3">                            
                            <center><H4><label> <span class="fa fa-plus" style=" color: #114D87"></span> ASIGNAR ARMAMENTO</label></H4></center>
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
                                    <div id="busquedaRI" style=" display: none;">
                                        <div class="row text-center">
                                            <div class="col-lg-4 col-xs-0 text-center"> </div> 
                                            <div class="col-lg-4 col-xs-12 text-center">  
                                                <h4 class="titles1"><u>BUSCAR ARMAS</u></h4>                                      
                                            </div> 
                                        </div>
                                        <form id="formBusquedaIR">
                                            <input type="hidden" value="addResg" name="resguardoG" id="resguardoIR"> 
                                            <input type="hidden" value="addResgIR" name="resguardoIR" id="resguardoIR1">                                       
                                            <div  class="row text-center">
                                                <div class="col-lg-2 col-xs-12 text-center">  
                                                    <label>MATRICULA</label>
                                                    <input type="text" class="form form-control" name="matricula1" id="matricula2">
                                                </div> 
                                                <div class="col-lg-2 col-xs-12 text-center">  
                                                    <label>CLASIFICACIÓN</label>
                                                    <select  class="form form-control select2" name="clasificacion1" id="clasificacion2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                    </select>
                                                </div>                                                                                                                                                                        
                                                <div class="col-lg-2 col-xs-12 text-center">  
                                                    <label>TIPO</label>
                                                    <select  class="form form-control select2" name="tipo1" id="tipo2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                                    </select>
                                                </div>                                                                                                                                                                        
                                                <div class="col-lg-2 col-xs-12 text-center">  
                                                    <label>MARCA</label>
                                                    <select  class="form form-control select2" name="marca1" id="marca2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                    </select>
                                                </div>                                                                                                                                                                        
                                                <div class="col-lg-2 col-xs-12 text-center">  
                                                    <label>MODELO</label>
                                                    <select  class="form form-control select2" name="modelo1" id="modelo2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                    </select>
                                                </div>                                                                                                      
                                                <div class="col-lg-1 col-xs-12 text-center">  
                                                    <label>CALIBRE</label>
                                                    <select  class="form form-control select2" name="calibre1" id="calibre2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                    
                                                    </select>
                                                </div>                                                                                                                                                                                                          
                                                <div class="col-lg-1 col-xs-12 text-center">  
                                                    <label>SITUACIÓN</label>
                                                    <select  class="form form-control select2" name="situacion1" id="situacion2" style="width: 100%;">
                                                        <option selected="selected" value="" disabled="">Opciones</option>                                                   
                                                    </select>
                                                </div>  
                                            </div>
                                            <div  class="row text-center">
                                                <center>
                                                    <a onclick="loadArmasIR()" class="btn btn-primary"><span class="fa fa-search"></span>&nbsp; Buscar</a>
                                                </center>
                                            </div>
                                        </form>

                                    </div>
                                    <br>
                                </div>                            
                                <div class="row text-center">
                                    <div id="hideIR">
                                        <div id="tbPadronArmas" class="col-lg-5 col-xs-12 text-center"></div>
                                        <div id="listado2IR" class="col-lg-2 col-xs-12 text-center"></div>
                                    </div>
                                    <form id="saveResIR">   
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="id_elemE" id="id_elemES">
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="placaUsrE" id="placaUsrES">
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="sectorRI" id="sectorRIS">                                                                                                                         
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="desttoRI" id="desttoRIS">                                                                                                                         
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="nombreRI" id="nombreRIS">                                                                                                                         
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="idUsuarioRI" id="idUsuarioRIS">                                                                                                                         
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="portacionRI" id="portacionRIS">                                                                                                                                                                                               
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="RsocialRI" id="RsocialRIS">                                                                                                                        
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="domicilioRI" id="domicilioRIS">                                                                                                                            
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="coloniaRI" id="coloniaRIS">                                                                                                                            
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="entidadRI" id="entidadRIS">                                                                                                                            
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="localidadRI" id="localidadRIS">                                        
                                            <input readonly="true" type="hidden" class="form form-control inptRI" name="cpRI" id="cpRIS">                                        
                                        <div id="listado3IR" class="col-lg-5 col-xs-12 text-center"></div>                                
                                    </form>
                                </div>                            
                            <div id='alertaRespuesta' style=" display: none;">
                                <center>
                                    <div class="alert alert-warning" role="alert">
                                        <h4>  No se encontraron resultados, verifique que los datos sean correctos!</h4>
                                    </div>
                                </center>
                            </div> 

                        </div>
                        <!-- /.tab-pane -->                                
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
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
                <center> <div id="responsePago2"></div></center>
            </div>
            <div class='modal-footer'>
                <center>
                    <button id="resp1" type='button'  class='btn btn-primary' data-dismiss='modal'>ACEPTAR</button>                                                                                                              
                    <button id="resp2" style=" display: none" onclick="clearAllForm()" type='button'  class='btn btn-primary' data-dismiss='modal'>ACEPTAR</button>                                                                                                              
                </center>
            </div>
        </div>
    </div>
</div>
<?php include_once '../footer.html'; ?>
<script>
    $('.select2').select2();
    var $alerta = $("#alert");
    var $msg = $('#msg');
    $alerta.hide();
    $(document).ready(function () {
        loadsec();
        $("#listado3").hide();
        $("#usrAddSelect").hide();
        $("#listado2").hide();
        $("#listado2IR").hide(1000);
        $("#listado3IR").hide(1000);
        loadTb();
        loadTbIR();
    });

    function loadTb() {
        $("#listado3").html("<center><H4><label> <span class='fa fa-plus' style=' color: #114D87'></span> LISTADO ASIGNAR RESGUARDOS</label></H4></center>\n\
        \n\<a id='select2' class='btn btn-primary' onclick='selectAll(2)'><span class='fa fa-sort-amount-asc'></span>&nbsp;Marcar todos</a>\n\
        \n\<a id='unselect2' style='display:none' class='btn btn-warning' onclick='UnselecAll(2)'><span class='fa fa-sort-amount-desc'></span>&nbsp;Desmarcar todos</a>\n\
        \n\<button type='submit' id='unselect3' style='display:none' class='btn btn-success' ><span class='fa fa-plus-square'></span>&nbsp;Asignar</button>\n\
        \n\<hr><table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch2'>\n\
            <thead>\n\
                <th>MARCA</th>\n\
                <th>STATUS</th>\n\
                \n\ <th>MODELO</th>\n\
                \n\ <th>MATRICULA</th>\n\
                \n\ <th>TIPO</th>\n\
                \n\ <th>CALIBRE</th>\n\
                \n\ <th>SELECCIONAR</th>\n\
                \n\<th class='hidentd'>CARGADORES</th>\n\
            <th class='hidentd'>MUNICIONES</th>\n\
            \n\</thead>\n\
            \n\<tbody></tbody></table>\n\
    ");
        $("#listado2").html("<br><br><br><br><div id='contList' ><br>\n\
        <a class='btn btn-success' onclick='bgColorTr()'>Agregar&nbsp;&nbsp;<span class='fa  fa-arrow-right'></span></a><br><br>\n\
        <a class='btn btn-warning' onclick='bgColorTr2()'><span class='fa fa-arrow-left'></span>&nbsp;&nbsp;Quitar&nbsp;</a><br><br></div>\n\
        <a id='continue' class='btn btn-primary' style='display:none' onclick='saveResGen()'><span class='fa  fa-play'></span>&nbsp;&nbsp;Continuar</a><br><br>");

        $("#listado2IR").html("<br><br><br><br><div id='contList' ><br>\n\
        <a class='btn btn-success' onclick='bgColorTr()'>Agregar&nbsp;&nbsp;<span class='fa  fa-arrow-right'></span></a><br><br>\n\
        <a class='btn btn-warning' onclick='bgColorTr2()'><span class='fa fa-arrow-left'></span>&nbsp;&nbsp;Quitar&nbsp;</a><br><br></div>\n\
        <a id='continueIR' class='btn btn-primary' style='display:none' onclick='saveResIR()'><span class='fa  fa-play'></span>&nbsp;&nbsp;Continuar</a><br><br>");
    }
    function loadsec() {

        var url = "<?php echo BASE_URL; ?>includes/catalogos/selectores.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                loadSelectores: 1,
                dos: 1,
//                usrSec:$("#addSec").val()
            },
            success: function (data)
            {
                $("#clasificacion1").html("<option selected='selected' value='' >Opciones</option>" + data[0]);
                $("#tipo1").html("<option selected='selected' value='' >Opciones</option>" + data[1]);
                $("#marca1").html("<option selected='selected' value='' >Opciones</option>" + data[2]);
                $("#modelo1").html("<option selected='selected' value='' >Opciones</option>" + data[3]);
                $("#calibre1").html("<option selected='selected' value='' >Opciones</option>" + data[4]);
                $("#situacion1").html("<option selected='selected' value='' >Opciones</option>" + data[5]);
                $("#addUsrSelect").html("<option selected='selected' value='' >Opciones</option>" + data[6]);
                $("#addSec").html("<option selected='selected' value='' >Opciones</option>" + data[8]);
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
                $("#listado3").show();
                $("#usrAddSelect").show();
                $("#listado2").show();
                $("#listado1").html(data);
//                $("#listado2").css("border","2px solid #0D3F70")
//                $("#listado2").css("border-radius","4px");
                $("#ModalLoad").modal('hide');
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                $("#contentAsign").show(1000);
                $("#listado3").removeClass("col-lg-12 col-xs-12 text-center")
                        .addClass("col-lg-5 col-xs-12 text-center");
                $("#controlAsign").hide(1000);
//                    loadTb();
                $("#filasSend").val($("#filas").val());
                $(".hidentd").hide(1000);
            }
        });
$("#ModalLoad").modal('hide');
        return false;

    });


    function bgColorTr() {
        $('#listado1 .checkAdd:checked').each(
                function () {
                    var tr = $(this).parents("tr").appendTo("#padronSearch2 tbody");
                }
        );
        $("#select1").show();
        $("#unselect1").hide();
        var nFilas = $("#padronSearch2 tr").length - 1;
        if (nFilas > 0) {
            $("#continue").show();
        }
    }

    function bgColorTr2() {
        $('#listado3 .checkAdd:checked').each(
                function () {
                    var tr = $(this).parents("tr").appendTo("#padronSearch tbody");
                }
        );
        $("#select2").show();
        $("#unselect2").hide();

        var nFilas = $("#padronSearch2 tr").length - 1;
        if (nFilas == 0) {
            $("#continue").hide();
            console.log(nFilas);
        }
    }

    function selectAll(id) {
        var id2 = 0;
        if (id == 2) {
            id2 = 3;
        } else {
            id2 = id;
        }
        $("#listado" + id2 + " input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
        $("#select" + id).toggle();
        $("#unselect" + id).toggle();
    }
    function UnselecAll(id) {
        var id2 = 0;
        if (id == 2) {
            id2 = 3;
        } else {
            id2 = id;
        }
        $("#listado" + id2 + " input[type=checkbox]").prop('checked', false); //solo los del objeto #diasHabilitados
        $("#select" + id).toggle();
        $("#unselect" + id).toggle();
    }

    function saveResGen() {
        $("#contentAsign").hide(1000);
        $("#listado3").stop(true, false).removeClass("col-lg-5 col-xs-12 text-center")
                .addClass("col-lg-12 col-xs-12 text-center", {duration: 1000});
        $("#controlAsign").show(1000);
        $(".hidentd").show(1000);
        $("#unselect3").toggle();
    }

    $("#frmAddRsg").submit(function () {
        var url = "<?php echo BASE_URL; ?>includes/resguardos/agregar_resguardo.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#frmAddRsg").serialize(),
            success: function (data)
            {
                if (data == 1) {
                    $("#responsePago2").html("<div class='alert alert-success' role='alert'><h4 style='display:inline'>Resguardo asignado correctamente!</h4></div>");
                    $("#controlAsign").hide(1000);
                    $("#listado3").hide(1000);
                } else {
                    $("#responsePago2").html("<div class='alert alert-danger' role='alert'><h4 style='display:inline'>El resguardo no se ha asignado!</h4></div>");
                }
                $("#respuesta").modal("show");
            }
        });
        return false;
    });

    function loadDestto() {
        var url = "<?php echo BASE_URL; ?>includes/catalogos/selectDestto.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: {SEC: $("#addSec").val()},
            success: function (data)
            {
                $("#addSdestto").html(data);
            }
        });
        return false;
    }

//    RESGUARDOS INDIVIDUALES
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
    
                    nextDispPadArma()
                } else {
                    $("#alertaRespuesta").show();
                    $("#placaUsrE").val('');
                    $("#id_elemE").val('');

                    setTimeout(function () {
                        $("#alertaRespuesta").hide()
                    }, 4000);
                }
            }
        });
        return false;


    }
//    DESPLEGAR PADRON DE ARMAS

    function nextDispPadArma() {
        $("#busquedaRI").show(1000);
        var url = "<?php echo BASE_URL; ?>includes/catalogos/selectores.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                loadSelectores: 1,
                dos: 1,
                usrSec: $("#addSec").val()
            },
            success: function (data)
            {
                $("#clasificacion2").html("<option selected='selected' value='' >Opciones</option>" + data[0]);
                $("#tipo2").html("<option selected='selected' value='' >Opciones</option>" + data[1]);
                $("#marca2").html("<option selected='selected' value='' >Opciones</option>" + data[2]);
                $("#modelo2").html("<option selected='selected' value='' >Opciones</option>" + data[3]);
                $("#calibre2").html("<option selected='selected' value='' >Opciones</option>" + data[4]);
                $("#situacion2").html("<option selected='selected' value='' >Opciones</option>" + data[5]);
            }
        });

        return false;
    }

    function loadArmasIR() {
        $("#idUsr").val($("#id_elemE").val());        
        load();
        var url = "<?php echo BASE_URL; ?>includes/armamento/padron_armamento.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#formBusquedaIR").serialize(),
            success: function (data)
            {
                $("#tbPadronArmas").html(data);
                $("#ModalLoad").modal('hide');
                $("#listado3IR").show();
                $("#listado2IR").show();                                   
            }
        });
        $("#ModalLoad").modal('hide');
        return false;
    }

    function loadTbIR() {
        $("#listado3IR").html("<center><H4><label> <span class='fa fa-plus' style=' color: #114D87'></span> LISTADO ASIGNAR RESGUARDOS</label></H4></center>\n\
        \n\<a id='select2IR' class='btn btn-primary' onclick='selectAllIR(2)'><span class='fa fa-sort-amount-asc'></span>&nbsp;Marcar todos</a>\n\
        \n\<a id='unselect2IR' style='display:none' class='btn btn-warning' onclick='UnselecAllIR(2)'><span class='fa fa-sort-amount-desc'></span>&nbsp;Desmarcar todos</a>\n\
        \n\<button id='unselect3IR' style='display:none' class='btn btn-success' ><span class='fa fa-plus-square'></span>&nbsp;Asignar</button>\n\
\n\<div id='adicionalIR' style=' display: none;' ><br>\n\
                                            <div  class='row text-center'>\n\
                                                <div class='col-lg-1 col-xs-0 text-center'></div>\n\
                                                <div class='col-lg-2 col-xs-12 text-center'>  \n\
                                                    <label>CHALECO</label>\n\
                                                    <input required='true' value='S/N' class='form form-control' type='text' name='chaleco' id='chaleco'>\n\
                                                </div>\n\
                                                <div class='col-lg-2 col-xs-12 text-center'>  \n\
                                                    <label>ANTIMOTÍN</label>\n\
                                                    <input required='true' value='S/N' placeholder='' class='form form-control' type='text' name='antimotin' id='antimotin'>\n\
                                                </div>\n\
                                                <div class='col-lg-2 col-xs-12 text-center'>  \n\
                                                    <label>CANDADO</label>\n\
                                                    <input required='true' value='S/N' placeholder='' class='form form-control' type='text' name='candado' id='candado'>\n\
                                                </div>\n\
                                                <div class='col-lg-2 col-xs-12 text-center'>  \n\
                                                    <label>ID V°B°</label>\n\
                                                    <input required='true' value='' placeholder='id del elementi que da el visto bueno' class='form form-control' type='number' name='VOBO' id='VOBO'>\n\
                                                </div>\n\
                                                <div class='col-lg-2 col-xs-12 text-center'>  \n\
                                                    <label>ID AUTORIZA</label>\n\
                                                    <input required='true' value='' placeholder='id del elementi que autoriza' class='form form-control' type='number' name='idautoriza' id='idautoriza'>\n\
                                                    <input class='form form-control' type='hidden' name='nofilas' id='nofilas'>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
        \n\<hr><table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch2IR'>\n\
            <thead>\n\
                <th>MARCA</th>\n\
                <th>STATUS</th>\n\
                \n\ <th>MODELO</th>\n\
                \n\ <th>MATRICULA</th>\n\
                \n\ <th>TIPO</th>\n\
                \n\ <th>CALIBRE</th>\n\
                \n\ <th>SELECCIONAR</th>\n\
                \n\<th class='hidentd'>CARGADORES</th>\n\
            <th class='hidentd'>MUNICIONES</th>\n\
            <th class='hidentd'>ID ARMAMENTO</th>\n\
            \n\</thead>\n\
            \n\<tbody></tbody></table>\n\
    ");
        $("#listado2IR").html("<br><br><br><br><div id='contListIR' ><br>\n\
        <a class='btn btn-success' onclick='bgColorTrIR()'>Agregar&nbsp;&nbsp;<span class='fa  fa-arrow-right'></span></a><br><br>\n\
        <a class='btn btn-warning' onclick='bgColorTr2IR()'><span class='fa fa-arrow-left'></span>&nbsp;&nbsp;Quitar&nbsp;</a><br><br></div>\n\
        <a id='continueIR' class='btn btn-primary' style='display:none' onclick='saveResGenIR()'><span class='fa  fa-play'></span>&nbsp;&nbsp;Continuar</a><br><br>");
    }

    function bgColorTrIR() {
        $('#tbPadronArmas .checkAdd:checked').each(
                function () {
                    var tr = $(this).parents("tr").appendTo("#padronSearch2IR tbody");
                }
        );
        $("#select1IR").show();
        $("#unselect1IR").hide();
        var nFilas = $("#padronSearch2IR tr").length - 1;
        if (nFilas > 0) {
            $("#continueIR").show();
            $("#nofilas").val(nFilas);
            $("#cont2").val(nFilas);
        }
    }

    function bgColorTr2IR() {
        $('#listado3IR .checkAdd:checked').each(
                function () {
                    var tr = $(this).parents("tr").appendTo("#padronSearchIR tbody");
                }
        );
        $("#select2").show();
        $("#unselect2").hide();

        var nFilas = $("#padronSearch2IR tr").length - 1;
        if (nFilas == 0) {
            $("#continueIR").hide();
            console.log(nFilas);
        }else{
            $("#nofilas").val(nFilas);
            $("#cont2").val(nFilas);
        }
    }

    function selectAllIR(id) {
        var id2 = 0;
        if (id == 2) {
            id2 = "listado" + 3 + "IR";
        } else {
            id2 = "tbPadronArmas";
        }
        $("#" + id2 + " input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
        $("#select" + id + "IR").toggle();
        $("#unselect" + id + "IR").toggle();
    }

    function UnselecAllIR(id) {
        var id2 = 0;
        if (id == 2) {
            id2 = "listado" + 3 + "IR";
        } else {
            id2 = "tbPadronArmas";
        }
        $("#" + id2 + " input[type=checkbox]").prop('checked', false); //solo los del objeto #diasHabilitados
        $("#select" + id + "IR").toggle();
        $("#unselect" + id + "IR").toggle();
    }

    function saveResGenIR() {
        $("#adicionalIR").show();
        $("#hideIR").hide(1000);
        $("#listado3IR").stop(true, false).removeClass("col-lg-5 col-xs-12 text-center")
                .addClass("col-lg-12 col-xs-12 text-center", {duration: 1000});
        $(".hidentd").show(1000);
        $("#unselect3IR").toggle();
        
    }
    
    
    $("#saveResIR").submit(function (){        
        
        load();
        var url = "<?php echo BASE_URL; ?>includes/armamento/add_resguardo_Individual.php";
        $.ajax({
            type: "POST",
            url: url,
            dataType: "html",
            data: $("#saveResIR").serialize(),
            success: function (data)
            {
                if (data == 1) {
                    $("#responsePago2").html("<div class='alert alert-success' role='alert'><h4 style='display:inline'>Resguardo asignado correctamente!</h4></div>");
                    $("#controlAsign").hide(1000);
                    $("#listado3").hide(1000);
                    $("#resp2").toggle();
                    $("#resp1").toggle();
                } else {
                    $("#responsePago2").html("<div class='alert alert-danger' role='alert'><h4 style='display:inline'>El resguardo no se ha asignado!</h4></div>");
                }
                 $("#respuesta").modal('show');
                 $("#ModalLoad").modal('hide');
            }
        });        
        return false;
    });
    
    function clearAllForm(){
         
        $("#id_elemE").val();
    }
</script>



<!--contentAsign-->