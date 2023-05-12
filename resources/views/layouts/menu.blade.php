
<li class="nav-item">
    <a href="{{ route('tipoEquipos.index') }}" class="nav-link {{ Request::is('tipoEquipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Equipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('equipos.index') }}" class="nav-link {{ Request::is('equipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Equipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('servicios.index') }}" class="nav-link {{ Request::is('servicios*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Servicios</p>
    </a>
</li>
