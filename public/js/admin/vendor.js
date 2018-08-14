$('#btnApprove').click(function(e){
    //e.stopPropagation();
    var id = $(this).attr('data-id');
    console.log(id);

    $('#hdnVendorId').val(id);

    $('#frmApprove').submit();
});

$('#btnUnBlock').click(function(e){
    //e.stopPropagation();
    var id = $(this).attr('data-id');
    console.log(id);

    $('#hdnVendorId1').val(id);
    $('#hdnActionCode').val('UB');

    $('#frmBlock').submit();
});

$('#btnBlock').click(function(e){
    //e.stopPropagation();
    var id = $(this).attr('data-id');
    console.log(id);

    $('#hdnVendorId1').val(id);
    $('#hdnActionCode').val('BL');

    $('#frmBlock').submit();
});
