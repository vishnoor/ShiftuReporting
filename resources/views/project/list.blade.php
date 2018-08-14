@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Project List</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        Project Name
                    </th>
                    <th>
                        Client 
                    </th>
                    <th>
                        Start Date
                    </th>
                    <th>
                        End Date
                    </th>
                    <th>
                        Project Lead  
                    </th>
                    <th>
                        Project Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>
                            <a href="{{ URL('/projects/show/'.$project->id) }}">{{ $project->name }}</a>
                        </td>
                        <td>
                            {{ $project->client }}
                        </td>
                        <td>
                            {{ $project->start_date }}
                        </td>
                        <td>
                            {{ $project->end_date }}
                        </td>
                        <td>
                            {{ $project->projectLead->name }}
                        </td>
                        <td>
                            @if ($project->is_active)
                                <span class="label label-warning">Active Project</span>
                            @else
                                <span class="label label-success">Closed Project</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginator -->
        {{ $projects->links() }}

        {{ $projects->hasMorePages() }} 
    </div>
@endsection

