<?php ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Role Información</div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            {{ $role->display_name }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Descripción</label>
                            {{ $role->description }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Permisos</label>
                            @if(!empty($permissions))
                                <div class="col-md-8 control-label">
                                    @foreach($permissions as $permission)
                                        <label class="label label-success" style="float: left; margin-right: 5px">{{ $permission->display_name }}</label>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                   
                                    <a class="btn btn-warning" href="{{ url('admin/roles') }}">
                                        Cancelar
                                    </a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection