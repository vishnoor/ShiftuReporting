@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Employee List</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        Employee Name
                    </th>
                    <th>
                        Email / Emp No#
                    </th>
                    <th>
                       Role(s)
                    </th>
                    <th>
                        Joining Date
                    </th>
                    <th>
                        Last Date
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{ URL('/employees/show/'.$user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>
                            {{ $user->email }} <br/>
                            {{$user->employee ? $user->employee->emp_code : ""}}
                        </td>
                        <td>
                            <ul>
                           @foreach($user->roles as $role)
                                <li>{{$role->role_name}}</li>
                           @endforeach
                            </ul>
                        </td>
                        <td>
                            {{$user->employee ? $user->employee->joining_date->format('d/m/Y') : ""}}
                        </td>
                        <td>
                            {{$user->employee ? $user->employee->leaving_date ? $user->employee->leaving_date->format('d/m/Y') : "" : ""}}
                        </td>
                        <td>
                            @if ($user->employee !== null)
                                @if ($user->employee->status)
                                    <span class="label label-warning">Active Employee</span>
                                @else
                                    <span class="label label-success">Ex Employee</span>
                                @endif
                            @else
                                <span class="label label-error">No Record</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginator -->
        {{ $users->links() }}
    </div>
@endsection

