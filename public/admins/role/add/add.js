$(function () {
    $('.checkbox_wrap').on('click', function (){
        $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
    });
    $('.checkall').on('click', function (){
        $(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked'));
    });
    $('.checkall').on('click', function (){
        $(this).parents().find('.checkbox_wrap').prop('checked', $(this).prop('checked'));
    });
})
