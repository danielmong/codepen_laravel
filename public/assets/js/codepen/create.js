$("#save-btn").click(function () {
    let html = htmlEditor.getValue();
    let css = cssEditor.getValue();
    let js = jsEditor.getValue();

    let desc = "this is sample code for testing";
    let title = "test title";

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/codepenlist/save',  // Your endpoint URL
        type: 'POST',           // Method (GET, POST, etc.)
        data: {
            content_html: html,
            content_css: css,
            content_js: js,
            title: title,
            description: desc
        },
        success: function (response) {
            console.log('Request successful:', response);
        },
        error: function (xhr, status, error) {
            console.log('Request failed:', error);
        }
    });
});
