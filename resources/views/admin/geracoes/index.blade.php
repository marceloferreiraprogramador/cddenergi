@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1><i class="fa fa-file-o"></i> Importar Relatorio Gerações </h1>

<!doctype html>
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
     <!-- Message -->
     @if(Session::has('message'))
        <p >{{ Session::get('message') }}</p>
     @endif

     <!-- Form -->
     <form style="margin-left:50px;display: inline" method='post' action='geracoes/uploadFile' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input style="display: inline;" type='file' name='file' >
       <input style="display: inline;margin-left:10px " type='submit' name='submit' value='Import'>
     </form>
    </div>    </div>

</div>
</div>
@stop

