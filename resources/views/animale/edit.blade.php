@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Animale
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('diseño/crud.css') }}">

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Animale</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('animales.update', $animale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
