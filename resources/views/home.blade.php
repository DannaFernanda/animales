@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mensaje de confirmación') }}</div>

                <div class="card-body">
                    @if (session('estado'))
                        <div class="alert alert-success" role="alert">
                            {{ session('estado') }}
                        </div>
                    @endif

                    {{ __('Usted se ha registrado exitosamente!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
