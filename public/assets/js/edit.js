// Initialize Ace Editor for HTML, CSS, and JavaScript
// HTML Editor
const htmlEditor = ace.edit("html-editor");
htmlEditor.session.setMode("ace/mode/html");

// CSS Editor
const cssEditor = ace.edit("css-editor");
cssEditor.session.setMode("ace/mode/css");

// JavaScript Editor
const jsEditor = ace.edit("js-editor");
jsEditor.session.setMode("ace/mode/javascript");

let result = document.querySelector('#result');

// Store debounce timer
let debounce;

/**
 * Update the iframe
 */
function updateIframe() {

    // Create new iframe
    let clone = result.cloneNode();
    result.replaceWith(clone);
    result = clone;

    // Render
    result.contentWindow.document.open();
    result.contentWindow.document.writeln(
        `${htmlEditor.getValue()}
                <style>${cssEditor.getValue()}</style>
                <script type="module">${jsEditor.getValue()}<\/script>`
    );
    result.contentWindow.document.close();

}

function inputHandler() {
    clearTimeout(debounce);
    debounce = setTimeout(updateIframe, 500);
}

// Listen for input events
htmlEditor.on("change", function (delta) {
    inputHandler();
});

cssEditor.on("change", function (delta) {
    inputHandler();
});

jsEditor.on("change", function (delta) {
    inputHandler();
});


$("#save-btn").click(function () {
    let html = htmlEditor.getValue();
    let css = cssEditor.getValue();
    let js = jsEditor.getValue();

    let desc = "this is sample code for testing";
    let title = "test title";
    let id = $("#codepen_id").val();

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/codepenlist/update/' + id,  // Your endpoint URL
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
})