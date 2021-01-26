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

					<li class="sidebar-item <?php if($request=='perfil-usuario'){ echo 'active'; }?>" >
						<a class="sidebar-link" href="perfil-usuario">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Perfil</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($request=='config-usuario'){ echo 'active'; }?>">
						<a class="sidebar-link" href="config-usuario">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Configuraciones</span>
            </a>
					</li>
<!--
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Invoice</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a href="#auth" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
            </a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
						</ul>
					</li>
 -->
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
<!--
					<li class="sidebar-item">
						<a data-target="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Form Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic Inputs</a></li>
						</ul>
					</li>
-->
					<li class="sidebar-item <?php if($request=='control-prueba'){ echo 'active'; }?>">
						<a class="sidebar-link" href="control-prueba">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Seguimiento</span>
            </a>
					</li>

					<li class="sidebar-header">
						Personas & PNP
					</li>

					<li class="sidebar-item <?php if($request=='registrar-personas'){ echo 'active'; }?>">
						<a class="sidebar-link" href="registrar-personas">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Personas & PNP</span>
            </a>
					</li>
				 <li class="sidebar-item <?php if($request=='crear-usuarios'){ echo 'active'; }?>">
						<a class="sidebar-link" href="crear-usuarios">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Crear Usuario</span>
            </a>
					</li>
				</ul>


			</div>
		</nav>