@extends('layouts.app')

@section('template_title')
    Animale
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="diseño/estilos.css">

    

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('animales.index') }}">{{ __('Animales') }}</a>
                                </li>
                              
                            
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <div class="d-flex">
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesion') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Animales') }}
                            </span>
                            
                            <div class="float-right">
                                @can('create', App\Models\Animale::class)
                                    <a href="{{ route('animales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                      {{ __('AGREGAR CACHORRO') }}
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('login') }}"> {{ __('Atras') }}</a>

                                @endcan
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Tipo</th>
                                        <th>Vacunas</th>
                                        <th>Enfermedades</th>
                                        <th>Raza</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animales as $animale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $animale->nombre }}</td>
                                            <td>{{ $animale->imagen }}</td>
                                            <td>{{ $animale->tipo }}</td>
                                            <td>{{ $animale->vacunas }}</td>
                                            <td>{{ $animale->enfermedades }}</td>
                                            <td>{{ $animale->raza }}</td>

                                            <td>
                                                <form action="{{ route('animales.destroy',$animale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('animales.show',$animale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Más información') }}</a>

                                                    @can('edit', $animale)
                                                        <a class="btn btn-sm btn-success" href="{{ route('animales.edit',$animale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @endcan

                                                    @can('delete', $animale)
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $animales->links() !!}
            </div>
        </div>
    </div>

@endsection
