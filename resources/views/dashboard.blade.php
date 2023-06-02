@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de Ventas</h1>
@stop

@section('content')

      <div class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>Usuario</h3>
                  <p>Registro de Usuarios</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-circle"></i>
                </div>
                <a href="{{ route('usuarios.index')}}"
                  class="small-box-footer">Mas info
				  <i class="fas fa-arrow-circle-right"></i></a>
              </div>

            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-lime">
                <div class="inner">
                  <h3>Empleado</h3>
                  <p>Registro Empleado</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a  href="{{ route('empleados.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>Producto</h3>
                  <p>Registro Producto</p>
                </div>
                <div class="icon">
                  <i class="fas fa-cart-arrow-down"></i>
                </div>
                <a href="{{route('productos.index')}}" class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>Almacen</h3>
                  <p>Registro Almacen</p>
                </div>
                <div class="icon">
                  <i class="fas fa-box"></i>
                </div>
                <a href="{{route('almacens.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3>Ventas</h3>
                  <p>Registro de Ventas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-store"></i>
                </div>
                <a href="{{route('ventas.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-cyan">
                <div class="inner">
                  <h3>Proveedor</h3>
                  <p>Registro del Proveedor</p>
                </div>
                <div class="icon">
                  <i class="fas fa-building"></i>
                </div>
                <a href="{{route('proveedors.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-gray">
                <div class="inner">
                  <h3>Clientes</h3>
                  <p>Registro del Cliente</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <a href="{{route('clientes.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>Pedido</h3>
                  <p>Registro del Pedido</p>
                </div>
                <div class="icon">
                  <i class="fas fa-list"></i>
                </div>
                <a href="{{route('pedidos.index')}}"class="small-box-footer">Mas info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <!---->

            @include('manual.manual')







        </div>
    

      </div><!--  --> 
      </div>  
      

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Bienvenidos al dashboard'); </script>
@stop