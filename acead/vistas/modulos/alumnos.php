<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Alumnos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Alumnos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

<!-- BOTON AGREGAR ALUMNOS -->
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlumno">

          Agregar Alumno

        </button>

      </div>


      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th style="width:10px">Id</th>
           <th>Primer Nombre</th>
           <th>Segundo Nombre</th>
           <th>Primer Apellido</th>
           <th>Segundo Apellido</th>
           <th>Teléfono</th>
           <th>Fecha Nac</th>
           <th>Cédula</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

       foreach ($alumnos as $key => $value){

         echo ' <tr>
                 <td>'.($key+1).'</td>
                 <td>'.$value["Id_Alumno"].'</td>
                 <td>'.$value["PrimerNombre"].'</td>
                 <td>'.$value["SegundoNombre"].'</td>
                 <td>'.$value["PrimerApellido"].'</td>
                 <td>'.$value["SegundoApellido"].'</td>
                 <td>'.$value["Telefono"].'</td>
                 <td>'.$value["FechaNacimiento"].'</td>
                 <td>'.$value["Cedula"].'</td>     ';


                 echo '  <td>

                    <div class="btn-group">

                    <button class="btn btn-success btnMatriculaAlumno" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalMatriculaAlumno"><i class="fa fa-building"></i></button>

                    <button class="btn btn-warning btnEditarAlumno" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalEditarAlumno"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarAlumno" idAlumno="'.$value["Id_Alumno"].'"><i class="fa fa-times"></i></button>



                    </div>

                  </td>

                </tr>';
        }


        ?>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ALUMNO
======================================-->

<div id="modalAgregarAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre1" id="nuevoNombre1" style="text-transform: uppercase" placeholder="Primer Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombre2" style="text-transform: uppercase" placeholder="Segundo Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido1" style="text-transform: uppercase" placeholder="Primer Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido2" style="text-transform: uppercase" placeholder="Segundo Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Telefono" minlength="8" maxlength="15" pattern="[0-9]{8}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIDAD -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoCedula" placeholder="Numero de Identidad" minlength="8" maxlength="13" pattern="[0-9]{13}">

                  </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-addon"><i class="fa fa-calendar"></i>

                </div>

                <input type="text" class="form-control" name="nuevoFechaNac" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Correo Electronico" required>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" name="nuevoEstCivil">

                  <option value="">Seleccionar Estado Civil</option>

                  <?php

                  $civil = ControladorUsuarios::ctrCargarSelectEstCivil();
                  foreach ($civil as $key => $value) {
                    echo "<option value='".$value['Id_EstadoCivil']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU GENERO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-male"></i></span>

                <select class="form-control input-lg" name="nuevoGenero">

                  <option value="">Seleccionar Genero</option>

                  <?php

                  $genero = ControladorUsuarios::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['Id_Genero']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Alumno</button>

        </div>

        <?php

          $crearAlumno = new ControladorAlumnos();
          $crearAlumno -> ctrCrearAlumno();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>



<?php

include 'matricula1.php';

 ?>


<!--=====================================
MODAL EDITAR ALUMNO
======================================-->

<div id="modalEditarAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID ALUMNO -->

            <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                   <input type="text" class="form-control input-lg" id="editarAlumno" name="editarAlumno" readonly value="">


               </div>

             </div>

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombre1" id="editarNombre1" style="text-transform: uppercase" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarNombre2" id="editarNombre2" style="text-transform: uppercase" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido1" id="editarApellido1" style="text-transform: uppercase" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido2" id="editarApellido2" style="text-transform: uppercase" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                    <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" value="" minlength="8" maxlength="15" pattern="[0-9]{8}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIDAD -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                    <input type="text" class="form-control input-lg" name="editarCedula" id="editarCedula" value="" maxlength="13" pattern="[0-9]{13}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" value="" required>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarEstCivil" name="editarEstCivil">

                  <option value="">Seleccionar Estado Civil</option>

                  <?php

                  $civil = ControladorAlumnos::ctrCargarSelectEstCivil();
                  foreach ($civil as $key => $value) {
                    echo "<option value='".$value['Id_estadoCivil']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU GENERO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarGenero" name="editarGenero">

                  <option value="">Seleccionar Genero</option>

                  <?php

                  $genero = ControladorAlumnos::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['Id_genero']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>



          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Alumno</button>

        </div>

        <?php

          $editarAlumno = new ControladorAlumnos();
          $editarAlumno -> ctrEditarAlumno();

        ?>

      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL MATRICULA ALUMNO
======================================

<div id="modalMatriculaAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog" style="width:1300px;">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================

        <div class="modal-header" style="background:#D81B60; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Matricula Alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================

        <div class="modal-body">

          <div class="box-body">

            <div class="container">

              <!-- ENTRADA PARA EL ALUMNO

               <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                  <input type="text" class="form-control input-lg" id="matriculaAlumno" name="matriculaAlumno" readonly value="">


                </div>

               </div>




              <!-- ENTRADA PARA SELECCIONAR LA MODALIDAD

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                  <select class="form-control input-lg" id="matriculaModalidad" name="matriculaModalidad">

                    <option value="">Seleccionar Modalidad</option>

                    <?php
/*
                    $mod = ControladorMatricula::ctrCargarSelectModalidades();
                    foreach ($mod as $key => $value) {
                      echo "<option value='".$value['Id_Modalidad']."'>".$value['DescripModalidad']."</option>";
                    }
                    ?>

                  </select>

                </div>

              </div>



              <!-- MATRICULA DE CLASES

                <div id="row">
                  <div class="card-deck mb-3 text-center">

                    <div class="card mb-3 box-shadow">

                      <div class="card-header">
                        <h4 class="my-0-font-weight-normal">Matricula</h4>
                      </div>

                      <div class="card-body">

                        <div class="row">
                          <div class="col-lg-4 col-sm-4 mb-4">
                            <select class="form-control" id="adicionar1" size="9"></select>
                          </div>

                          <div class="col-xl-4 col-sm-4 mb-4">
                            <select class="form-control" id="adicionar2" size="9"></select>
                          </div>

                          <div class="col-xl-4 col-sm-4 mb-4">
                            <select class="form-control" id="adicionar3" size="9"></select>
                          </div>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>



            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Matricular Alumno</button>

        </div>

        <?php

          $editarUsuario = new ControladorAlumnos();
          $editarUsuario -> ctrEditarAlumno();
*/
        ?>



      </form>



    </div>

  </div>

</div> -->



<?php

  $borrarAlumno = new ControladorAlumnos();
  $borrarAlumno -> ctrBorrarAlumno();

?>
