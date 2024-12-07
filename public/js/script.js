$('.modal-open').click(function () {
    $('#staticBackdrop').find('input[name=row-id]').val($(this).data('row-id'));
    $('#staticBackdrop').find('input[name=col-id]').val($(this).data('col-id'));
    // $('#staticBackdrop').find('input[name=audit-id]').val($(this).data('audit-id'));
    $('#staticBackdrop').find('.modal-body').find('textarea').remove();
    $('#staticBackdrop').find('.modal-body').prepend('<textarea class="form-control" name="commentForm" id="commentForm" rows="3"></textarea>');
    $('#commentForm').text($(this).closest('td').text());

    $('#loadFilesModal').find('input[name=row-id]').val($(this).data('row-id'));
    $('#loadFilesModal').find('input[name=col-id]').val($(this).data('col-id'));
    // $('#loadFilesModal').find('input[name=audit-id]').val($(this).data('audit-id'));
});


$(document).on('click', '#submit-form-comment', function (e) {
    e.preventDefault();
    let form = $('#form-comment');
    let url = form.attr('action');
    let rowId = form.find('input[name="row-id"]').val();
    let colId = form.find('input[name="col-id"]').val();
    let area = $('span[data-row-id="' + rowId + '"][data-col-id="' + colId + '"]').closest('td').find('.text-comment');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
        }
    });
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
        success: function (data) {
            if (data.status == true){
                area.text(data.text);
                $('#staticBackdrop').modal('hide');
            }
        },
        error: function (data) {
            console.log(data)
        }
    });
});

$(document).on('click', '#submit-file', function (e) {
    e.preventDefault();
    let form = $('#form-files');
    let url = form.attr('action');
    let formData = new FormData(form[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
        }
    });
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data)
        }
    });
});

$('.rounded-pill').click(function () {
    let documents = JSON.parse(atob($(this).data('documents')));
    console.log(documents)
    documents.forEach((doc) => {
        let img = '<a href="/'+doc+'" data-fancybox="gallery">\n' +
            '  <img src="/'+doc+'" />\n' +
            '</a>'
        $('#galleryModal .modal-body').append(img)
    });
    Fancybox.bind('[data-fancybox="gallery"]', {
        Carousel: {
            infinite: false,
        },
        showClass: "f-fadeIn",
    });
    let galleryModal = new bootstrap.Modal($('#galleryModal'));
    galleryModal.show();
})
