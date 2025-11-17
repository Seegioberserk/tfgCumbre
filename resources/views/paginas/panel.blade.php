@extends('layout.app')

@section('content')

    {{-- Mensaje de error --}}
    @if (session('error'))
        <div class="alerta-error">
            <span class="block">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Panel de estadísticas -->
    <div class="row">
        <!-- Usuarios -->
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--green">
                <h2 class="number">1</h2>
                <span class="desc">Usuarios</span>
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
            </div>
        </div>

        <!-- Permisos -->
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number">2</h2>
                <span class="desc">Permisos</span>
                <div class="icon">
                    <i class="zmdi zmdi-lock-outline"></i>
                </div>
            </div>
        </div>

        <!-- Roles -->
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number">3</h2>
                <span class="desc">Roles</span>
                <div class="icon">
                    <i class="zmdi zmdi-assignment-account"></i>
                </div>
            </div>
        </div>

        <!-- Ventas -->
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--red">
                <h2 class="number">5</h2>
                <span class="desc">Ventas</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página (opcional) -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="copyright text-center">
                <p>
                    Copyright © 2025. All rights reserved. Template by 
                    <a href="https://colorlib.com" target="_blank" rel="nofollow">jcenter</a>.
                </p>
            </div>
        </div>
    </div>

@endsection
