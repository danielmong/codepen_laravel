$(".delete-btn").click(function () {
    console.log("abc");
    
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
            console.log('Request successful:', response);
        },
        error: function (xhr, status, error) {
            console.log('Request failed:', error);
        }
    })
})