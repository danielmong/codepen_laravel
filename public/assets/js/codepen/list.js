$(".delete-btn").click(function () {
    let id = $(this).data('id');

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: `/codepenlist/${id}`,
        method: "DELETE",
        success: function (response) {
            let onOk = () => { window.location.reload(); };
            new AWN().confirm(
                'Are you sure?',
                onOk,
                {
                    labels: {
                        confirm: 'Are you agree to remove this code?'
                    }
                }
            )
            
        },
        error: function (xhr, status, error) {
            new AWN().warning('Server Error.');
        }
    })
})