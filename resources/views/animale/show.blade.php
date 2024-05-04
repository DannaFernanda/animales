@extends('layouts.app')

@section('template_title')
    {{ $animale->name ?? "{{ __('Show') Animale" }}
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('diseño/crud.css') }}">

@section('content')


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            
                        </div>
                        <!-- Asegúrate de que jQuery esté incluido antes del siguiente código -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="float-right">
    <button class="btn btn-primary" onclick="mostrarVentanaModal()"> {{ __('Preadopción') }}</button>
</div>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="ventanaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>¡Todo correcto!. Su solicitud esta en espera, por favor acerquece a nuestro centro de atención
                    para finalizar el proceso. :3
                </p>
                <img src="{{ asset('img/qr.png') }}" alt="qr">
                <p>Escanea el siguiente QR si deseas conocer nuestras instalaciones :D
                </p>

            </div>
            <div class="modal-footer">
    <button type="button" class="atras" data-dismiss="modal" onclick="redirigir()">Atras</button>
</div>

<script>
function redirigir() {
    window.location.href = "{{ route('welcome') }}";
}
</script>

        </div>
    </div>
</div>

<script>
function mostrarVentanaModal() {
    $('#ventanaModal').modal('show');
}

function redirigir() {
    window.location.href = "{{ route('animales.index') }}";
}
</script>

                    </div>
                    

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $animale->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Raza:</strong>
                            {{ $animale->raza }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $animale->color }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $animale->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Vacunas:</strong>
                            {{ $animale->vacunas }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $animale->estado }}
                        </div>
                     

                    </div>
                </div>
            </div>
        </div>
        <!-- Agrega este bloque de script en tu archivo blade -->

<script>
    function mostrarVentanaModal() {
        $('#ventanaModal').modal('show');
        // Espera 5 segundos (5000 milisegundos) antes de redirigir a la página welcome
        setTimeout(function() {
            redirigir();
        }, 5000);
    }

    function redirigir() {
        window.location.href = "{{ route('home') }}";
    }
</script>

    </section>
    <a class="btn btn-primary" href="{{ route('animales.index') }}"> {{ __('Atrás') }}</a>

@endsection
