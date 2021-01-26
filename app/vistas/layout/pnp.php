<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Administrador</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Home
					</li>

					<li class="sidebar-item <?php if($request=='bienvenido'){ echo 'active'; }?>">
						<a class="sidebar-link" href="bienvenido">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-header">
						Control covid
					</li>
					<li class="sidebar-item <?php if($request=='registrar-control' or $request=='mostrar-cuarentena'){ echo 'active'; }?>">
						<a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Registro</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse <?php if($request=='registrar-control' or $request=='mostrar-cuarentena'){ echo 'show'; }?> " data-parent="#sidebar">
							<li class="sidebar-item <?php if($request=='registrar-control'){ echo 'active'; }?>"><a class="sidebar-link" href="registrar-control">Control</a></li>
							<li class="sidebar-item <?php if($request=='mostrar-cuarentena'){ echo 'active'; }?>"><a class="sidebar-link" href="mostrar-cuarentena">Cuarentena</a></li>
						</ul>
					</li>

					<li class="sidebar-item <?php if($request=='mostrar-historial'){ echo 'active'; }?>">
						<a class="sidebar-link" href="mostrar-historial">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Historial</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($request=='control-prueba'){ echo 'active'; }?>">
						<a class="sidebar-link" href="control-prueba">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Seguimiento</span>
            </a>
					</li>


				</ul>


			</div>
		</nav>