@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add Project</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="col-lg-12">
        <form action="/project/save" method="POST">
            @csrf
            <input type="hidden" name="user_id"  value="{{$project->id}}" />
            <div class="form-group col-sm-12 col-lg-6">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" maxlength="200" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="client" required>Client Name</label>
                <input type="number" class="form-control" id="client" 
                    name="client" value="{{ $project->client }}" maxlength="200" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="start_date" required>Start Date</label>
                <input type="date" class="form-control" id="start_date" 
                    name="start_date" value="{{ $project->start_date }}" maxlength="10" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="end_date" required>End Date</label>
                <input type="date" class="form-control" id="end_date" 
                    name="end_date" value="{{ $project->end_date }}" maxlength="10" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="city" required>Lead</label>
                <input type="text" class="form-control" id="city" 
                    name="city" value="{{ $project->city }}" maxlength="45" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="state" required>State</label>
                <input type="text" class="form-control" id="state" 
                    name="state" value="{{ $project->state }}" maxlength="45" required>
            </div>
            <div class="form-group col-sm-12 col-lg-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
           
        </form>
        
    </div>

</div>
@endsection
