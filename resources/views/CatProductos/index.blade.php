@extends('layout')
@section('contenido')

Bienvenido

@php
 $i=1;   
@endphp
@if($i==1)
  
    @section('tablas')
hola mundo
@endsection
@else
@section('tablas')
David
@endsection
@endif
@endsection