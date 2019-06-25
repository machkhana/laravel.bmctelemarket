
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'ka'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'ka'
    });
    $('#datetimepicker3').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'ka'
    });
//////////////////////////////////////////////////////////////////////////
    $('.chosen-select').chosen();
    $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
// დაკლიკების შემთხვევაში გამოჩენა ან დამალვა ოჯახის ფორმის
    $('.family-show').css('display','none');
    $('input[type="radio"]').change(function() {
        if($(this).val() == 'yes'){
            $('.family-show').css('display','');
        }else{
            $('.family-show').css('display','none');
        }
    });
// როდესაც მონიშნულია რომ ყავს ოჯახი ფორმის გამოჩენა
    if( $('input[type="radio"]').prop('checked')=== true)
    {
        $('.family-show').css('display','');
    };
    /////////////////////////////////
    $('#example').DataTable();
    //////////////////////////////////
    $('[data-toggle="tooltip"]').tooltip()
    // add call on client when modal is open add value //
    $('#mymodal-call-add').on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('id');
        $(this).find('input[name=client_id]').val(recipient);
    });
});

function onFirstnameKeypress(e) {
    if(e.keyCode === 13) {
        e.preventDefault();
    }
}