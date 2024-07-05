@extends('layouts.backend_2024.master')
@section('title')
    Roles
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            {{-- <div class="pull-left">
                <h6>Role Management</h6>
            </div>
            <div class="pull-right">
                @can('roles-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div> --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Role Management</h4>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        <button onclick="window.location.href='{{ route('roles.create') }}'" class="btn btn-primary">Buat
                            Roles</button>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    {{-- @dd(auth()->user()->can('role-detail')) --}}
                                    @can('role-detail')
                                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                    @endcan
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
