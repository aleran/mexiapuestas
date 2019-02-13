<div class="aside">
		<span class="mif-menu mif-3x boton visible-xs"></span>
		<nav>
			<ul id="menu_principal">
				<li><a href="https://www.mexiapuestas.net/bienvenido.php"><span class="mif-home mif-3x principales"></span>INICIO</a></li>
				<?php if ($_SESSION["tipo"]=="root") {	?>
					<li><a href="#" data-toggle="modal" data-target="#modalRegistro"><span class="mif-user-plus mif-3x principales"></span>CREAR USUARIO</a></li>


					<li>
					<label for="drop-1" title="Módulo tickets">
						<span class="mif-dice mif-3x partidos"></span>
						PARTIDOS
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-1">

					<ul>
						<li><a href="https://www.mexiapuestas.net/partidos/list_partidos.php" title="Partidos"><span class=""></span>&nbsp;EVALUAR</a></li>

						<?php if ($_SESSION["usuario"]=='121121') {?>

							<li><a href="https://www.mexiapuestas.net/partidos/selec_deporte.php" title=""><span class=""></span>&nbsp;CREAR</a></li>

							<li><a href="https://www.mexiapuestas.net/partidos/list_partidos_mod.php" title=""><span class=""></span>&nbsp;MODIFICAR</a></li>

						<?php } ?>
					</ul>
					
				</li>

				<?php } ?>

				<li><a href="https://www.mexiapuestas.net/competiciones.php"><span class="mif-coins mif-3x principales"></span>APOSTAR</a></li>
                <?php if ($_SESSION["usuario"]!='999999999') {?>
				<li><a href="https://www.mexiapuestas.net/bienvenido_loteria.php"><span class="mif-coins mif-3x principales"></span>CHANCE</a></li>
                <?php } ?>

				<li>
					<label for="drop-2" title="Módulo tickets">
						<span class="mif-clipboard mif-3x principales"></span>
						TICKETS
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-2">

					<ul>
						<li><a href="https://www.mexiapuestas.net/consultas/tickets_fecha.php" title="Muestra los tickets que están en juego"><span class="mif-checkmark mif-2x"></span>&nbsp;Activos</a></li>

						<li><a href="https://www.mexiapuestas.net/consultas/tickets_fecha_a.php" title="Muestra los tickets que están en juego"><span class="mif-checkmark mif-2x"></span>&nbsp;Anulados</a></li>

						<li><a href="https://www.mexiapuestas.net/consultas/por_pagar.php" title="Tickets que están pendientes por pagar al cliente"><span class="mif-money mif-2x"></span>&nbsp;Por Pagar</a></li>
						<li><a href="https://www.mexiapuestas.net/consultas/tickets_fecha_p.php" title="Tickets perdedores"><span class="mif-event-busy mif-2x"></span>&nbsp;Perdedores</a></li>
						<li><a href="https://www.mexiapuestas.net/consultas/tickets_fecha_g.php" title="Tickets Ganadores"><span class="mif-medal mif-2x"></span>&nbsp;Ganadores</a></li>
						<li><a href="https://www.mexiapuestas.net/consultas/tickets_fecha_gr.php" title="Tickets Ganadores"><span class="mif-medal mif-2x"></span>&nbsp;GN. Por Recargas</a></li>
						<li><a href="" title="Buscar ticket introduciendo el serial" data-toggle="modal" data-target="#modalT"><span class="mif-search mif-2x"></span>&nbsp;Buscar</a></li>
					</ul>
					
				</li>

				<?php if ($_SESSION["tipo"]=="root" || $_SESSION["tipo"]=="admin" ) { ?>
					
					<li><a href="https://www.mexiapuestas.net/saldos.php"  title="Estados Financieros"><span class="mif-dollars mif-3x principales"></span>CUENTAS</a></li>

					<li><a href="https://www.mexiapuestas.net/recargas/buscar_usuario.php" title="Módulo recargas"><span class="mif-loop2 mif-3x principales"></span>RECARGAS</a></li>

					<li><a href="https://www.mexiapuestas.net/cambiar_clave.php" title="Cambio de Clave"><span class="mif-key mif-3x principales"></span>CAMBIAR CLAVE</a></li>
				<?php } ?>

				<!-- <li><a href="" title="Calculadora Parley"><span class="mif-calculator2 mif-3x principales"></span>CALCULADORA</a></li> -->
				<!--<li><a href="" title="Descarga de software"><span class="mif-download mif-3x principales"></span>DESCARGAS</a></li>-->
			</ul>
		</nav>
</div>
<!--MODAL BUSCAR TICKET-->
<div class="modal fade" id="modalT" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalUsuariosLabel">Buscar Ticket por codigo</h4>
                        </div>
                    <div class="modal-body">
                        
                    	<form class="form-horizontal" method="POST" action="consultas/con_codigo.php">
                            <?php 
                                if ($_SESSION["tipo"]=="root") {
                                        echo "Introduzca el codigo completo";
                                }
                                else {
                                    echo "introduzca los numeros despues del guíon";
                                }
                            ?>
                                
                            <div class="form-group">
                                <label for="codigo" class="col-sm-4 control-label">Codigo:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="" required>
                                </div>
                            </div>
                                
                            

                    </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		                <button class="btn btn-success">Buscar</button>
		            </div>
                        </form>
                </div>
            </div>
        </div>


