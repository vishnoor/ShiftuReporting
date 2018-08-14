@extends('layouts.shevbi')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Vendor List</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        Vendor Name
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Contact Number
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                    <tr>
                        <td>
                            <a href="{{ URL('/admin/vendor/'.$vendor->user_id) }}">{{ $vendor->name }}</a>
                        </td>
                        <td>
                            {{ $vendor->address_line1 }} ,
                            {{ $vendor->address_line2 }} ,
                            {{ $vendor->city }} ,
                            {{ $vendor->state }}
                        </td>
                        <td>
                            {{ $vendor->contact_number }}
                        </td>
                        <td>
                            @if (!$vendor->is_approved)
                                <input type="button" class="btn btn-info" id="btnApprove" data-id="{{ $vendor->user_id }}" value="Approve" />
                            @else
                                <span class="label label-success">Approved</span>
                            @endif

                            @if($vendor->is_approved)
                               @if($vendor->is_blocked)
                                <a class="btn btn-warning" id="btnUnBlock" href="#" data-id="{{ $vendor->user_id }}">Un Block</a>
                               @else
                                <a class="btn btn-danger" id="btnBlock" href="#" data-id="{{ $vendor->user_id }}">Block</a>
                               @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginator -->
        {{ $vendors->links() }}

        {{ $vendors->hasMorePages() }} 

        <form id="frmApprove" action="/admin/vendor/approve" method="POST" style="display: none;">
                @csrf
                <input type="hidden" id="hdnVendorId" name="hdnVendorId" />
        </form>

        <form id="frmBlock" action="/admin/vendor/change_status" method="POST" style="display: none;">
            @csrf
            <input type="hidden" id="hdnVendorId1" name="hdnVendorId1" />
            <input type="hidden" id="hdnActionCode" name="hdnActionCode" />
        </form>
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('js/admin/vendor.js') }}" defer></script>
@stop