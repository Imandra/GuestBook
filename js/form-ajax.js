$(function () {
    $('#guestbook-form').on('submit', function (event) {
        event.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: '/',
            type: form.attr('method'),
            data: formData,
            beforeSend: function () {
                $('#guestbook-btn').attr('disabled', 'disabled');
            },
            success: [
                function (data) {
                    $('#messages').html(data);
                }
            ],
            error: [
                function (xhr) {
                    console.log(xhr);
                }
            ],
            complete: [
                function () {
                    $('#guestbook-btn').prop('disabled', false);
                    $('#guestbook-form').each(function () {
                        this.reset();
                    });
                }
            ]
        });
    });
});