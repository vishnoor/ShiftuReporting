@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Project Information - {{ $project->name }}</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="col-lg-12 display-table">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Client Name </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $project->client}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Start Date </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $project->start_date}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>End Date </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $project->end_date}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Project Lead</b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $project->projectLead->name }} </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Project BDM</b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $project->projectBDM->name }}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Status </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">
                @if ($project->is_active)
                    <span class="label label-warning">Active Project</span>
                @else
                    <span class="label label-success">Closed Project</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2">
                <a class="btn btn-primary" href="{{ URL('/projects/edit/'.$project->id) }}">Edit</a>
            </div>
        </div>
        
    </div>

</div>
@endsection
