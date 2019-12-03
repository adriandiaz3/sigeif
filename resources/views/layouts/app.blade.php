@extends('light-bootstrap-dashboard::layouts.main')

@section('sidebar-menu')
<ul class="nav">
  <li>
    <a class="nav-link" href="{{ route('home') }}">
      <i class="pe-7s-home"></i>
      <p>Home</p>
    </a>
  </li>
  <li>  
    <a class="nav-link" href="/empresas">
      <i class="pe-7s-home"></i>
      <p>Empresas</p>
    </a>
  </li>
  <li> 
    <a class="nav-link" href="/coordenadores">
      <i class="pe-7s-users"></i>
      <p>Coordenadores</p>
    </a>
  </li>
  <li>  
    <a class="nav-link" href="/estagiarios">
      <i class="pe-7s-id"></i>
      <p>Estagiarios</p>
    </a>
  </li>
</ul>
@endsection
