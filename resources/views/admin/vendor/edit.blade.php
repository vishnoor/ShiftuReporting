@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Vendor - {{ $vendor->name }}</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="col-lg-12">
        <form action="/admin/vendor/save" method="POST">
            @csrf
            <input type="hidden" name="user_id"  value="{{$vendor->user_id}}" />
            <div class="form-group col-sm-12 col-lg-6">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" disabled value="{{ $vendor->user->email }}">
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="contact_number" required>Contact Number</label>
                <input type="number" class="form-control" id="contact_number" 
                    name="contact_number" value="{{ $vendor->contact_number }}" maxlength="10" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="address_line1" required>Address Line 1</label>
                <input type="text" class="form-control" id="address_line1" 
                    name="address_line1" value="{{ $vendor->address_line1 }}" maxlength="45" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="address_line2" required>Address Line 2</label>
                <input type="text" class="form-control" id="address_line2" 
                    name="address_line2" value="{{ $vendor->address_line2 }}" maxlength="45" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="city" required>City</label>
                <input type="text" class="form-control" id="city" 
                    name="city" value="{{ $vendor->city }}" maxlength="45" required>
            </div>

            <div class="form-group col-sm-12 col-lg-6">
                <label for="state" required>State</label>
                <input type="text" class="form-control" id="state" 
                    name="state" value="{{ $vendor->state }}" maxlength="45" required>
            </div>
            <div class="form-group col-sm-12 col-lg-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
           
        </form>
        
    </div>

</div>
@endsection
