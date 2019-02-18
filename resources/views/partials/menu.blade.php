{{--Inicio de menu Sala--}}
<li class="nav-item has-treeview {{ request()->is(["sala/*","sala"]) ? 'menu-open' : ''}}">
	<a href="#" class="nav-link {{ request()->is(["sala/*","sala"]) ? 'active' : ''}}">
		<i class="nav-icon fa fa-house-damage"></i>
		<p>
			Sala
			<i class="right fa fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{route('sala.index')}}" class="nav-link {{ request()->is('sala') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p> Listado</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{route('sala.create')}}" class="nav-link {{ request()->is('sala/create') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p> Registro</p>
			</a>
		</li>
	</ul>
</li>
{{--Fin de menu Sala--}}
{{--Inicio de menu Sesion--}}
<li class="nav-item has-treeview {{ request()->is(["sesion/*","sesion"]) ? 'menu-open' : ''}}">
	<a href="#" class="nav-link {{ request()->is(["sesion/*","sesion"]) ? 'active' : ''}}">
		<i class="nav-icon fa fa-calendar"></i>
		<p>
			Sesion
			<i class="right fa fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{route('sesion.index')}}" class="nav-link {{ request()->is('sala') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p> Listado</p>
			</a>
		</li>
	</ul>
</li>
{{--Fin de menu Sala--}}
<li class="nav-item has-treeview {{ request()->is(["exposicion/*","exposicion"]) ? 'menu-open' : ''}}">
	<a href="#" class="nav-link {{ request()->is(["exposicion/*","exposicion"]) ? 'active' : ''}}">
		<i class="nav-icon fa fa-headset"></i>
		<p>
			Exposicion
			<i class="right fa fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{route('exposicion.index')}}" class="nav-link {{ request()->is('exposicion') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p> Listado</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{route('exposicion.create')}}" class="nav-link {{ request()->is('exposicion/create') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p> Registro</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview {{ request()->is(["usuario/*","usuario"]) ? 'menu-open' : ''}}">
	<a class="nav-link {{ request()->is(["usuario/*","usuario"]) ? 'active' : ''}}">
		<i class="nav-icon fa fa-users"></i>
		<p>
			Usuarios
			<i class="fa fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{route('usuario.index')}}" class="nav-link {{ request()->is('usuario') ? 'active' : ''}}">
				<i class="fa fa-circle-o nav-icon"></i>
				<p>Listado</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="pages/tables/data.html" class="nav-link">
				<i class="fa fa-circle-o nav-icon"></i>
				<p>Registro</p>
			</a>
		</li>
	</ul>
</li>
