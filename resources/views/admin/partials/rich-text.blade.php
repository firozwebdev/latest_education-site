<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    const initTinyMCE = () => {
        if (typeof tinymce === 'undefined') {
            return;
        }

        if (tinymce.editors?.length) {
            tinymce.remove();
        }

        tinymce.init({
            selector: 'textarea.wysiwyg',
            menubar: false,
            plugins: 'lists link table code image autoresize wordcount',
            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table image | wordcount | removeformat | code',
            height: 320,
            convert_urls: false,
            content_style: 'body { font-family: "Source Sans 3", sans-serif; font-size: 14px; }',
            base_url: "{{ asset('vendor/tinymce') }}",
            suffix: '.min',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    };

    const setupEditors = () => {
        window.requestAnimationFrame(() => {
            setTimeout(initTinyMCE, 0);
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupEditors);
    } else {
        setupEditors();
    }
</script>