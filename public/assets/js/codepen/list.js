$(".delete-btn").click(function () {
    let id = $(this).data('id');

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
    
    let onOk = () => {
        $.ajax({
            url: `/codepenlist/${id}`,
            method: "DELETE",
            success: function (response) {
                window.location.reload(); 
            },
            error: function (xhr, status, error) {
                new AWN().warning('Server Error.');
            }
        })
    };
    new AWN().confirm(
        'Are you sure?',
        onOk,
        {
            labels: {
                confirm: 'Are you agree to remove this code?'
            }
        }
    )
})

$(".code-item").click(function (e) {
    if (!$(e.target).hasClass('action')) {

        let id = $(this).data("id");

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: `/codepenlist/preview/${id}`,
            type: 'POST',
            success: function (response) {
                let preview = document.querySelector('#preview');
                let clone = preview.cloneNode();
                preview.replaceWith(clone);
                preview = clone;
                
                preview.contentWindow.document.open();
                preview.contentWindow.document.writeln(
                    `${response.content_html}
                    <style>${response.content_css}</style>
                    <script type="module">${response.content_js}<\/script>`
                );
                preview.contentWindow.document.close();
            },
            error: function (xhr, status, error) {
                new AWN().warning('Server Error.');
            }
        });

        
        $(".modal").fadeIn();
    }
})