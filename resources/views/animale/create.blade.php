
@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Animales
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('diseño/crud.css') }}">

@section('content')
    <section class="content container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                </a>

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Animales</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('animales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('animale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a class="btn btn-primary" href="{{ route('login') }}"> {{ __('Atrás') }}</a>

@endsection
