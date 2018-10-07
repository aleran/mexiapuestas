<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalRegistroLabel">Regístrate</h4>
            </div>
            <div class="modal-body">
                        
                <form class="form-horizontal" name="registro" method="POST" action="crear_usuarios.php">
                    <div class="form-group">
                        <label for="pais" class="col-sm-4 control-label">País:</label>
                        <div class="col-sm-6">
                           	<select  name="pais" id="pais" class="form-control">
                                <?php
                                    $sql_pais="SELECT * FROM paises";
                                    $rs_pais=mysqli_query($mysqli,$sql_pais) or die(mysqli_error());
                                    while ($row_pais=mysqli_fetch_array($rs_pais)) {
                                        echo  '<option value='.$row_pais["id"].'>'.$row_pais["pais"].'</option>';
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                       <div class="col-sm-6">
                           <select  name="agencia" id="agencia" class="form-control">
                           <?php 
                               $sql_agencias="SELECT * FROM agencias";
                               $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                               while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                                   echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                               }

                           ?>
                           </select>
                       </div>
                   </div>

                    <div class="form-group">
                        <label for="cedula" class="col-sm-4 control-label">Cédula:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cedula" id="cedula" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-sm-4 control-label">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-sm-4 control-label">Apellido:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="col-sm-4 control-label">Correo:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo2" class="col-sm-4 control-label">Confirmar Correo</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="correo2" id="correo2" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clave" class="col-sm-4 control-label">Password:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clave2" class="col-sm-4 control-label">Confirmar Password:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="clave2" id="clave2" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-sm-4 control-label">Dirección:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="direccion" id="direccion"  rows="3" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-sm-4 control-label">Teléfono:</label>
                        <div class="col-sm-6">
                            <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="" required>
                        </div>
                    </div>
                            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success">Crear Usuario</button>
            </div>
            </form>
        </div>
    </div>
</div>
