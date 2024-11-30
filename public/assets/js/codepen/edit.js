inputHandler();

$(".save-btn").click(function () {
    let actionType = $(this).data("type");

    let html = htmlEditor.getValue();
    let css = cssEditor.getValue();
    let js = jsEditor.getValue();
    let desc = $("#desc").val();
    let title = $("#title").val();
    let is_public = $('#is_public').is(':checked');

    let id = $("#codepen_id").val();

    if (!html && !css && !js) {
        new AWN().info('No code has been written...');
        return;
    }

    if (!title) {
        new AWN().info('Please input the title of your code');
        return;
    }


    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    let requestUrl = actionType == "save" ? `/codepenlist/update/${id}` : '/codepenlist/save';

    $.ajax({
        url: requestUrl,  // Your endpoint URL
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
            new AWN().success('Your code has been updated successfully.');
            if (actionType !== "save") {
                location.href = '/codepenlist/edit/' + response.id;
            }
        },
        error: function (xhr, status, error) {
            new AWN().warning('Server Error.');
        }
    });
});
