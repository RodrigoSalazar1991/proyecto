<?php ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administración de usuarios</div>

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $key => $user)

                                <tr class="list-users">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $role)
                                                <label class="label label-success">{{ $role->display_name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>



                                           @permission('role-list')
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
                                           @endpermission

                                       

                                           @permission('role-list')
                                   <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                           @endpermission

                                       

                                      
                                          @permission('role-list')
                                        <form action="{{ url('admin/users/'.$user->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Eliminar
                                            </button>
                                        </form>
                                           @endpermission
                                           
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('users.create') }}" class="btn btn-success">Nuevo Usuario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection