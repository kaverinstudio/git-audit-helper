$(function () {
    $('.modal-open').click(function () {
        $('#commentForm').text($(this).closest('td').text());
        $('#staticBackdrop').find('input[name=id]').val($(this).data('id'));
        $('#staticBackdrop').find('input[name=row-id]').val($(this).data('row-id'));
    });
})
