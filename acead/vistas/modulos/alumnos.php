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

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

          Agregar Alumnos

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
                  <td>'.$value["Cedula"].'</td> ';

            echo '    <td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarAlumno" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalEditarAlumno"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarAlumno" idAlumno="'.$value["Id_Alumno"].'" alumno="'.$value["PrimerNombre"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR ALUMNOS
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

                <input type="text" class="form-control input-lg" name="nuevoNombre1" id="nuevoNombre1" placeholder="Primer Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

          <div class="form-group">

            <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre2" placeholder="Segundo Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

              </div>

          </div>



            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido1" placeholder="Primer Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido2" placeholder="Segundo Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">

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

                    <input type="text" class="form-control input-lg" name="nuevoCedula" placeholder="Numero de Identidad" maxlength="13" pattern="[0-9]{13}">

                  </div>

            </div>

        <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Correo Electronico" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

          <!--   <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" minlength="5" placeholder="Ingresar usuario" id="nuevoUsuario" pattern="|^[a-zA-Z]*$|" style="text-transform: uppercase" required>

              </div>

            </div> -->

            <!-- ENTRADA PARA LA CONTRASEÑA -->

          <!--      <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" id="nuevoPassword" placeholder="Ingresar contraseña" maxlength="30" minlength="5" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{5,8}${30}" required>

              </div>

            </div> -->

            <!-- ENTRADA PARA SELECCIONAR SU DEPARTAMENTO -->

          <!--    <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" name="nuevoDpto">

                  <option value="">Seleccionar Departmento</option>



              /*    $dpto = ControladorUsuarios::ctrCargarSelectDepartamento();
                  foreach ($dpto as $key => $value) {
                    echo "<option value='".$value['Id_Departamentos']."'>".$value['DescripDepart']."</option>";
                  }*/


                </select>

              </div>

            </div>   -->

            <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" name="nuevoEstCivil">

                  <option value="">Seleccionar Estado Civil</option>

                  <?php

                  $civil = Controladoralumnos::ctrCargarSelectEstCivil();
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

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" name="nuevoGenero">

                  <option value="">Seleccionar Genero</option>

                  <?php

                  $genero = ControladorAlumnos::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['id_genero']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ROL -->

            <!--  <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" name="nuevoRol">

                  <option value="">Seleccionar Rol de Usuario</option>



                /*  $role = ControladorUsuarios::ctrCargarSelectRol();
                  foreach ($role as $key => $value) {
                    echo "<option value='".$value['Id_Rol']."'>".$value['Rol']."</option>";
                  }
                  	echo $_POST['nuevoRol'];*/


                </select>

              </div>

            </div> -->



            <!-- ENTRADA PARA SUBIR FOTO


             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>   -->


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

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <!--   <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>


                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="">


              </div>

            </div> -->

            <!-- ENTRADA PARA LA CONTRASEÑA -->

              <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div> -->

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <!--  <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div> -->


            <!-- ENTRADA PARA SUBIR FOTO

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">


            </div> -->


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
            $editarAlumno -> ctrEditaralumno();

          ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarAlumno = new ControladorAlumnos();
  $borrarAlumno -> ctrBorrarAlumno();

?>