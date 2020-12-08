<?php 
session_start();
if(isset($_SESSION['usuario'])){
  require_once "scripts.php";
  ?>

  <!DOCTYPE html>
  <html>
  <head>
   <title></title>

   <nav class="navbar navbar-light" style="background-color: #88069D">
    <button class="navbar-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav navbar-light">
        <li class="nav-item active">
          <a href="../procesos/salir.php" > <h1 class="text-white" class="nav-link">Salir</h1><span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

</head>
<body background="fondo3.jpg">
 <br>
 <br>
  <div class="container">
   <div class="row">
     <div class="col-sm-12">
      <div class="card text-center">
        <div class="card-header" style="background-color: blue; color: white; font-family: Times New Roman">
         TABLA GASTOS
       </div>
       <div class="card-body">
         <span class="btn btn-success" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar nuevo<span class="fa fa-plus-circle"
           ></span>
         </span>
         <hr>
         <div id="tablaDatatable"></div>
       </div>
       <div class="card-footer text-white" style="background-color: blue; font-family: Times New Roman">
         By Pingüi
       </div>
     </div>
   </div>
 </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Agrega nuevos gastos</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   <div class="modal-body">
    <form id="frmnuevo">
     <label>Concepto gasto</label>
     <input type="" class="form-control input-sm" id="concepto_gasto" name="concepto_gasto">
     <label>Cantidad gasto</label>
     <input type="" class="form-control input-sm" id="cantidad_gasto" name="cantidad_gasto">
     <label>Fecha</label>
     <input type="" class="form-control input-sm" id="fecha" name="fecha">
   </form>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  <button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Actualizar gastos</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   <div class="modal-body">
    <form id="frmnuevoU">
     <input type="text" hidden="" id="idgastos" name="idgastos">
     <label>Concepto gasto</label>
     <input type="text" class="form-control input-sm" id="concepto_gastoU" name="concepto_gastoU">
     <label>Cantidad gasto</label>
     <input type="text" class="form-control input-sm" id="cantidad_gastoU" name="cantidad_gastoU">
     <label>Fecha</label>
     <input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
   </form>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-warning" id="btnActualizar" >Actualizar</button>
</div>
</div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('#btnAgregarnuevo').click(function()
    {
      datos=$('#frmnuevo').serialize();

      $.ajax(
      {
        type: "POST",
        data:datos,
        url:"procesos/agregar.php",
        success:function(r)
        {
          if (r==1) 
          {
            $('#frmnuevo')[0].reset();
            $('#tablaDatatable').load('tabla.php');
            alertify.success("Agregado con exito");
          }
          else
          {
            alertify.error("Fallo al agregar");
          }
        }
      });
    });

    $('#btnActualizar').click(function()
    {
      datos=$('#frmnuevoU').serialize();

      $.ajax(
      {
        type: "POST",
        data:datos,
        url:"procesos/actualizar.php",
        success:function(r)
        {
          if (r==1) 
          {
            $('#tablaDatatable').load('tabla.php');
            alertify.success("Actualizado con exito");
          }
          else
          {
            alertify.error("Fallo al actualizar");
          }
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#tablaDatatable').load('tabla.php');
  });
</script>

<script type="text/javascript">
  function agregaFrmActualizar(idgastos)
  {
    $.ajax(
    {
      type:"POST",
      data:"idgastos=" + idgastos,
      url: "procesos/obtenDatos.php",
      success:function(r)
      {
        datos=jQuery.parseJSON(r);
        $('#idgastos').val(datos['id_gastos']);
        $('#concepto_gastoU').val(datos['concepto_gasto']);
        $('#cantidad_gastoU').val(datos['cantidad_gasto']);
        $('#fechaU').val(datos['fecha']);
      }    
    });
  }

  function eliminarDatos(idgastos){
    alertify.confirm('Eliminar gasto', '¿Seguro de eliminar este gasto?', function(){ 

      $.ajax({
        type:"POST",
        data:"idgastos=" + idgastos,
        url:"procesos/eliminar.php",
        success:function(r){
          if(r==1){
            $('#tablaDatatable').load('tabla.php');
            alertify.success("Eliminado con exito !");
          }else{
            alertify.error("No se pudo eliminar...");
          }
        }
      });

    }
    , function(){

    });
  }
</script>


<?php  
} else {
  header("location:../index.php");
}
?>