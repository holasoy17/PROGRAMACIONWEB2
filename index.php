<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<!--
   <script src="jquery.min.js"></script>
<script src="script2.js"></script>
 -->
 <style type="text/css">
   
   th{
   text-align: left;
   }
   #limpiar{
    background: #e43e3f;
    border-radius: 10px 10px 10px;
    box-shadow: 0px 0px 40px #00FA9A, 0px 0px 80px #fff;
    opacity: 0.3;
    color: #fff;
   }
   #limpiar:hover{
    opacity: 1;
    transition: 1s;
    background: #e43e3f;
    color: #fff;
    border-radius: 50px 50px 50px;
    box-shadow: 0px 0px 40px #005A9A, 0px 0px 80px #fff;

   }
 </style>
    <script src="jquery.js"></script>

   
   <script src="js/procesojs/interaccionAsignatura.js"></script>



  <title>CRUD PRACTICA WEB 2</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Menu Crud</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-circle"></i>
            <span class="nav-link-text">REGISTRO</span>
          </a>
        </li>

      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">SF
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>

          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>HOLA SOY CRISTHIAN </strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small"> </div>
            </a>
           
            
           </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Alerts:</h6>
            <div class="dropdown-divider"></div>
           
          
          </div>
        </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input onclick="obtenerConsulta()" class="form-control" type="text" placeholder="buscar" id="buscar">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button" onclick="obtenerConsulta();">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal2">
            <i class="fa fa-fw fa-sign-out"></i>Inicio</a>
        </li>

      </ul>
    </div>
  </nav>
  <div class="content-wrapper" ">
    <div class="container-fluid ">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb"  style="background: #00FA9A;color: #fff;" >
        <li class="breadcrumb-item">
        
        </li>
        <li class="breadcrumb-item active"  style="color: #fff;">Asignatura/Nuevo</li>
      </ol>
      <!-- este es el formulario-->
    <div class="card  mx-auto mt-7">
      <div class="card-body">

        <form id="formDatos" method="post" >
          <div class="form-group">

              <div class="col-md-12">
                <input id="ida"  class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Codigo"  readonly>
              </div><br>

             <div class="col-md-12">
                <input id="nombre"  class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Asignatura" required>
              </div><br>

               <div class="col-md-12">
                <input id="codigo"  class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Codigo" required>
              </div><br>

               <div class="col-md-12">
                <input id="credito"  class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Creditos" required>
              </div>
             
                <dir class="row panel " >

                    <div class="col-md-10  "  >
                      <select id="select1"  class="form-control "  aria-describedby="nameHelp" required value="0" >
 
                      </select> 
                    </div>
                    <div class="col-md-2">
                     <a class="nav-link" data-toggle="modal" data-target="#exampleModal2"><i class='fa fa-table' ></i>
                       </a>
                    </div>
                </dir> 
            
           
          </div>
          <input type="button"  name="bt1" value="Guardar" onclick="probando();" class="btn btn-block btn-primary"/><br>
         <input id="limpiar" class="btn btn-secondary" type="reset" value="limpiar"  />
         
        </form>
        
      </div>
    </div><br>
     
      

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <input id="nuevo" onclick="cargarAsignatura();" type="button" value="CARGAR DATOS"  class="btn btn-success"/> 
        </div>
        <div class="card-body">
          <div class="table-responsive"><center>
            <table class="table table-bordered  table-responsive"  width="100%" cellspacing="0" >
              <thead style="background: #008080;color: #fff;">
                <tr ><center>
                  <th style="text-align: center;">Codigo</th>
                  <th style="text-align: center;">Nombre</th>
                  <th style="text-align: center;">Creditos</th>
                  <th style="text-align: center;">Carrera</th>
                  <th colspan="2">Acciones</th>
                  </center>
                </tr>
              </thead>
              
              <tbody id="tablaDatos" style="text-align: center;">
               
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Cazz-Soft © Cazz-Pro 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insertar carrera ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div> <center>
          <div class="modal-body text-align"><form>
             <input  id="idca"  class="form-control" disabled /><br>
            <input  id="des"  class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Nombre de carrera" required/><br>

             <input class="btn btn-primary btn-block" type="submit" value="Guardar" onclick="validarcarrera()" / >
            <br>
              <table class="table table-bordered  mx-auto table-responsive"   cellspacing="0" >
               <thead style="background: #f62;color: #fff;">
                <tr >
                  <th style="text-align: center;"> Idcarrera  </th>
                  <th style="text-align: center;">  Descripcion   </th>
                  <th colspan="2">    Acciones</th>
                  
                </tr>
              </thead>
              
              <tbody id="tablaDatos2" style="text-align: center;">
               
              </tbody>
            </table>  
          </div>
          <div class="modal-footer">
          <button type='button' class='btn btn-info'><i class='fa fa-circle' onclick="obtenerCarrera()"></i></button></a>

          </form>
          </div>
        </div>
      </div>
    </div>


  




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript
<script src="vendor/chart.js/Chart.min.js"></script>
    -->
    
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages  <script src="js/sb-admin-charts.min.js"></script>

    -->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  
       <script >
          $(function(){
             cargarCombo();
          })
                    </script>
                      
  </div>
</body>

</html>
