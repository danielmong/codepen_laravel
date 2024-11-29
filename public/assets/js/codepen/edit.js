inputHandler();

$("#save-btn").click(function () {
    let html = htmlEditor.getValue();
    let css = cssEditor.getValue();
    let js = jsEditor.getValue();
    let desc = $("#desc").val();
    let title = $("#title").val();
    let is_public = $('#is_public').is(':checked');

    let id = $("#codepen_id").val();


    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: `/codepenlist/update/${id}`,  // Your endpoint URL
        type: 'POST',           // Method (GET, POST, etc.)
        data: {
            content_html: html,
            content_css: css,
            content_js: js,
            title: title,
            description: desc,
            status: is_public ? 'public' : 'private'
        },
        success: function (response) {
            console.log('Request successful:', response);
        },
        error: function (xhr, status, error) {
            console.log('Request failed:', error);
        }
    });
});
