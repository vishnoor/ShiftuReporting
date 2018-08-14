@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select your Role') }}</div>
                <form method="POST" action="/setrole" aria-label="{{ __('Login') }}">
                    <div class="card-body">
                        @csrf
                        <select class="form-control" id="my_role" name="my_role">
                            @foreach (Auth::user()->roles as $role )
                                <option value="{{ $role->role_code}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-info" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection