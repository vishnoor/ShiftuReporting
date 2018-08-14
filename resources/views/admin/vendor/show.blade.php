@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Vendor Information - {{ $vendor->name }}</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="col-lg-12 display-table">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Name </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->name}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Contact Number </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->contact_number}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Address Line 1 </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->address_line1}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Address Line 2 </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->address_line2}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>City</b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->city}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>State </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">{{ $vendor->state}}</div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Approval Status </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">
                @if ($vendor->is_approved)
                    <span class="label label-success">Approved</span>
                @else
                    <span class="label label-warning">Not Approved</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Blocked </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">
                @if ($vendor->is_blocked)
                    <span class="label label-danger">Blocked</span>
                @else
                    <span class="label label-success">Not Blocked</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3"><b>Vendor Type </b></div>
            <div class="col-sm-12 col-md-6 col-lg-9">
               {{ $vendor->user->roles->first()->role_name }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2">
                <a class="btn btn-primary" href="{{ URL('/admin/vendor/edit/'.$vendor->user_id) }}">Edit</a>
            </div>
        </div>
        
    </div>

</div>
@endsection
