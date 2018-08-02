<?php ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administración de roles</div>

                    <div class="panel-body">
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('eliminar'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif


                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($roles as $key => $role)

                                <tr class="list-users">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        
                                           @permission('role-list')
                                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
                                           @endpermission

                                         @permission('role-update')
                                       <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>

                                           @endpermission
                                    

                                        @permission('role-delete')
                                        <form action="{{ url('admin/roles/'.$role->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Eliminar
                                            </button>
                                        </form>

                                             @endpermission

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                      

       @permission('role-create')
 <a href="{{ route('roles.create') }}" class="btn btn-success">Nuevo Rol</a>
@endpermission

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection