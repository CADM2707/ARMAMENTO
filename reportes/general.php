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
</style>   
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/bower_components/select2/dist/css/select2.min.css">   
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">               
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header" style=" background-color: white; border-bottom: 1px solid #B9B9B9;  box-shadow: 1px 1px 5px #999;">
            <h1><span><label class="gray"> <span class="fa fa-files-o"></span></label></span> Reporte - Resguardos generales</h1>            
        </section>        
        <!-- Main content -->
        <section class="content" style=" background-color: white;" >            
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>      
<?php include_once '../footer.html'; ?>
<script>
    $('.select2').select2();

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
</script>



