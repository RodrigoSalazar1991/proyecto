<?php ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Información de Usuario</div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            {{ $user->name }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">E-mail</label>
                            {{ $user->email }}
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Roles</label>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $role)
                                    <label class="label label-success">{{ $role->display_name }}</label>
                                @endforeach
                            @endif
                        </div>
                           <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                   
                                    <a class="btn btn-warning" href="{{ url('admin/users') }}">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection