@extends('layout.layout')

@php
    $topToBottom = 'true';
    $header = 'false';
@endphp

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize toastr options
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "fontSize": "16px",
                "toastClass": "toastr-large"
            };

            // Add custom CSS for larger toastr messages
            $("<style>")
                .prop("type", "text/css")
                .html(`
                .toast-message {
                    font-size: 16px !important;
                    font-weight: 500 !important;
                }
                .toastr-large {
                    width: 350px !important;
                }
            `)
                .appendTo("head");

            $('#newsletter-form').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').html('');

                // Show loading state
                var submitBtn = $('#newsletter-submit');
                var originalBtnText = submitBtn.find('.btn-text').text();
                submitBtn.find('.btn-text').text('Subscribing...');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('newsletter.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        // Reset button state
                        submitBtn.find('.btn-text').text(originalBtnText);
                        submitBtn.prop('disabled', false);

                        if (response.success) {
                            // Show success message with larger text
                            toastr.success(response.message, null, {
                                "timeOut": "7000",
                                "extendedTimeOut": "2000"
                            });

                            // Reset form
                            $('#newsletter-form')[0].reset();
                        } else {
                            // Show error message
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        // Reset button state
                        submitBtn.find('.btn-text').text(originalBtnText);
                        submitBtn.prop('disabled', false);

                        if (xhr.status === 422) {
                            var response = xhr.responseJSON;
                            if (response && response.errors) {
                                // Display validation errors
                                var errorMessages = [];
                                $.each(response.errors, function(key, value) {
                                    $('[name="' + key + '"]').siblings('.text-danger')
                                        .html(value[0]);
                                    errorMessages.push(value[0]);
                                });

                                // Show specific error message for email uniqueness if present
                                if (response.errors['email'] && response.errors['email'][0]
                                    .includes('already been taken')) {
                                    toastr.error(
                                        'This email address is already subscribed to our newsletter.'
                                    );
                                } else {
                                    toastr.error('Please check the form for errors: ' +
                                        errorMessages[0]);
                                }
                            } else {
                                toastr.error('Validation failed. Please check your inputs.');
                            }
                        } else {
                            toastr.error('An error occurred. Please try again later.');
                        }
                    }
                });
            });
        });
    </script>
    <style>
        /*
            ! tailwindcss v3.4.3 | MIT License | https://tailwindcss.com
            */
        /*
            1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
            2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
            */

        *,
        ::before,
        ::after {
            box-sizing: border-box;
            /* 1 */
            border-width: 0;
            /* 2 */
            border-style: solid;
            /* 2 */
            border-color: #E5E7EB;
            /* 2 */
        }

        ::before,
        ::after {
            --tw-content: '';
        }

        /*
            1. Use a consistent sensible line-height in all browsers.
            2. Prevent adjustments of font size after orientation changes in iOS.
            3. Use a more readable tab size.
            4. Use the user's configured `sans` font-family by default.
            5. Use the user's configured `sans` font-feature-settings by default.
            6. Use the user's configured `sans` font-variation-settings by default.
            7. Disable tap highlights on iOS
            */

        html,
        :host {
            line-height: 1.5;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
            -moz-tab-size: 4;
            /* 3 */
            tab-size: 4;
            /* 3 */
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            /* 4 */
            font-feature-settings: normal;
            /* 5 */
            font-variation-settings: normal;
            /* 6 */
            -webkit-tap-highlight-color: transparent;
            /* 7 */
        }

        /*
            1. Remove the margin in all browsers.
            2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
            */

        body {
            margin: 0;
            /* 1 */
            line-height: inherit;
            /* 2 */
        }

        /*
            1. Add the correct height in Firefox.
            2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
            3. Ensure horizontal rules are visible by default.
            */

        hr {
            height: 0;
            /* 1 */
            color: inherit;
            /* 2 */
            border-top-width: 1px;
            /* 3 */
        }

        /*
            Add the correct text decoration in Chrome, Edge, and Safari.
            */

        abbr:where([title]) {
            text-decoration: underline dotted;
        }

        /*
            Remove the default font size and weight for headings.
            */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        /*
            Reset links to optimize for opt-in styling instead of opt-out.
            */

        a {
            color: inherit;
            text-decoration: inherit;
        }

        /*
            Add the correct font weight in Edge and Safari.
            */

        b,
        strong {
            font-weight: bolder;
        }

        /*
            1. Use the user's configured `mono` font-family by default.
            2. Use the user's configured `mono` font-feature-settings by default.
            3. Use the user's configured `mono` font-variation-settings by default.
            4. Correct the odd `em` font sizing in all browsers.
            */

        code,
        kbd,
        samp,
        pre {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            /* 1 */
            font-feature-settings: normal;
            /* 2 */
            font-variation-settings: normal;
            /* 3 */
            font-size: 1em;
            /* 4 */
        }

        /*
            Add the correct font size in all browsers.
            */

        small {
            font-size: 80%;
        }

        /*
            Prevent `sub` and `sup` elements from affecting the line height in all browsers.
            */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /*
            1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
            2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
            3. Remove gaps between table borders by default.
            */

        table {
            text-indent: 0;
            /* 1 */
            border-color: inherit;
            /* 2 */
            border-collapse: collapse;
            /* 3 */
        }

        /*
            1. Change the font styles in all browsers.
            2. Remove the margin in Firefox and Safari.
            3. Remove default padding in all browsers.
            */

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            /* 1 */
            font-feature-settings: inherit;
            /* 1 */
            font-variation-settings: inherit;
            /* 1 */
            font-size: 100%;
            /* 1 */
            font-weight: inherit;
            /* 1 */
            line-height: inherit;
            /* 1 */
            letter-spacing: inherit;
            /* 1 */
            color: inherit;
            /* 1 */
            margin: 0;
            /* 2 */
            padding: 0;
            /* 3 */
        }

        /*
            Remove the inheritance of text transform in Edge and Firefox.
            */

        button,
        select {
            text-transform: none;
        }

        /*
            1. Correct the inability to style clickable types in iOS and Safari.
            2. Remove default button styles.
            */

        button,
        input:where([type='button']),
        input:where([type='reset']),
        input:where([type='submit']) {
            -webkit-appearance: button;
            /* 1 */
            background-color: transparent;
            /* 2 */
            background-image: none;
            /* 2 */
        }

        /*
            Use the modern Firefox focus style for all focusable elements.
            */

        :-moz-focusring {
            outline: auto;
        }

        /*
            Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
            */

        :-moz-ui-invalid {
            box-shadow: none;
        }

        /*
            Add the correct vertical alignment in Chrome and Firefox.
            */

        progress {
            vertical-align: baseline;
        }

        /*
            Correct the cursor style of increment and decrement buttons in Safari.
            */

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto;
        }

        /*
            1. Correct the odd appearance in Chrome and Safari.
            2. Correct the outline style in Safari.
            */

        [type='search'] {
            -webkit-appearance: textfield;
            /* 1 */
            outline-offset: -2px;
            /* 2 */
        }

        /*
            Remove the inner padding in Chrome and Safari on macOS.
            */

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /*
            1. Correct the inability to style clickable types in iOS and Safari.
            2. Change font properties to `inherit` in Safari.
            */

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            /* 1 */
            font: inherit;
            /* 2 */
        }

        /*
            Add the correct display in Chrome and Safari.
            */

        summary {
            display: list-item;
        }

        /*
            Removes the default spacing and border for appropriate elements.
            */

        blockquote,
        dl,
        dd,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        figure,
        p,
        pre {
            margin: 0;
        }

        fieldset {
            margin: 0;
            padding: 0;
        }

        legend {
            padding: 0;
        }

        ol,
        ul,
        menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /*
            Reset default styling for dialogs.
            */
        dialog {
            padding: 0;
        }

        /*
            Prevent resizing textareas horizontally by default.
            */

        textarea {
            resize: vertical;
        }

        /*
            1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
            2. Set the default placeholder color to the user's configured gray 400 color.
            */

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            /* 1 */
            color: #9CA3AF;
            /* 2 */
        }

        /*
            Set the default cursor for buttons.
            */

        button,
        [role="button"] {
            cursor: pointer;
        }

        /*
            Make sure disabled buttons don't get the pointer cursor.
            */
        :disabled {
            cursor: default;
        }

        /*
            1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
            2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
               This can trigger a poorly considered lint error in some tools but is included by design.
            */

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            /* 1 */
            vertical-align: middle;
            /* 2 */
        }

        /*
            Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
            */

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        /* Make elements with the HTML hidden attribute stay hidden by default */
        [hidden] {
            display: none;
        }

        [data-popper-arrow],
        [data-popper-arrow]:before {
            position: absolute;
            width: 8px;
            height: 8px;
            background: inherit;
        }

        [data-popper-arrow] {
            visibility: hidden;
        }

        [data-popper-arrow]:before {
            content: "";
            visibility: visible;
            transform: rotate(45deg);
        }

        [data-popper-arrow]:after {
            content: "";
            visibility: visible;
            transform: rotate(45deg);
            position: absolute;
            width: 9px;
            height: 9px;
            background: inherit;
        }

        [role="tooltip"]>[data-popper-arrow]:before {
            border-style: solid;
            border-color: #e5e7eb;
        }

        .dark [role="tooltip"]>[data-popper-arrow]:before {
            border-style: solid;
            border-color: #4b5563;
        }

        [role="tooltip"]>[data-popper-arrow]:after {
            border-style: solid;
            border-color: #e5e7eb;
        }

        .dark [role="tooltip"]>[data-popper-arrow]:after {
            border-style: solid;
            border-color: #4b5563;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top']>[data-popper-arrow]:before {
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top']>[data-popper-arrow]:after {
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right']>[data-popper-arrow]:before {
            border-bottom-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right']>[data-popper-arrow]:after {
            border-bottom-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom']>[data-popper-arrow]:before {
            border-top-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom']>[data-popper-arrow]:after {
            border-top-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left']>[data-popper-arrow]:before {
            border-top-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left']>[data-popper-arrow]:after {
            border-top-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top']>[data-popper-arrow] {
            bottom: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom']>[data-popper-arrow] {
            top: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left']>[data-popper-arrow] {
            right: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right']>[data-popper-arrow] {
            left: -5px;
        }

        [type='text'],
        [type='email'],
        [type='url'],
        [type='password'],
        [type='number'],
        [type='date'],
        [type='datetime-local'],
        [type='month'],
        [type='search'],
        [type='tel'],
        [type='time'],
        [type='week'],
        [multiple],
        textarea,
        select {
            appearance: none;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            border-radius: 0px;
            padding-top: 0.5rem;
            padding-right: 0.75rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000;
        }

        [type='text']:focus,
        [type='email']:focus,
        [type='url']:focus,
        [type='password']:focus,
        [type='number']:focus,
        [type='date']:focus,
        [type='datetime-local']:focus,
        [type='month']:focus,
        [type='search']:focus,
        [type='tel']:focus,
        [type='time']:focus,
        [type='week']:focus,
        [multiple]:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #2563eb;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: #2563eb;
        }

        input::placeholder,
        textarea::placeholder {
            color: #6B7280;
            opacity: 1;
        }

        ::-webkit-datetime-edit-fields-wrapper {
            padding: 0;
        }

        ::-webkit-date-and-time-value {
            min-height: 1.5em;
        }

        select:not([size]) {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 10 6'%3e %3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 4 4 4-4'/%3e %3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 0.75em 0.75em;
            padding-right: 2.5rem;
            print-color-adjust: exact;
        }

        :is([dir=rtl]) select:not([size]) {
            background-position: left 0.75rem center;
            padding-right: 0.75rem;
            padding-left: 0;
        }

        [multiple] {
            background-image: initial;
            background-position: initial;
            background-repeat: unset;
            background-size: initial;
            padding-right: 0.75rem;
            print-color-adjust: unset;
        }

        [type='checkbox'],
        [type='radio'] {
            appearance: none;
            padding: 0;
            print-color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            user-select: none;
            flex-shrink: 0;
            height: 1rem;
            width: 1rem;
            color: #2563eb;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            --tw-shadow: 0 0 #0000;
        }

        [type='checkbox'] {
            border-radius: 0px;
        }

        [type='radio'] {
            border-radius: 100%;
        }

        [type='checkbox']:focus,
        [type='radio']:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-ring-offset-width: 2px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #2563eb;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
        }

        [type='checkbox']:checked,
        [type='radio']:checked,
        .dark [type='checkbox']:checked,
        .dark [type='radio']:checked {
            border-color: transparent;
            background-color: currentColor;
            background-size: 0.55em 0.55em;
            background-position: center;
            background-repeat: no-repeat;
        }

        [type='checkbox']:checked {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 12'%3e %3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M1 5.917 5.724 10.5 15 1.5'/%3e %3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 0.55em 0.55em;
            print-color-adjust: exact;
        }

        [type='radio']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            background-size: 1em 1em;
        }

        .dark [type='radio']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            background-size: 1em 1em;
        }

        [type='checkbox']:indeterminate {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 12'%3e %3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M0.5 6h14'/%3e %3c/svg%3e");
            background-color: currentColor;
            border-color: transparent;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 0.55em 0.55em;
            print-color-adjust: exact;
        }

        [type='checkbox']:indeterminate:hover,
        [type='checkbox']:indeterminate:focus {
            border-color: transparent;
            background-color: currentColor;
        }

        [type='file'] {
            background: unset;
            border-color: inherit;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-size: unset;
            line-height: inherit;
        }

        [type='file']:focus {
            outline: 1px auto inherit;
        }

        input[type=file]::file-selector-button {
            color: white;
            background: #1F2937;
            border: 0;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
            padding-left: 2rem;
            padding-right: 1rem;
            margin-inline-start: -1rem;
            margin-inline-end: 1rem;
        }

        input[type=file]::file-selector-button:hover {
            background: #374151;
        }

        :is([dir=rtl]) input[type=file]::file-selector-button {
            padding-right: 2rem;
            padding-left: 1rem;
        }

        .dark input[type=file]::file-selector-button {
            color: white;
            background: #4B5563;
        }

        .dark input[type=file]::file-selector-button:hover {
            background: #6B7280;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 1.25rem;
            width: 1.25rem;
            background: #2563eb;
            border-radius: 9999px;
            border: 0;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        input[type="range"]:disabled::-webkit-slider-thumb {
            background: #9CA3AF;
        }

        .dark input[type="range"]:disabled::-webkit-slider-thumb {
            background: #6B7280;
        }

        input[type="range"]:focus::-webkit-slider-thumb {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            --tw-ring-opacity: 1px;
            --tw-ring-color: rgb(164 202 254 / var(--tw-ring-opacity));
        }

        input[type="range"]::-moz-range-thumb {
            height: 1.25rem;
            width: 1.25rem;
            background: #2563eb;
            border-radius: 9999px;
            border: 0;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        input[type="range"]:disabled::-moz-range-thumb {
            background: #9CA3AF;
        }

        .dark input[type="range"]:disabled::-moz-range-thumb {
            background: #6B7280;
        }

        input[type="range"]::-moz-range-progress {
            background: #3b82f6;
        }

        input[type="range"]::-ms-fill-lower {
            background: #3b82f6;
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style: ;
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
            --tw-contain-size: ;
            --tw-contain-layout: ;
            --tw-contain-paint: ;
            --tw-contain-style: ;
        }

        .container {
            width: 100%;
        }

        @media (min-width: 640px) {

            .container {
                max-width: 640px;
            }
        }

        @media (min-width: 768px) {

            .container {
                max-width: 768px;
            }
        }

        @media (min-width: 1024px) {

            .container {
                max-width: 1024px;
            }
        }

        @media (min-width: 1280px) {

            .container {
                max-width: 1280px;
            }
        }

        @media (min-width: 1536px) {

            .container {
                max-width: 1536px;
            }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .visible {
            visibility: visible;
        }

        .collapse {
            visibility: collapse;
        }

        .fixed {
            position: fixed;
        }

        .absolute {
            position: absolute;
        }

        .relative {
            position: relative;
        }

        .sticky {
            position: sticky;
        }

        .-inset-px {
            inset: -1px;
        }

        .inset-0 {
            inset: 0px;
        }

        .inset-x-0 {
            left: 0px;
            right: 0px;
        }

        .inset-y-0 {
            top: 0px;
            bottom: 0px;
        }

        .-bottom-2 {
            bottom: -0.5rem;
        }

        .-bottom-4 {
            bottom: -1rem;
        }

        .-left-44 {
            left: -11rem;
        }

        .-left-\[2\.75rem\] {
            left: -2.75rem;
        }

        .-right-3 {
            right: -0.75rem;
        }

        .-right-32 {
            right: -8rem;
        }

        .-right-4 {
            right: -1rem;
        }

        .-top-20 {
            top: -5rem;
        }

        .-top-3 {
            top: -0.75rem;
        }

        .-top-6 {
            top: -1.5rem;
        }

        .bottom-0 {
            bottom: 0px;
        }

        .bottom-10 {
            bottom: 2.5rem;
        }

        .bottom-2 {
            bottom: 0.5rem;
        }

        .bottom-2\.5 {
            bottom: 0.625rem;
        }

        .bottom-20 {
            bottom: 5rem;
        }

        .bottom-24 {
            bottom: 6rem;
        }

        .bottom-3 {
            bottom: 0.75rem;
        }

        .bottom-4 {
            bottom: 1rem;
        }

        .bottom-52 {
            bottom: 13rem;
        }

        .bottom-\[1rem\] {
            bottom: 1rem;
        }

        .bottom-\[6rem\] {
            bottom: 6rem;
        }

        .end-2 {
            inset-inline-end: 0.5rem;
        }

        .end-2\.5 {
            inset-inline-end: 0.625rem;
        }

        .left-0 {
            left: 0px;
        }

        .left-1\/2 {
            left: 50%;
        }

        .left-1\/3 {
            left: 33.333333%;
        }

        .left-10 {
            left: 2.5rem;
        }

        .left-3 {
            left: 0.75rem;
        }

        .left-4 {
            left: 1rem;
        }

        .left-\[-35rem\] {
            left: -35rem;
        }

        .left-\[2px\] {
            left: 2px;
        }

        .left-\[4px\] {
            left: 4px;
        }

        .left-\[50\%\] {
            left: 50%;
        }

        .right-0 {
            right: 0px;
        }

        .right-1\/3 {
            right: 33.333333%;
        }

        .right-10 {
            right: 2.5rem;
        }

        .right-2 {
            right: 0.5rem;
        }

        .right-3 {
            right: 0.75rem;
        }

        .right-4 {
            right: 1rem;
        }

        .right-6 {
            right: 1.5rem;
        }

        .right-\[-4rem\] {
            right: -4rem;
        }

        .right-\[0\.5rem\] {
            right: 0.5rem;
        }

        .right-\[0rem\] {
            right: 0rem;
        }

        .right-\[1rem\] {
            right: 1rem;
        }

        .right-\[2px\] {
            right: 2px;
        }

        .start-0 {
            inset-inline-start: 0px;
        }

        .top-0 {
            top: 0px;
        }

        .top-1 {
            top: 0.25rem;
        }

        .top-1\/2 {
            top: 50%;
        }

        .top-1\/3 {
            top: 33.333333%;
        }

        .top-10 {
            top: 2.5rem;
        }

        .top-2 {
            top: 0.5rem;
        }

        .top-4 {
            top: 1rem;
        }

        .top-\[11rem\] {
            top: 11rem;
        }

        .top-\[16rem\] {
            top: 16rem;
        }

        .top-\[1rem\] {
            top: 1rem;
        }

        .top-\[4rem\] {
            top: 4rem;
        }

        .top-\[92vh\] {
            top: 92vh;
        }

        .-z-10 {
            z-index: -10;
        }

        .z-0 {
            z-index: 0;
        }

        .z-10 {
            z-index: 10;
        }

        .z-20 {
            z-index: 20;
        }

        .z-30 {
            z-index: 30;
        }

        .z-40 {
            z-index: 40;
        }

        .z-50 {
            z-index: 50;
        }

        .z-\[2222\] {
            z-index: 2222;
        }

        .order-1 {
            order: 1;
        }

        .col-span-12 {
            grid-column: span 12 / span 12;
        }

        .col-span-5 {
            grid-column: span 5 / span 5;
        }

        .col-span-6 {
            grid-column: span 6 / span 6;
        }

        .float-right {
            float: right;
        }

        .float-left {
            float: left;
        }

        .m-1 {
            margin: 0.25rem;
        }

        .m-10 {
            margin: 2.5rem;
        }

        .m-2 {
            margin: 0.5rem;
        }

        .m-2\.5 {
            margin: 0.625rem;
        }

        .m-\[8px\] {
            margin: 8px;
        }

        .m-auto {
            margin: auto;
        }

        .mx-1 {
            margin-left: 0.25rem;
            margin-right: 0.25rem;
        }

        .mx-10 {
            margin-left: 2.5rem;
            margin-right: 2.5rem;
        }

        .mx-2 {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
        }

        .mx-3 {
            margin-left: 0.75rem;
            margin-right: 0.75rem;
        }

        .mx-4 {
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem;
        }

        .mx-\[1rem\] {
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .mx-\[2rem\] {
            margin-left: 2rem;
            margin-right: 2rem;
        }

        .mx-\[5px\] {
            margin-left: 5px;
            margin-right: 5px;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .my-2 {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .my-3 {
            margin-top: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .my-6 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .my-\[1\.5rem\] {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .my-\[1rem\] {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .my-\[2rem\] {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .my-\[8px\] {
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .my-auto {
            margin-top: auto;
            margin-bottom: auto;
        }

        .-ml-1 {
            margin-left: -0.25rem;
        }

        .-ml-\[1rem\] {
            margin-left: -1rem;
        }

        .-ml-\[7px\] {
            margin-left: -7px;
        }

        .-mr-1 {
            margin-right: -0.25rem;
        }

        .-mt-3 {
            margin-top: -0.75rem;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .mb-10 {
            margin-bottom: 2.5rem;
        }

        .mb-12 {
            margin-bottom: 3rem;
        }

        .mb-14 {
            margin-bottom: 3.5rem;
        }

        .mb-16 {
            margin-bottom: 4rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mb-2\.5 {
            margin-bottom: 0.625rem;
        }

        .mb-20 {
            margin-bottom: 5rem;
        }

        .mb-3 {
            margin-bottom: 0.75rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-7 {
            margin-bottom: 1.75rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .mb-9 {
            margin-bottom: 2.25rem;
        }

        .mb-\[0\.8rem\] {
            margin-bottom: 0.8rem;
        }

        .mb-\[1\.5rem\] {
            margin-bottom: 1.5rem;
        }

        .mb-\[14px\] {
            margin-bottom: 14px;
        }

        .mb-\[16px\] {
            margin-bottom: 16px;
        }

        .mb-\[1rem\] {
            margin-bottom: 1rem;
        }

        .mb-\[20px\] {
            margin-bottom: 20px;
        }

        .mb-\[2rem\] {
            margin-bottom: 2rem;
        }

        .mb-\[4px\] {
            margin-bottom: 4px;
        }

        .mb-\[4rem\] {
            margin-bottom: 4rem;
        }

        .mb-\[8px\] {
            margin-bottom: 8px;
        }

        .me-2 {
            margin-inline-end: 0.5rem;
        }

        .me-2\.5 {
            margin-inline-end: 0.625rem;
        }

        .ml-0 {
            margin-left: 0px;
        }

        .ml-1 {
            margin-left: 0.25rem;
        }

        .ml-10 {
            margin-left: 2.5rem;
        }

        .ml-12 {
            margin-left: 3rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .ml-3 {
            margin-left: 0.75rem;
        }

        .ml-4 {
            margin-left: 1rem;
        }

        .ml-6 {
            margin-left: 1.5rem;
        }

        .ml-8 {
            margin-left: 2rem;
        }

        .ml-\[0\.2rem\] {
            margin-left: 0.2rem;
        }

        .ml-\[0\.5rem\] {
            margin-left: 0.5rem;
        }

        .ml-\[0\.6rem\] {
            margin-left: 0.6rem;
        }

        .ml-\[1rem\] {
            margin-left: 1rem;
        }

        .ml-\[2\.5rem\] {
            margin-left: 2.5rem;
        }

        .ml-\[2rem\] {
            margin-left: 2rem;
        }

        .ml-\[5rem\] {
            margin-left: 5rem;
        }

        .mr-0 {
            margin-right: 0px;
        }

        .mr-1 {
            margin-right: 0.25rem;
        }

        .mr-10 {
            margin-right: 2.5rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .mr-3 {
            margin-right: 0.75rem;
        }

        .mr-4 {
            margin-right: 1rem;
        }

        .mr-8 {
            margin-right: 2rem;
        }

        .mr-\[-2px\] {
            margin-right: -2px;
        }

        .mr-\[0\.8rem\] {
            margin-right: 0.8rem;
        }

        .mr-\[10px\] {
            margin-right: 10px;
        }

        .mr-\[1rem\] {
            margin-right: 1rem;
        }

        .mr-\[25px\] {
            margin-right: 25px;
        }

        .mr-\[5px\] {
            margin-right: 5px;
        }

        .ms-1 {
            margin-inline-start: 0.25rem;
        }

        .ms-2 {
            margin-inline-start: 0.5rem;
        }

        .mt-0 {
            margin-top: 0px;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-10 {
            margin-top: 2.5rem;
        }

        .mt-12 {
            margin-top: 3rem;
        }

        .mt-14 {
            margin-top: 3.5rem;
        }

        .mt-16 {
            margin-top: 4rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-20 {
            margin-top: 5rem;
        }

        .mt-3 {
            margin-top: 0.75rem;
        }

        .mt-32 {
            margin-top: 8rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-5 {
            margin-top: 1.25rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .mt-\[-6rem\] {
            margin-top: -6rem;
        }

        .mt-\[-96px\] {
            margin-top: -96px;
        }

        .mt-\[0\.5rem\] {
            margin-top: 0.5rem;
        }

        .mt-\[1\.5rem\] {
            margin-top: 1.5rem;
        }

        .mt-\[12px\] {
            margin-top: 12px;
        }

        .mt-\[12rem\] {
            margin-top: 12rem;
        }

        .mt-\[15px\] {
            margin-top: 15px;
        }

        .mt-\[16px\] {
            margin-top: 16px;
        }

        .mt-\[18px\] {
            margin-top: 18px;
        }

        .mt-\[1px\] {
            margin-top: 1px;
        }

        .mt-\[1rem\] {
            margin-top: 1rem;
        }

        .mt-\[25px\] {
            margin-top: 25px;
        }

        .mt-\[2rem\] {
            margin-top: 2rem;
        }

        .mt-\[3rem\] {
            margin-top: 3rem;
        }

        .mt-\[4\.5rem\] {
            margin-top: 4.5rem;
        }

        .mt-\[44px\] {
            margin-top: 44px;
        }

        .mt-\[4px\] {
            margin-top: 4px;
        }

        .mt-\[6rem\] {
            margin-top: 6rem;
        }

        .mt-\[8px\] {
            margin-top: 8px;
        }

        .mt-\[8rem\] {
            margin-top: 8rem;
        }

        .mt-\[9rem\] {
            margin-top: 9rem;
        }

        .box-border {
            box-sizing: border-box;
        }

        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }

        .block {
            display: block;
        }

        .inline-block {
            display: inline-block;
        }

        .inline {
            display: inline;
        }

        .flex {
            display: flex;
        }

        .inline-flex {
            display: inline-flex;
        }

        .table {
            display: table;
        }

        .grid {
            display: grid;
        }

        .hidden {
            display: none;
        }

        .aspect-\[27\/5\] {
            aspect-ratio: 27/5;
        }

        .size-4 {
            width: 1rem;
            height: 1rem;
        }

        .h-0 {
            height: 0px;
        }

        .h-0\.5 {
            height: 0.125rem;
        }

        .h-1 {
            height: 0.25rem;
        }

        .h-10 {
            height: 2.5rem;
        }

        .h-11 {
            height: 2.75rem;
        }

        .h-12 {
            height: 3rem;
        }

        .h-14 {
            height: 3.5rem;
        }

        .h-16 {
            height: 4rem;
        }

        .h-2 {
            height: 0.5rem;
        }

        .h-2\.5 {
            height: 0.625rem;
        }

        .h-20 {
            height: 5rem;
        }

        .h-24 {
            height: 6rem;
        }

        .h-3 {
            height: 0.75rem;
        }

        .h-3\.5 {
            height: 0.875rem;
        }

        .h-32 {
            height: 8rem;
        }

        .h-4 {
            height: 1rem;
        }

        .h-40 {
            height: 10rem;
        }

        .h-48 {
            height: 12rem;
        }

        .h-5 {
            height: 1.25rem;
        }

        .h-52 {
            height: 13rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .h-60 {
            height: 15rem;
        }

        .h-7 {
            height: 1.75rem;
        }

        .h-8 {
            height: 2rem;
        }

        .h-80 {
            height: 20rem;
        }

        .h-9 {
            height: 2.25rem;
        }

        .h-\[150px\] {
            height: 150px;
        }

        .h-\[196px\] {
            height: 196px;
        }

        .h-\[197px\] {
            height: 197px;
        }

        .h-\[200px\] {
            height: 200px;
        }

        .h-\[20px\] {
            height: 20px;
        }

        .h-\[219px\] {
            height: 219px;
        }

        .h-\[230px\] {
            height: 230px;
        }

        .h-\[25px\] {
            height: 25px;
        }

        .h-\[260px\] {
            height: 260px;
        }

        .h-\[300px\] {
            height: 300px;
        }

        .h-\[30px\] {
            height: 30px;
        }

        .h-\[385px\] {
            height: 385px;
        }

        .h-\[40px\] {
            height: 40px;
        }

        .h-\[44px\] {
            height: 44px;
        }

        .h-\[485px\] {
            height: 485px;
        }

        .h-\[4rem\] {
            height: 4rem;
        }

        .h-\[500px\] {
            height: 500px;
        }

        .h-\[55px\] {
            height: 55px;
        }

        .h-\[6\.25rem\] {
            height: 6.25rem;
        }

        .h-\[60px\] {
            height: 60px;
        }

        .h-\[85vh\] {
            height: 85vh;
        }

        .h-\[\] {
            height: ;
        }

        .h-auto {
            height: auto;
        }

        .h-fit {
            height: fit-content;
        }

        .h-full {
            height: 100%;
        }

        .h-max {
            height: max-content;
        }

        .h-px {
            height: 1px;
        }

        .h-screen {
            height: 100vh;
        }

        .max-h-60 {
            max-height: 15rem;
        }

        .max-h-64 {
            max-height: 16rem;
        }

        .max-h-\[200px\] {
            max-height: 200px;
        }

        .max-h-\[90vh\] {
            max-height: 90vh;
        }

        .min-h-12 {
            min-height: 3rem;
        }

        .min-h-24 {
            min-height: 6rem;
        }

        .min-h-\[120px\] {
            min-height: 120px;
        }

        .min-h-\[175px\] {
            min-height: 175px;
        }

        .min-h-\[22rem\] {
            min-height: 22rem;
        }

        .min-h-\[300px\] {
            min-height: 300px;
        }

        .min-h-\[320px\] {
            min-height: 320px;
        }

        .min-h-\[400px\] {
            min-height: 400px;
        }

        .min-h-\[430px\] {
            min-height: 430px;
        }

        .min-h-\[460px\] {
            min-height: 460px;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .w-1 {
            width: 0.25rem;
        }

        .w-1\/2 {
            width: 50%;
        }

        .w-1\/3 {
            width: 33.333333%;
        }

        .w-1\/5 {
            width: 20%;
        }

        .w-1\/6 {
            width: 16.666667%;
        }

        .w-10 {
            width: 2.5rem;
        }

        .w-11 {
            width: 2.75rem;
        }

        .w-12 {
            width: 3rem;
        }

        .w-14 {
            width: 3.5rem;
        }

        .w-16 {
            width: 4rem;
        }

        .w-20 {
            width: 5rem;
        }

        .w-24 {
            width: 6rem;
        }

        .w-28 {
            width: 7rem;
        }

        .w-3 {
            width: 0.75rem;
        }

        .w-3\.5 {
            width: 0.875rem;
        }

        .w-3\/4 {
            width: 75%;
        }

        .w-36 {
            width: 9rem;
        }

        .w-4 {
            width: 1rem;
        }

        .w-40 {
            width: 10rem;
        }

        .w-44 {
            width: 11rem;
        }

        .w-48 {
            width: 12rem;
        }

        .w-5 {
            width: 1.25rem;
        }

        .w-52 {
            width: 13rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .w-64 {
            width: 16rem;
        }

        .w-7 {
            width: 1.75rem;
        }

        .w-8 {
            width: 2rem;
        }

        .w-9 {
            width: 2.25rem;
        }

        .w-\[105px\] {
            width: 105px;
        }

        .w-\[10rem\] {
            width: 10rem;
        }

        .w-\[120px\] {
            width: 120px;
        }

        .w-\[160rem\] {
            width: 160rem;
        }

        .w-\[167px\] {
            width: 167px;
        }

        .w-\[1px\] {
            width: 1px;
        }

        .w-\[20px\] {
            width: 20px;
        }

        .w-\[20rem\] {
            width: 20rem;
        }

        .w-\[21\.5rem\] {
            width: 21.5rem;
        }

        .w-\[223px\] {
            width: 223px;
        }

        .w-\[25\%\] {
            width: 25%;
        }

        .w-\[30px\] {
            width: 30px;
        }

        .w-\[30rem\] {
            width: 30rem;
        }

        .w-\[320px\] {
            width: 320px;
        }

        .w-\[40\%\] {
            width: 40%;
        }

        .w-\[40px\] {
            width: 40px;
        }

        .w-\[40rem\] {
            width: 40rem;
        }

        .w-\[410px\] {
            width: 410px;
        }

        .w-\[57\.5rem\] {
            width: 57.5rem;
        }

        .w-\[62rem\] {
            width: 62rem;
        }

        .w-\[70px\] {
            width: 70px;
        }

        .w-\[80\%\] {
            width: 80%;
        }

        .w-\[80px\] {
            width: 80px;
        }

        .w-\[85\%\] {
            width: 85%;
        }

        .w-\[90\%\] {
            width: 90%;
        }

        .w-\[95\%\] {
            width: 95%;
        }

        .w-\[9rem\] {
            width: 9rem;
        }

        .w-auto {
            width: auto;
        }

        .w-fit {
            width: fit-content;
        }

        .w-full {
            width: 100%;
        }

        .w-px {
            width: 1px;
        }

        .min-w-12 {
            min-width: 3rem;
        }

        .min-w-\[140px\] {
            min-width: 140px;
        }

        .min-w-\[50\%\] {
            min-width: 50%;
        }

        .min-w-full {
            min-width: 100%;
        }

        .max-w-2xl {
            max-width: 42rem;
        }

        .max-w-3xl {
            max-width: 48rem;
        }

        .max-w-4xl {
            max-width: 56rem;
        }

        .max-w-5xl {
            max-width: 64rem;
        }

        .max-w-6xl {
            max-width: 72rem;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .max-w-\[1350px\] {
            max-width: 1350px;
        }

        .max-w-\[1400px\] {
            max-width: 1400px;
        }

        .max-w-\[1920px\] {
            max-width: 1920px;
        }

        .max-w-\[200px\] {
            max-width: 200px;
        }

        .max-w-\[360px\] {
            max-width: 360px;
        }

        .max-w-\[440px\] {
            max-width: 440px;
        }

        .max-w-\[460px\] {
            max-width: 460px;
        }

        .max-w-\[480px\] {
            max-width: 480px;
        }

        .max-w-full {
            max-width: 100%;
        }

        .max-w-lg {
            max-width: 32rem;
        }

        .max-w-md {
            max-width: 28rem;
        }

        .max-w-screen-xl {
            max-width: 1280px;
        }

        .max-w-sm {
            max-width: 24rem;
        }

        .max-w-xl {
            max-width: 36rem;
        }

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-none {
            flex: none;
        }

        .flex-shrink-0 {
            flex-shrink: 0;
        }

        .shrink-0 {
            flex-shrink: 0;
        }

        .flex-grow {
            flex-grow: 1;
        }

        .grow {
            flex-grow: 1;
        }

        .table-auto {
            table-layout: auto;
        }

        .origin-left {
            transform-origin: left;
        }

        .origin-top {
            transform-origin: top;
        }

        .-translate-x-1\/2 {
            --tw-translate-x: -50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-y-1\/2 {
            --tw-translate-y: -50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-y-5 {
            --tw-translate-y: 1.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-0 {
            --tw-rotate: 0deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-180 {
            --tw-rotate: 180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-45 {
            --tw-rotate: 45deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-90 {
            --tw-rotate: 90deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .scale-110 {
            --tw-scale-x: 1.1;
            --tw-scale-y: 1.1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .scale-x-0 {
            --tw-scale-x: 0;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .scale-y-0 {
            --tw-scale-y: 0;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .transform {
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .animate-\[pop_0\.10s_ease-out\] {
            animation: pop 0.10s ease-out;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        .animate-bounce {
            animation: bounce 1s infinite;
        }

        @keyframes pulse {

            50% {
                opacity: .5;
            }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        .cursor-auto {
            cursor: auto;
        }

        .cursor-not-allowed {
            cursor: not-allowed;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .select-none {
            user-select: none;
        }

        .resize {
            resize: both;
        }

        .list-inside {
            list-style-position: inside;
        }

        .list-decimal {
            list-style-type: decimal;
        }

        .list-disc {
            list-style-type: disc;
        }

        .appearance-none {
            appearance: none;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-cols-7 {
            grid-template-columns: repeat(7, minmax(0, 1fr));
        }

        .flex-row {
            flex-direction: row;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-col-reverse {
            flex-direction: column-reverse;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .place-items-center {
            place-items: center;
        }

        .items-start {
            align-items: flex-start;
        }

        .items-end {
            align-items: flex-end;
        }

        .items-center {
            align-items: center;
        }

        .justify-start {
            justify-content: flex-start;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-around {
            justify-content: space-around;
        }

        .justify-evenly {
            justify-content: space-evenly;
        }

        .gap-1 {
            gap: 0.25rem;
        }

        .gap-1\.5 {
            gap: 0.375rem;
        }

        .gap-10 {
            gap: 2.5rem;
        }

        .gap-12 {
            gap: 3rem;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-5 {
            gap: 1.25rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .gap-8 {
            gap: 2rem;
        }

        .gap-\[12px\] {
            gap: 12px;
        }

        .gap-\[1rem\] {
            gap: 1rem;
        }

        .gap-\[3rem\] {
            gap: 3rem;
        }

        .gap-\[8px\] {
            gap: 8px;
        }

        .gap-x-12 {
            column-gap: 3rem;
        }

        .gap-x-3 {
            column-gap: 0.75rem;
        }

        .gap-x-4 {
            column-gap: 1rem;
        }

        .gap-x-\[8px\] {
            column-gap: 8px;
        }

        .gap-y-12 {
            row-gap: 3rem;
        }

        .gap-y-4 {
            row-gap: 1rem;
        }

        .space-x-0> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(0px * var(--tw-space-x-reverse));
            margin-left: calc(0px * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-1> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(0.25rem * var(--tw-space-x-reverse));
            margin-left: calc(0.25rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-10> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(2.5rem * var(--tw-space-x-reverse));
            margin-left: calc(2.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-2> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(0.5rem * var(--tw-space-x-reverse));
            margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-3> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(0.75rem * var(--tw-space-x-reverse));
            margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-4> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1rem * var(--tw-space-x-reverse));
            margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-5> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1.25rem * var(--tw-space-x-reverse));
            margin-left: calc(1.25rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-6> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1.5rem * var(--tw-space-x-reverse));
            margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-7> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(1.75rem * var(--tw-space-x-reverse));
            margin-left: calc(1.75rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-y-0> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0px * var(--tw-space-y-reverse));
        }

        .space-y-1> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
        }

        .space-y-10> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(2.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(2.5rem * var(--tw-space-y-reverse));
        }

        .space-y-2> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
        }

        .space-y-3> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
        }

        .space-y-4> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1rem * var(--tw-space-y-reverse));
        }

        .space-y-5> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
        }

        .space-y-6> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
        }

        .space-y-7> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.75rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.75rem * var(--tw-space-y-reverse));
        }

        .space-y-8> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(2rem * var(--tw-space-y-reverse));
        }

        .self-start {
            align-self: flex-start;
        }

        .self-end {
            align-self: flex-end;
        }

        .self-center {
            align-self: center;
        }

        .self-stretch {
            align-self: stretch;
        }

        .overflow-auto {
            overflow: auto;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .overflow-y-auto {
            overflow-y: auto;
        }

        .overflow-x-hidden {
            overflow-x: hidden;
        }

        .overflow-x-scroll {
            overflow-x: scroll;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-wrap {
            text-wrap: wrap;
        }

        .text-nowrap {
            text-wrap: nowrap;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-2xl {
            border-radius: 1rem;
        }

        .rounded-3xl {
            border-radius: 1.5rem;
        }

        .rounded-\[10px\] {
            border-radius: 10px;
        }

        .rounded-\[12px\] {
            border-radius: 12px;
        }

        .rounded-\[20px\] {
            border-radius: 20px;
        }

        .rounded-\[24px\] {
            border-radius: 24px;
        }

        .rounded-\[4px\] {
            border-radius: 4px;
        }

        .rounded-\[5px\] {
            border-radius: 5px;
        }

        .rounded-\[6px\] {
            border-radius: 6px;
        }

        .rounded-\[7px\] {
            border-radius: 7px;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .rounded-sm {
            border-radius: 0.125rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-b-md {
            border-bottom-right-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .rounded-b-none {
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }

        .rounded-b-xl {
            border-bottom-right-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }

        .rounded-e-lg {
            border-start-end-radius: 0.5rem;
            border-end-end-radius: 0.5rem;
        }

        .rounded-l-full {
            border-top-left-radius: 9999px;
            border-bottom-left-radius: 9999px;
        }

        .rounded-l-lg {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .rounded-r-lg {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .rounded-s-lg {
            border-start-start-radius: 0.5rem;
            border-end-start-radius: 0.5rem;
        }

        .rounded-t-2xl {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .rounded-t-\[24px\] {
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
        }

        .rounded-t-lg {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .rounded-t-xl {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .rounded-tl-2xl {
            border-top-left-radius: 1rem;
        }

        .border {
            border-width: 1px;
        }

        .border-0 {
            border-width: 0px;
        }

        .border-2 {
            border-width: 2px;
        }

        .border-y-2 {
            border-top-width: 2px;
            border-bottom-width: 2px;
        }

        .border-y-4 {
            border-top-width: 4px;
            border-bottom-width: 4px;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-b-0 {
            border-bottom-width: 0px;
        }

        .border-b-2 {
            border-bottom-width: 2px;
        }

        .border-b-4 {
            border-bottom-width: 4px;
        }

        .border-b-8 {
            border-bottom-width: 8px;
        }

        .border-b-\[1px\] {
            border-bottom-width: 1px;
        }

        .border-l-4 {
            border-left-width: 4px;
        }

        .border-r {
            border-right-width: 1px;
        }

        .border-t {
            border-top-width: 1px;
        }

        .border-t-0 {
            border-top-width: 0px;
        }

        .border-t-4 {
            border-top-width: 4px;
        }

        .border-t-\[1px\] {
            border-top-width: 1px;
        }

        .border-solid {
            border-style: solid;
        }

        .border-\[\#1D3564\] {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }

        .border-\[\#1b366e\] {
            --tw-border-opacity: 1;
            border-color: rgb(27 54 110 / var(--tw-border-opacity));
        }

        .border-\[\#1d3564\] {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }

        .border-\[\#242E69\] {
            --tw-border-opacity: 1;
            border-color: rgb(36 46 105 / var(--tw-border-opacity));
        }

        .border-\[\#242e69\] {
            --tw-border-opacity: 1;
            border-color: rgb(36 46 105 / var(--tw-border-opacity));
        }

        .border-\[\#3F537B\] {
            --tw-border-opacity: 1;
            border-color: rgb(63 83 123 / var(--tw-border-opacity));
        }

        .border-\[\#7F7F7F\] {
            --tw-border-opacity: 1;
            border-color: rgb(127 127 127 / var(--tw-border-opacity));
        }

        .border-\[\#DB0C28\] {
            --tw-border-opacity: 1;
            border-color: rgb(219 12 40 / var(--tw-border-opacity));
        }

        .border-\[\#DB1F2A\] {
            --tw-border-opacity: 1;
            border-color: rgb(219 31 42 / var(--tw-border-opacity));
        }

        .border-\[\#E5E7EB\] {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity));
        }

        .border-\[\#E5E9FF\] {
            --tw-border-opacity: 1;
            border-color: rgb(229 233 255 / var(--tw-border-opacity));
        }

        .border-\[\#E8E8E8\] {
            --tw-border-opacity: 1;
            border-color: rgb(232 232 232 / var(--tw-border-opacity));
        }

        .border-\[\#FFD5DB\] {
            --tw-border-opacity: 1;
            border-color: rgb(255 213 219 / var(--tw-border-opacity));
        }

        .border-\[\#d0d6d8\] {
            --tw-border-opacity: 1;
            border-color: rgb(208 214 216 / var(--tw-border-opacity));
        }

        .border-\[\#e5e9ff\] {
            --tw-border-opacity: 1;
            border-color: rgb(229 233 255 / var(--tw-border-opacity));
        }

        .border-\[\#f08d9a\] {
            --tw-border-opacity: 1;
            border-color: rgb(240 141 154 / var(--tw-border-opacity));
        }

        .border-black {
            --tw-border-opacity: 1;
            border-color: rgb(0 0 0 / var(--tw-border-opacity));
        }

        .border-blue_bg {
            --tw-border-opacity: 1;
            border-color: rgb(36 46 105 / var(--tw-border-opacity));
        }

        .border-gray-100 {
            --tw-border-opacity: 1;
            border-color: rgb(243 244 246 / var(--tw-border-opacity));
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity));
        }

        .border-gray-300 {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
        }

        .border-gray-500 {
            --tw-border-opacity: 1;
            border-color: rgb(107 114 128 / var(--tw-border-opacity));
        }

        .border-gray-600 {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));
        }

        .border-indigo-700 {
            --tw-border-opacity: 1;
            border-color: rgb(81 69 205 / var(--tw-border-opacity));
        }

        .border-nav_bg {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }

        .border-purple-600 {
            --tw-border-opacity: 1;
            border-color: rgb(126 58 242 / var(--tw-border-opacity));
        }

        .border-red-300 {
            --tw-border-opacity: 1;
            border-color: rgb(248 180 180 / var(--tw-border-opacity));
        }

        .border-red-500 {
            --tw-border-opacity: 1;
            border-color: rgb(240 82 82 / var(--tw-border-opacity));
        }

        .border-red-600 {
            --tw-border-opacity: 1;
            border-color: rgb(224 36 36 / var(--tw-border-opacity));
        }

        .border-red-700 {
            --tw-border-opacity: 1;
            border-color: rgb(200 30 30 / var(--tw-border-opacity));
        }

        .border-red_bg {
            --tw-border-opacity: 1;
            border-color: rgb(219 12 40 / var(--tw-border-opacity));
        }

        .border-slate-200 {
            --tw-border-opacity: 1;
            border-color: rgb(226 232 240 / var(--tw-border-opacity));
        }

        .border-slate-300 {
            --tw-border-opacity: 1;
            border-color: rgb(203 213 225 / var(--tw-border-opacity));
        }

        .border-slate-400 {
            --tw-border-opacity: 1;
            border-color: rgb(148 163 184 / var(--tw-border-opacity));
        }

        .border-transparent {
            border-color: transparent;
        }

        .border-white {
            --tw-border-opacity: 1;
            border-color: rgb(255 255 255 / var(--tw-border-opacity));
        }

        .border-white\/10 {
            border-color: rgb(255 255 255 / 0.1);
        }

        .border-white\/20 {
            border-color: rgb(255 255 255 / 0.2);
        }

        .border-white\/40 {
            border-color: rgb(255 255 255 / 0.4);
        }

        .border-y-\[\#1D3564\] {
            --tw-border-opacity: 1;
            border-top-color: rgb(29 53 100 / var(--tw-border-opacity));
            border-bottom-color: rgb(29 53 100 / var(--tw-border-opacity));
        }

        .border-b-\[\#1D3564\] {
            --tw-border-opacity: 1;
            border-bottom-color: rgb(29 53 100 / var(--tw-border-opacity));
        }

        .border-opacity-40 {
            --tw-border-opacity: 0.4;
        }

        .bg-\[\#00000059\] {
            background-color: #00000059;
        }

        .bg-\[\#00216E80\] {
            background-color: #00216E80;
        }

        .bg-\[\#00216E\] {
            --tw-bg-opacity: 1;
            background-color: rgb(0 33 110 / var(--tw-bg-opacity));
        }

        .bg-\[\#003087\] {
            --tw-bg-opacity: 1;
            background-color: rgb(0 48 135 / var(--tw-bg-opacity));
        }

        .bg-\[\#021B3A\]\/40 {
            background-color: rgb(2 27 58 / 0.4);
        }

        .bg-\[\#021B3A\]\/80 {
            background-color: rgb(2 27 58 / 0.8);
        }

        .bg-\[\#182436\] {
            --tw-bg-opacity: 1;
            background-color: rgb(24 36 54 / var(--tw-bg-opacity));
        }

        .bg-\[\#1D3564\] {
            --tw-bg-opacity: 1;
            background-color: rgb(29 53 100 / var(--tw-bg-opacity));
        }

        .bg-\[\#1D3564\]\/10 {
            background-color: rgb(29 53 100 / 0.1);
        }

        .bg-\[\#1d3564\] {
            --tw-bg-opacity: 1;
            background-color: rgb(29 53 100 / var(--tw-bg-opacity));
        }

        .bg-\[\#242E69\] {
            --tw-bg-opacity: 1;
            background-color: rgb(36 46 105 / var(--tw-bg-opacity));
        }

        .bg-\[\#242e69\] {
            --tw-bg-opacity: 1;
            background-color: rgb(36 46 105 / var(--tw-bg-opacity));
        }

        .bg-\[\#3C4885\] {
            --tw-bg-opacity: 1;
            background-color: rgb(60 72 133 / var(--tw-bg-opacity));
        }

        .bg-\[\#656565\] {
            --tw-bg-opacity: 1;
            background-color: rgb(101 101 101 / var(--tw-bg-opacity));
        }

        .bg-\[\#BABABA\] {
            --tw-bg-opacity: 1;
            background-color: rgb(186 186 186 / var(--tw-bg-opacity));
        }

        .bg-\[\#C91129\] {
            --tw-bg-opacity: 1;
            background-color: rgb(201 17 41 / var(--tw-bg-opacity));
        }

        .bg-\[\#D24147\] {
            --tw-bg-opacity: 1;
            background-color: rgb(210 65 71 / var(--tw-bg-opacity));
        }

        .bg-\[\#DB0C28\] {
            --tw-bg-opacity: 1;
            background-color: rgb(219 12 40 / var(--tw-bg-opacity));
        }

        .bg-\[\#DB1F2A\] {
            --tw-bg-opacity: 1;
            background-color: rgb(219 31 42 / var(--tw-bg-opacity));
        }

        .bg-\[\#DB1F2A\]\/10 {
            background-color: rgb(219 31 42 / 0.1);
        }

        .bg-\[\#E3ECFF\] {
            --tw-bg-opacity: 1;
            background-color: rgb(227 236 255 / var(--tw-bg-opacity));
        }

        .bg-\[\#E6ECF5\] {
            --tw-bg-opacity: 1;
            background-color: rgb(230 236 245 / var(--tw-bg-opacity));
        }

        .bg-\[\#EAF2F7\] {
            --tw-bg-opacity: 1;
            background-color: rgb(234 242 247 / var(--tw-bg-opacity));
        }

        .bg-\[\#EDF2FE\] {
            --tw-bg-opacity: 1;
            background-color: rgb(237 242 254 / var(--tw-bg-opacity));
        }

        .bg-\[\#EEF3F7\] {
            --tw-bg-opacity: 1;
            background-color: rgb(238 243 247 / var(--tw-bg-opacity));
        }

        .bg-\[\#F1F5F9\] {
            --tw-bg-opacity: 1;
            background-color: rgb(241 245 249 / var(--tw-bg-opacity));
        }

        .bg-\[\#F4F4F4\] {
            --tw-bg-opacity: 1;
            background-color: rgb(244 244 244 / var(--tw-bg-opacity));
        }

        .bg-\[\#F6F9FF\] {
            --tw-bg-opacity: 1;
            background-color: rgb(246 249 255 / var(--tw-bg-opacity));
        }

        .bg-\[\#F9FAFB\] {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .bg-\[\#FFD5DB\] {
            --tw-bg-opacity: 1;
            background-color: rgb(255 213 219 / var(--tw-bg-opacity));
        }

        .bg-\[\#e3e3e3\] {
            --tw-bg-opacity: 1;
            background-color: rgb(227 227 227 / var(--tw-bg-opacity));
        }

        .bg-\[\#e6f0ff\] {
            --tw-bg-opacity: 1;
            background-color: rgb(230 240 255 / var(--tw-bg-opacity));
        }

        .bg-\[\#eef3f7\] {
            --tw-bg-opacity: 1;
            background-color: rgb(238 243 247 / var(--tw-bg-opacity));
        }

        .bg-\[\#f4f4f4\] {
            --tw-bg-opacity: 1;
            background-color: rgb(244 244 244 / var(--tw-bg-opacity));
        }

        .bg-\[\#f7f7f7\] {
            --tw-bg-opacity: 1;
            background-color: rgb(247 247 247 / var(--tw-bg-opacity));
        }

        .bg-black {
            --tw-bg-opacity: 1;
            background-color: rgb(0 0 0 / var(--tw-bg-opacity));
        }

        .bg-black\/30 {
            background-color: rgb(0 0 0 / 0.3);
        }

        .bg-black\/35 {
            background-color: rgb(0 0 0 / 0.35);
        }

        .bg-black\/50 {
            background-color: rgb(0 0 0 / 0.5);
        }

        .bg-blue_bg {
            --tw-bg-opacity: 1;
            background-color: rgb(36 46 105 / var(--tw-bg-opacity));
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .bg-gray-300 {
            --tw-bg-opacity: 1;
            background-color: rgb(209 213 219 / var(--tw-bg-opacity));
        }

        .bg-gray-400 {
            --tw-bg-opacity: 1;
            background-color: rgb(156 163 175 / var(--tw-bg-opacity));
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .bg-gray-50\/50 {
            background-color: rgb(249 250 251 / 0.5);
        }

        .bg-green-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(222 247 236 / var(--tw-bg-opacity));
        }

        .bg-green-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 250 247 / var(--tw-bg-opacity));
        }

        .bg-indigo-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 237 255 / var(--tw-bg-opacity));
        }

        .bg-indigo-300\/30 {
            background-color: rgb(180 198 252 / 0.3);
        }

        .bg-nav_bg {
            --tw-bg-opacity: 1;
            background-color: rgb(29 53 100 / var(--tw-bg-opacity));
        }

        .bg-red-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(253 232 232 / var(--tw-bg-opacity));
        }

        .bg-red-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(224 36 36 / var(--tw-bg-opacity));
        }

        .bg-red-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(200 30 30 / var(--tw-bg-opacity));
        }

        .bg-red_bg {
            --tw-bg-opacity: 1;
            background-color: rgb(219 12 40 / var(--tw-bg-opacity));
        }

        .bg-slate-900\/30 {
            background-color: rgb(15 23 42 / 0.3);
        }

        .bg-transparent {
            background-color: transparent;
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .bg-white\/10 {
            background-color: rgb(255 255 255 / 0.1);
        }

        .bg-white\/30 {
            background-color: rgb(255 255 255 / 0.3);
        }

        .bg-white\/60 {
            background-color: rgb(255 255 255 / 0.6);
        }

        .bg-white\/70 {
            background-color: rgb(255 255 255 / 0.7);
        }

        .bg-white\/80 {
            background-color: rgb(255 255 255 / 0.8);
        }

        .bg-white\/90 {
            background-color: rgb(255 255 255 / 0.9);
        }

        .bg-opacity-10 {
            --tw-bg-opacity: 0.1;
        }

        .bg-opacity-30 {
            --tw-bg-opacity: 0.3;
        }

        .bg-opacity-50 {
            --tw-bg-opacity: 0.5;
        }

        .bg-opacity-60 {
            --tw-bg-opacity: 0.6;
        }

        .bg-opacity-75 {
            --tw-bg-opacity: 0.75;
        }

        .bg-opacity-80 {
            --tw-bg-opacity: 0.8;
        }

        .bg-\[url\(\'\/images\/Rectangle_379\.png\'\)\] {
            background-image: url('/images/Rectangle_379.png');
        }

        .bg-\[url\(\'\/images\/University-banner\.webp\'\)\] {
            background-image: url('/images/University-banner.webp');
        }

        .bg-\[url\(\'\/images\/course-banner\.webp\'\)\] {
            background-image: url('/images/course-banner.webp');
        }

        .bg-\[url\(\'\/images\/event-banner-img\.png\'\)\] {
            background-image: url('/images/event-banner-img.png');
        }

        .bg-\[url\(\'\/images\/universitybanner\.jpg\'\)\] {
            background-image: url('/images/universitybanner.jpg');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/about-mob\.original\.jpg\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/about-mob.original.jpg');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/about-mob\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/about-mob.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/blogs-banner\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/blogs-banner.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/event_banner\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/event_banner.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/news-banner\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/news-banner.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/offices-banner\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/offices-banner.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/our-offices-mobile\.original\.png\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/our-offices-mobile.original.png');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/scholarship-banner\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/scholarship-banner.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/service-mb\.original\.png\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/service-mb.original.png');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/study-option-mobile\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/study-option-mobile.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/uk-study-dk\.original\.png\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/uk-study-dk.original.png');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/uk-study-dk\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/uk-study-dk.original.webp');
        }

        .bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/uk-study-mb\.original\.webp\'\)\] {
            background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/uk-study-mb.original.webp');
        }

        .bg-gradient-to-b {
            background-image: linear-gradient(to bottom, var(--tw-gradient-stops));
        }

        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
        }

        .bg-gradient-to-r {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }

        .bg-gradient-to-t {
            background-image: linear-gradient(to top, var(--tw-gradient-stops));
        }

        .bg-gradient-to-tl {
            background-image: linear-gradient(to top left, var(--tw-gradient-stops));
        }

        .from-\[\#00216E\] {
            --tw-gradient-from: #00216E var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 33 110 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#00216E\]\/60 {
            --tw-gradient-from: rgb(0 33 110 / 0.6) var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 33 110 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#1D3564\] {
            --tw-gradient-from: #1D3564 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(29 53 100 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#242E69\] {
            --tw-gradient-from: #242E69 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(36 46 105 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#E3ECFF\] {
            --tw-gradient-from: #E3ECFF var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(227 236 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#E4F0FF\] {
            --tw-gradient-from: #E4F0FF var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(228 240 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#E8FFE8\] {
            --tw-gradient-from: #E8FFE8 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(232 255 232 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#F0F4FF\] {
            --tw-gradient-from: #F0F4FF var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(240 244 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#F1F5F9\] {
            --tw-gradient-from: #F1F5F9 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(241 245 249 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#FFE7E7\] {
            --tw-gradient-from: #FFE7E7 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(255 231 231 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-\[\#FFF1DE\] {
            --tw-gradient-from: #FFF1DE var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(255 241 222 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-amber-100 {
            --tw-gradient-from: #fef3c7 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(254 243 199 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-black\/10 {
            --tw-gradient-from: rgb(0 0 0 / 0.1) var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-black\/40 {
            --tw-gradient-from: rgb(0 0 0 / 0.4) var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-blue_bg {
            --tw-gradient-from: #242E69 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(36 46 105 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-cyan-400 {
            --tw-gradient-from: #22d3ee var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(34 211 238 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-emerald-400 {
            --tw-gradient-from: #34d399 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(52 211 153 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-gray-50 {
            --tw-gradient-from: #F9FAFB var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(249 250 251 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-green-100 {
            --tw-gradient-from: #DEF7EC var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(222 247 236 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-green-200 {
            --tw-gradient-from: #BCF0DA var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(188 240 218 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-green-400 {
            --tw-gradient-from: #31C48D var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(49 196 141 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-indigo-100 {
            --tw-gradient-from: #E5EDFF var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(229 237 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-indigo-100\/50 {
            --tw-gradient-from: rgb(229 237 255 / 0.5) var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(229 237 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-indigo-50 {
            --tw-gradient-from: #F0F5FF var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(240 245 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-indigo-500 {
            --tw-gradient-from: #6875F5 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(104 117 245 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-nav_bg {
            --tw-gradient-from: #1D3564 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(29 53 100 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-purple-500 {
            --tw-gradient-from: #9061F9 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(144 97 249 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-purple-600 {
            --tw-gradient-from: #7E3AF2 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(126 58 242 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-purple-700 {
            --tw-gradient-from: #6C2BD9 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(108 43 217 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-red-100 {
            --tw-gradient-from: #FDE8E8 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(253 232 232 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-slate-50 {
            --tw-gradient-from: #f8fafc var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(248 250 252 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-transparent {
            --tw-gradient-from: transparent var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-white {
            --tw-gradient-from: #ffffff var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-yellow-400 {
            --tw-gradient-from: #E3A008 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(227 160 8 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .via-\[\#4A6DB0\] {
            --tw-gradient-to: rgb(74 109 176 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #4A6DB0 var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-\[\#4B6EA8\] {
            --tw-gradient-to: rgb(75 110 168 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #4B6EA8 var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-\[\#F4F7FF\] {
            --tw-gradient-to: rgb(244 247 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #F4F7FF var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-\[\#F7FAFF\] {
            --tw-gradient-to: rgb(247 250 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #F7FAFF var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-indigo-100 {
            --tw-gradient-to: rgb(229 237 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #E5EDFF var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-purple-400 {
            --tw-gradient-to: rgb(172 148 250 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #AC94FA var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-purple-500 {
            --tw-gradient-to: rgb(144 97 249 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #9061F9 var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-purple-800 {
            --tw-gradient-to: rgb(85 33 181 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #5521B5 var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .via-white {
            --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), #ffffff var(--tw-gradient-via-position), var(--tw-gradient-to);
        }

        .to-\[\#1D3564\] {
            --tw-gradient-to: #1D3564 var(--tw-gradient-to-position);
        }

        .to-\[\#2B4A89\] {
            --tw-gradient-to: #2B4A89 var(--tw-gradient-to-position);
        }

        .to-\[\#4A6DB0\] {
            --tw-gradient-to: #4A6DB0 var(--tw-gradient-to-position);
        }

        .to-\[\#DB0C28\] {
            --tw-gradient-to: #DB0C28 var(--tw-gradient-to-position);
        }

        .to-\[\#DB0C28\]\/60 {
            --tw-gradient-to: rgb(219 12 40 / 0.6) var(--tw-gradient-to-position);
        }

        .to-\[\#DB1F2A\] {
            --tw-gradient-to: #DB1F2A var(--tw-gradient-to-position);
        }

        .to-\[\#F0F5FF\] {
            --tw-gradient-to: #F0F5FF var(--tw-gradient-to-position);
        }

        .to-\[\#F2F7FF\] {
            --tw-gradient-to: #F2F7FF var(--tw-gradient-to-position);
        }

        .to-\[\#F3FFF3\] {
            --tw-gradient-to: #F3FFF3 var(--tw-gradient-to-position);
        }

        .to-\[\#FFEADB\] {
            --tw-gradient-to: #FFEADB var(--tw-gradient-to-position);
        }

        .to-\[\#FFF4F4\] {
            --tw-gradient-to: #FFF4F4 var(--tw-gradient-to-position);
        }

        .to-blue_bg {
            --tw-gradient-to: #242E69 var(--tw-gradient-to-position);
        }

        .to-cyan-600 {
            --tw-gradient-to: #0891b2 var(--tw-gradient-to-position);
        }

        .to-emerald-50 {
            --tw-gradient-to: #ecfdf5 var(--tw-gradient-to-position);
        }

        .to-gray-100 {
            --tw-gradient-to: #F3F4F6 var(--tw-gradient-to-position);
        }

        .to-gray-50 {
            --tw-gradient-to: #F9FAFB var(--tw-gradient-to-position);
        }

        .to-green-400 {
            --tw-gradient-to: #31C48D var(--tw-gradient-to-position);
        }

        .to-green-600 {
            --tw-gradient-to: #057A55 var(--tw-gradient-to-position);
        }

        .to-indigo-300 {
            --tw-gradient-to: #B4C6FC var(--tw-gradient-to-position);
        }

        .to-indigo-600 {
            --tw-gradient-to: #5850EC var(--tw-gradient-to-position);
        }

        .to-orange-50 {
            --tw-gradient-to: #FFF8F1 var(--tw-gradient-to-position);
        }

        .to-orange-500 {
            --tw-gradient-to: #FF5A1F var(--tw-gradient-to-position);
        }

        .to-pink-500 {
            --tw-gradient-to: #E74694 var(--tw-gradient-to-position);
        }

        .to-pink-600 {
            --tw-gradient-to: #D61F69 var(--tw-gradient-to-position);
        }

        .to-purple-50 {
            --tw-gradient-to: #F6F5FF var(--tw-gradient-to-position);
        }

        .to-purple-600 {
            --tw-gradient-to: #7E3AF2 var(--tw-gradient-to-position);
        }

        .to-red-600 {
            --tw-gradient-to: #E02424 var(--tw-gradient-to-position);
        }

        .to-rose-50 {
            --tw-gradient-to: #fff1f2 var(--tw-gradient-to-position);
        }

        .to-teal-500 {
            --tw-gradient-to: #0694A2 var(--tw-gradient-to-position);
        }

        .to-transparent {
            --tw-gradient-to: transparent var(--tw-gradient-to-position);
        }

        .to-white {
            --tw-gradient-to: #ffffff var(--tw-gradient-to-position);
        }

        .bg-cover {
            background-size: cover;
        }

        .bg-clip-text {
            background-clip: text;
        }

        .bg-center {
            background-position: center;
        }

        .bg-no-repeat {
            background-repeat: no-repeat;
        }

        .fill-current {
            fill: currentColor;
        }

        .object-contain {
            object-fit: contain;
        }

        .object-cover {
            object-fit: cover;
        }

        .p-0 {
            padding: 0px;
        }

        .p-1 {
            padding: 0.25rem;
        }

        .p-10 {
            padding: 2.5rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .p-2\.5 {
            padding: 0.625rem;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-5 {
            padding: 1.25rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .p-\[0\.5rem\] {
            padding: 0.5rem;
        }

        .p-\[0\.9rem\] {
            padding: 0.9rem;
        }

        .p-\[3px\] {
            padding: 3px;
        }

        .px-0 {
            padding-left: 0px;
            padding-right: 0px;
        }

        .px-1 {
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }

        .px-10 {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .px-14 {
            padding-left: 3.5rem;
            padding-right: 3.5rem;
        }

        .px-16 {
            padding-left: 4rem;
            padding-right: 4rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .px-\[0\.5rem\] {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .px-\[0\.9rem\] {
            padding-left: 0.9rem;
            padding-right: 0.9rem;
        }

        .px-\[1rem\] {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-\[20px\] {
            padding-left: 20px;
            padding-right: 20px;
        }

        .px-\[22px\] {
            padding-left: 22px;
            padding-right: 22px;
        }

        .px-\[2rem\] {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .px-\[50px\] {
            padding-left: 50px;
            padding-right: 50px;
        }

        .px-\[60px\] {
            padding-left: 60px;
            padding-right: 60px;
        }

        .py-0 {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .py-0\.5 {
            padding-top: 0.125rem;
            padding-bottom: 0.125rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .py-1\.5 {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .py-14 {
            padding-top: 3.5rem;
            padding-bottom: 3.5rem;
        }

        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .py-2\.5 {
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
        }

        .py-24 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-5 {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .py-\[0\.25rem\] {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .py-\[0\.354rem\] {
            padding-top: 0.354rem;
            padding-bottom: 0.354rem;
        }

        .py-\[1\.5rem\] {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .py-\[1rem\] {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-\[2\.5rem\] {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .py-\[7px\] {
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .pb-0 {
            padding-bottom: 0px;
        }

        .pb-1 {
            padding-bottom: 0.25rem;
        }

        .pb-10 {
            padding-bottom: 2.5rem;
        }

        .pb-12 {
            padding-bottom: 3rem;
        }

        .pb-14 {
            padding-bottom: 3.5rem;
        }

        .pb-16 {
            padding-bottom: 4rem;
        }

        .pb-2 {
            padding-bottom: 0.5rem;
        }

        .pb-20 {
            padding-bottom: 5rem;
        }

        .pb-3 {
            padding-bottom: 0.75rem;
        }

        .pb-4 {
            padding-bottom: 1rem;
        }

        .pb-5 {
            padding-bottom: 1.25rem;
        }

        .pb-6 {
            padding-bottom: 1.5rem;
        }

        .pb-8 {
            padding-bottom: 2rem;
        }

        .pb-\[1\.5rem\] {
            padding-bottom: 1.5rem;
        }

        .pb-\[10px\] {
            padding-bottom: 10px;
        }

        .pb-\[12px\] {
            padding-bottom: 12px;
        }

        .pb-\[1rem\] {
            padding-bottom: 1rem;
        }

        .pb-\[20px\] {
            padding-bottom: 20px;
        }

        .pb-\[2rem\] {
            padding-bottom: 2rem;
        }

        .pb-\[3\.5rem\] {
            padding-bottom: 3.5rem;
        }

        .pb-\[33px\] {
            padding-bottom: 33px;
        }

        .pb-\[3rem\] {
            padding-bottom: 3rem;
        }

        .pb-\[56\.25\%\] {
            padding-bottom: 56.25%;
        }

        .pl-0 {
            padding-left: 0px;
        }

        .pl-10 {
            padding-left: 2.5rem;
        }

        .pl-14 {
            padding-left: 3.5rem;
        }

        .pl-2 {
            padding-left: 0.5rem;
        }

        .pl-3 {
            padding-left: 0.75rem;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .pl-5 {
            padding-left: 1.25rem;
        }

        .pl-8 {
            padding-left: 2rem;
        }

        .pl-\[0px\] {
            padding-left: 0px;
        }

        .pl-\[13px\] {
            padding-left: 13px;
        }

        .pl-\[1px\] {
            padding-left: 1px;
        }

        .pl-\[23px\] {
            padding-left: 23px;
        }

        .pl-\[2px\] {
            padding-left: 2px;
        }

        .pl-\[4px\] {
            padding-left: 4px;
        }

        .pl-\[4rem\] {
            padding-left: 4rem;
        }

        .pl-\[5px\] {
            padding-left: 5px;
        }

        .pl-\[9px\] {
            padding-left: 9px;
        }

        .pr-20 {
            padding-right: 5rem;
        }

        .pr-4 {
            padding-right: 1rem;
        }

        .pr-8 {
            padding-right: 2rem;
        }

        .ps-10 {
            padding-inline-start: 2.5rem;
        }

        .ps-3 {
            padding-inline-start: 0.75rem;
        }

        .ps-4 {
            padding-inline-start: 1rem;
        }

        .pt-0 {
            padding-top: 0px;
        }

        .pt-1 {
            padding-top: 0.25rem;
        }

        .pt-10 {
            padding-top: 2.5rem;
        }

        .pt-2 {
            padding-top: 0.5rem;
        }

        .pt-4 {
            padding-top: 1rem;
        }

        .pt-5 {
            padding-top: 1.25rem;
        }

        .pt-6 {
            padding-top: 1.5rem;
        }

        .pt-8 {
            padding-top: 2rem;
        }

        .pt-\[-0\.75\] {
            padding-top: -0.75;
        }

        .pt-\[10px\] {
            padding-top: 10px;
        }

        .pt-\[12px\] {
            padding-top: 12px;
        }

        .pt-\[1rem\] {
            padding-top: 1rem;
        }

        .pt-\[20\%\] {
            padding-top: 20%;
        }

        .pt-\[2rem\] {
            padding-top: 2rem;
        }

        .pt-\[50\%\] {
            padding-top: 50%;
        }

        .pt-\[5px\] {
            padding-top: 5px;
        }

        .pt-\[77\%\] {
            padding-top: 77%;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-justify {
            text-align: justify;
        }

        .text-start {
            text-align: start;
        }

        .font-sans {
            font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-4xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }

        .text-\[12px\] {
            font-size: 12px;
        }

        .text-\[13px\] {
            font-size: 13px;
        }

        .text-\[14px\] {
            font-size: 14px;
        }

        .text-\[15px\] {
            font-size: 15px;
        }

        .text-\[16px\] {
            font-size: 16px;
        }

        .text-\[17px\] {
            font-size: 17px;
        }

        .text-\[18px\] {
            font-size: 18px;
        }

        .text-\[19px\] {
            font-size: 19px;
        }

        .text-\[2\.5rem\] {
            font-size: 2.5rem;
        }

        .text-\[20px\] {
            font-size: 20px;
        }

        .text-\[23px\] {
            font-size: 23px;
        }

        .text-\[24px\] {
            font-size: 24px;
        }

        .text-\[25px\] {
            font-size: 25px;
        }

        .text-\[28px\] {
            font-size: 28px;
        }

        .text-\[30px\] {
            font-size: 30px;
        }

        .text-\[32px\] {
            font-size: 32px;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-extrabold {
            font-weight: 800;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-normal {
            font-weight: 400;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-thin {
            font-weight: 100;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .italic {
            font-style: italic;
        }

        .leading-6 {
            line-height: 1.5rem;
        }

        .leading-8 {
            line-height: 2rem;
        }

        .leading-9 {
            line-height: 2.25rem;
        }

        .leading-\[1\.5\] {
            line-height: 1.5;
        }

        .leading-\[1\] {
            line-height: 1;
        }

        .leading-\[20px\] {
            line-height: 20px;
        }

        .leading-\[24px\] {
            line-height: 24px;
        }

        .leading-\[25px\] {
            line-height: 25px;
        }

        .leading-\[45px\] {
            line-height: 45px;
        }

        .leading-loose {
            line-height: 2;
        }

        .leading-none {
            line-height: 1;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .leading-snug {
            line-height: 1.375;
        }

        .leading-tight {
            line-height: 1.25;
        }

        .tracking-tight {
            letter-spacing: -0.025em;
        }

        .tracking-wide {
            letter-spacing: 0.025em;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .text-\[\#000000\] {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity));
        }

        .text-\[\#0000EE\] {
            --tw-text-opacity: 1;
            color: rgb(0 0 238 / var(--tw-text-opacity));
        }

        .text-\[\#000\] {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity));
        }

        .text-\[\#002060\] {
            --tw-text-opacity: 1;
            color: rgb(0 32 96 / var(--tw-text-opacity));
        }

        .text-\[\#00216E\] {
            --tw-text-opacity: 1;
            color: rgb(0 33 110 / var(--tw-text-opacity));
        }

        .text-\[\#003054\] {
            --tw-text-opacity: 1;
            color: rgb(0 48 84 / var(--tw-text-opacity));
        }

        .text-\[\#03c503\] {
            --tw-text-opacity: 1;
            color: rgb(3 197 3 / var(--tw-text-opacity));
        }

        .text-\[\#0A1A56\] {
            --tw-text-opacity: 1;
            color: rgb(10 26 86 / var(--tw-text-opacity));
        }

        .text-\[\#0A66C2\] {
            --tw-text-opacity: 1;
            color: rgb(10 102 194 / var(--tw-text-opacity));
        }

        .text-\[\#0B1C39\] {
            --tw-text-opacity: 1;
            color: rgb(11 28 57 / var(--tw-text-opacity));
        }

        .text-\[\#0e0f0f\] {
            --tw-text-opacity: 1;
            color: rgb(14 15 15 / var(--tw-text-opacity));
        }

        .text-\[\#119B38\] {
            --tw-text-opacity: 1;
            color: rgb(17 155 56 / var(--tw-text-opacity));
        }

        .text-\[\#166df7\] {
            --tw-text-opacity: 1;
            color: rgb(22 109 247 / var(--tw-text-opacity));
        }

        .text-\[\#1877F2\] {
            --tw-text-opacity: 1;
            color: rgb(24 119 242 / var(--tw-text-opacity));
        }

        .text-\[\#19103d\] {
            --tw-text-opacity: 1;
            color: rgb(25 16 61 / var(--tw-text-opacity));
        }

        .text-\[\#1D3564BF\] {
            color: #1D3564BF;
        }

        .text-\[\#1D3564\] {
            --tw-text-opacity: 1;
            color: rgb(29 53 100 / var(--tw-text-opacity));
        }

        .text-\[\#1c1f2a\] {
            --tw-text-opacity: 1;
            color: rgb(28 31 42 / var(--tw-text-opacity));
        }

        .text-\[\#1d3564\] {
            --tw-text-opacity: 1;
            color: rgb(29 53 100 / var(--tw-text-opacity));
        }

        .text-\[\#242E69CC\] {
            color: #242E69CC;
        }

        .text-\[\#242E69\] {
            --tw-text-opacity: 1;
            color: rgb(36 46 105 / var(--tw-text-opacity));
        }

        .text-\[\#242e69\] {
            --tw-text-opacity: 1;
            color: rgb(36 46 105 / var(--tw-text-opacity));
        }

        .text-\[\#2f78ed\] {
            --tw-text-opacity: 1;
            color: rgb(47 120 237 / var(--tw-text-opacity));
        }

        .text-\[\#323232E5\] {
            color: #323232E5;
        }

        .text-\[\#323232\] {
            --tw-text-opacity: 1;
            color: rgb(50 50 50 / var(--tw-text-opacity));
        }

        .text-\[\#38f748\] {
            --tw-text-opacity: 1;
            color: rgb(56 247 72 / var(--tw-text-opacity));
        }

        .text-\[\#3F537B\] {
            --tw-text-opacity: 1;
            color: rgb(63 83 123 / var(--tw-text-opacity));
        }

        .text-\[\#424242\] {
            --tw-text-opacity: 1;
            color: rgb(66 66 66 / var(--tw-text-opacity));
        }

        .text-\[\#5a09b2\] {
            --tw-text-opacity: 1;
            color: rgb(90 9 178 / var(--tw-text-opacity));
        }

        .text-\[\#62641d\] {
            --tw-text-opacity: 1;
            color: rgb(98 100 29 / var(--tw-text-opacity));
        }

        .text-\[\#656565E5\] {
            color: #656565E5;
        }

        .text-\[\#656565\] {
            --tw-text-opacity: 1;
            color: rgb(101 101 101 / var(--tw-text-opacity));
        }

        .text-\[\#D24147\] {
            --tw-text-opacity: 1;
            color: rgb(210 65 71 / var(--tw-text-opacity));
        }

        .text-\[\#DB0C28\] {
            --tw-text-opacity: 1;
            color: rgb(219 12 40 / var(--tw-text-opacity));
        }

        .text-\[\#DB1F2A\] {
            --tw-text-opacity: 1;
            color: rgb(219 31 42 / var(--tw-text-opacity));
        }

        .text-\[\#DC2222\] {
            --tw-text-opacity: 1;
            color: rgb(220 34 34 / var(--tw-text-opacity));
        }

        .text-\[\#E4405F\] {
            --tw-text-opacity: 1;
            color: rgb(228 64 95 / var(--tw-text-opacity));
        }

        .text-\[\#FFFFFF99\] {
            color: #FFFFFF99;
        }

        .text-\[\#FFFFFFBF\] {
            color: #FFFFFFBF;
        }

        .text-\[\#FFFFFFCC\] {
            color: #FFFFFFCC;
        }

        .text-\[\#FFFFFFE5\] {
            color: #FFFFFFE5;
        }

        .text-\[\#FFFFFF\] {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-\[\#fff\] {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-\[\#ffff\] {
            color: #ffff;
        }

        .text-\[\#ffffff\] {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-black {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity));
        }

        .text-blue_bg {
            --tw-text-opacity: 1;
            color: rgb(36 46 105 / var(--tw-text-opacity));
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity));
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity));
        }

        .text-green-500 {
            --tw-text-opacity: 1;
            color: rgb(14 159 110 / var(--tw-text-opacity));
        }

        .text-green-700 {
            --tw-text-opacity: 1;
            color: rgb(4 108 78 / var(--tw-text-opacity));
        }

        .text-indigo-500 {
            --tw-text-opacity: 1;
            color: rgb(104 117 245 / var(--tw-text-opacity));
        }

        .text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(88 80 236 / var(--tw-text-opacity));
        }

        .text-indigo-700 {
            --tw-text-opacity: 1;
            color: rgb(81 69 205 / var(--tw-text-opacity));
        }

        .text-indigo-900 {
            --tw-text-opacity: 1;
            color: rgb(54 47 120 / var(--tw-text-opacity));
        }

        .text-nav_bg {
            --tw-text-opacity: 1;
            color: rgb(29 53 100 / var(--tw-text-opacity));
        }

        .text-orange-500 {
            --tw-text-opacity: 1;
            color: rgb(255 90 31 / var(--tw-text-opacity));
        }

        .text-pink-500 {
            --tw-text-opacity: 1;
            color: rgb(231 70 148 / var(--tw-text-opacity));
        }

        .text-purple-500 {
            --tw-text-opacity: 1;
            color: rgb(144 97 249 / var(--tw-text-opacity));
        }

        .text-red-500 {
            --tw-text-opacity: 1;
            color: rgb(240 82 82 / var(--tw-text-opacity));
        }

        .text-red-600 {
            --tw-text-opacity: 1;
            color: rgb(224 36 36 / var(--tw-text-opacity));
        }

        .text-red-700 {
            --tw-text-opacity: 1;
            color: rgb(200 30 30 / var(--tw-text-opacity));
        }

        .text-red_bg {
            --tw-text-opacity: 1;
            color: rgb(219 12 40 / var(--tw-text-opacity));
        }

        .text-slate-500 {
            --tw-text-opacity: 1;
            color: rgb(100 116 139 / var(--tw-text-opacity));
        }

        .text-slate-700 {
            --tw-text-opacity: 1;
            color: rgb(51 65 85 / var(--tw-text-opacity));
        }

        .text-slate-800 {
            --tw-text-opacity: 1;
            color: rgb(30 41 59 / var(--tw-text-opacity));
        }

        .text-slate-900 {
            --tw-text-opacity: 1;
            color: rgb(15 23 42 / var(--tw-text-opacity));
        }

        .text-transparent {
            color: transparent;
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-yellow-500 {
            --tw-text-opacity: 1;
            color: rgb(194 120 3 / var(--tw-text-opacity));
        }

        .underline {
            text-decoration-line: underline;
        }

        .no-underline {
            text-decoration-line: none;
        }

        .decoration-4 {
            text-decoration-thickness: 4px;
        }

        .placeholder-gray-400::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175 / var(--tw-placeholder-opacity));
        }

        .opacity-0 {
            opacity: 0;
        }

        .opacity-100 {
            opacity: 1;
        }

        .opacity-20 {
            opacity: 0.2;
        }

        .opacity-25 {
            opacity: 0.25;
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .opacity-60 {
            opacity: 0.6;
        }

        .opacity-70 {
            opacity: 0.7;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .opacity-80 {
            opacity: 0.8;
        }

        .opacity-90 {
            opacity: 0.9;
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-inner {
            --tw-shadow: inset 0 2px 4px 0 rgb(0 0 0 / 0.05);
            --tw-shadow-colored: inset 0 2px 4px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-lg {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-md {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-sm {
            --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-emerald-500\/40 {
            --tw-shadow-color: rgb(16 185 129 / 0.4);
            --tw-shadow: var(--tw-shadow-colored);
        }

        .ring-1 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-2 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-4 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-amber-100 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(254 243 199 / var(--tw-ring-opacity));
        }

        .ring-gray-200 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
        }

        .ring-green-100 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(222 247 236 / var(--tw-ring-opacity));
        }

        .ring-rose-100 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(255 228 230 / var(--tw-ring-opacity));
        }

        .ring-slate-100 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(241 245 249 / var(--tw-ring-opacity));
        }

        .ring-slate-200 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(226 232 240 / var(--tw-ring-opacity));
        }

        .ring-white\/30 {
            --tw-ring-color: rgb(255 255 255 / 0.3);
        }

        .blur-2xl {
            --tw-blur: blur(40px);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .blur-3xl {
            --tw-blur: blur(64px);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .blur-sm {
            --tw-blur: blur(4px);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .blur-xl {
            --tw-blur: blur(24px);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .drop-shadow-2xl {
            --tw-drop-shadow: drop-shadow(0 25px 25px rgb(0 0 0 / 0.15));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .drop-shadow-\[0_1px_2px_rgba\(0\2c 0\2c 0\2c \.4\)\] {
            --tw-drop-shadow: drop-shadow(0 1px 2px rgba(0, 0, 0, .4));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .drop-shadow-lg {
            --tw-drop-shadow: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .drop-shadow-md {
            --tw-drop-shadow: drop-shadow(0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .drop-shadow-sm {
            --tw-drop-shadow: drop-shadow(0 1px 1px rgb(0 0 0 / 0.05));
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .filter {
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .backdrop-blur {
            --tw-backdrop-blur: blur(8px);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .backdrop-blur-lg {
            --tw-backdrop-blur: blur(16px);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .backdrop-blur-md {
            --tw-backdrop-blur: blur(12px);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .backdrop-blur-sm {
            --tw-backdrop-blur: blur(4px);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .backdrop-blur-xl {
            --tw-backdrop-blur: blur(24px);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .backdrop-filter {
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .transition {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-colors {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-opacity {
            transition-property: opacity;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-shadow {
            transition-property: box-shadow;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-transform {
            transition-property: transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .delay-100 {
            transition-delay: 100ms;
        }

        .delay-200 {
            transition-delay: 200ms;
        }

        .duration-150 {
            transition-duration: 150ms;
        }

        .duration-200 {
            transition-duration: 200ms;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .duration-500 {
            transition-duration: 500ms;
        }

        .duration-700 {
            transition-duration: 700ms;
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .\[animation-delay\:-0\.15s\] {
            animation-delay: -0.15s;
        }

        .\[animation-delay\:-0\.3s\] {
            animation-delay: -0.3s;
        }

        input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        h1 {
            font-size: 1.875rem;
            line-height: 1.8em;
            color: #242D69;
        }

        /* 30px 3xl */
        h2 {
            font-size: 1.7rem;
            line-height: 1.8em;
            font-weight: 600 !important;
            color: #242D69
        }

        /* 24px 2xl */
        h3 {
            font-size: 1.25rem;
            line-height: 1.8em;
            font-weight: 600 !important;
            color: #242D69
        }

        /* 20px xl */
        h4 {
            font-size: 1.125rem;
            line-height: 1.8em;
            font-weight: 600 !important;
            color: #242D69
        }

        /* 18px text-lg */
        h5 {
            font-size: 1.5rem;
            line-height: 1.8em;
            font-weight: 600 !important;
            color: #242D69
        }

        /* 16px text-base */
        h6 {
            font-size: 0.875rem;
            line-height: 1.8em;
            font-weight: 600 !important;
            color: #242D69
        }

        /* 14px text-sm */

        body {
            overflow-x: hidden !important;
        }

        .left-arrow {
            user-select: none;
        }

        .rank-math-list-item {
            margin-top: 1rem;
        }

        .course-item:hover {
            background-color: white;
            color: #1d3564;
            font-weight: 600;
        }

        .phone-input-container {
            display: flex;
            align-items: center;
        }

        a {
            color: #319cee;
        }

        .phone-input {
            flex: 1;
            padding-left: 50px;
        }

        .phone-input-button {
            position: absolute;
            z-index: 1;
        }

        .phone-input-container input {
            padding-left: 40px;
        }


        .footerimg {
            opacity: 0;
            transform: translateY(100px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .footerimg.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (min-width: 1025px) {
            .footerimg {
                background-image: url("/images/footer-img-upd.svg");
            }
        }


        @media (min-width: 1024px) and (max-width: 1366px) and (orientation: portrait) {


            .res-bnr {
                height: auto !important;
            }

            .left-sec-gra {
                padding: 4rem !important;
            }

        }


        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {


            .res-bnr {
                height: auto !important;
            }


            .left-sec-gra {
                padding: 4rem !important;
            }


            .ipad-btn {
                margin-left: 5px;
                margin-right: 5px;
            }

            .popupshareside {
                left: calc(89% - 138px) !important;
            }

            .space-career {
                width: auto !important;
            }

            .space-top {
                width: auto !important;
            }

            .-space {
                margin-top: 1rem;
            }


        }

        @media (min-width: 768px) and (max-width: 1024px) {


            .res-bnr {
                height: auto !important;
            }

            .evt-btn {
                padding-top: 9px !important;
                padding-bottom: 9px !important;
            }

            .office-ad {
                padding-left: 2rem;
            }

            .i-pad {
                min-height: 318px;
            }

            .popup {
                margin-top: 3rem;
                left: calc(11% - -212px) !important;
            }

            .footerimg {
                background-image: url("/images/footer-img-upd.svg");
                background-position: bottom;
            }
        }

        .hide-dp {
            display: none;
        }

        .hide-mb {
            display: block;
            margin-top: 5.5rem;

        }

        @media (max-width: 767px) {

            .res-bnr {
                height: auto !important;
            }

            .text-40 {
                font-size: 30px !important;
            }

            .left-sec-gra {
                padding: 2rem !important;
            }

            .rgt-icon {
                position: unset !important;
                width: 100% !important;
            }

            .ent-dtl .popupshareside {
                top: auto !important;
            }


            .log-slide {
                height: 40px !important;
            }

            .img-user {
                width: 100%;
            }

            .hide-mb {
                display: none;
            }

            .hide-dp {
                display: block;
            }

            .sub-heading {
                margin-right: 1rem;
            }

            .subftr-mob {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .ftr-mob {
                padding-left: 0.2rem;
                padding-right: 0rem;
            }

            .space-mob {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }

            .mob-right {
                margin-right: 1.2rem;
            }

            .share-btn .popupshareside {
                top: 357px !important;
            }

            .hide-mob {
                display: none !important;
            }


            .office-ad {
                padding-left: 2rem;
            }


            .thumbnail-container {
                padding-top: 90.78% !important;
            }

            .gap-mob {
                margin-top: 0.5rem;
            }

            .mob-btn {
                display: none !important;
            }

            .mobile-hidden {
                display: none !important;
            }

            .side-main {
                margin: 10px 10px 0 10px !important;
            }

            .popup {
                margin-top: 5rem;
                left: calc(-28% - -203px) !important;
                right: 20%;
            }

            .popupshareside {
                left: calc(62% - 138px) !important;
            }

            .footerimg {
                background-image: url("https://mie-global-te43fd.s3.amazonaws.com/static/images/footer-mobile-bg-new.original.png");
            }
        }


        @media (min-width: 768px) {
            .bannerimg {
                background-image: url("https://mie-global-te43fd.s3.amazonaws.com/static/images/updated-desktop-29072024.original.png");
            }
        }

        @media (max-width: 767px) {
            .bannerimg {
                height: 550px;
                background-image: url("https://mie-global-te43fd.s3.amazonaws.com/static/images/updated-desktop-29072024.original.png") !important;
            }
        }


        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-in-out;
        }

        .delay-1 {
            animation-delay: 0.5s;
        }

        .delay-2 {
            animation-delay: 1s;
        }

        .delay-3 {
            animation-delay: 1.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .hover\:scale-110:hover {
            transform: scale(1.1);
        }

        .transition-transform {
            transition-property: transform;
        }

        .duration-300 {
            transition-duration: 300ms;
        }



        @media screen and (max-width: 1400px) {


            .font-responsive {
                font-size: 13px;
            }

            .space-career {
                width: 1185px;
            }

            .space-top {
                width: 1077px !important;
            }

            .left-arrow {
                right: 2rem;
            }

            .swiper-button-nxt {
                left: 2rem;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

            .ipdpro {
                width: 18rem !important;
            }

            .img-user {
                width: 95%;
            }

            .mb-jry {
                margin-top: 2.5rem !important;
            }

            .hide-mb {
                margin-top: 5.5rem;
            }

            .space-top {
                width: auto !important;
            }

            .hide-ipad {
                display: none;
            }

            .share-btn .popupshareside {
                top: 610px !important;
                margin-left: 20px;
            }

            .swiper {
                top: 0rem;
            }


        }


        @media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {

            .ent-detal .popupshareside {
                left: calc(32% - 145px) !important;
                margin-top: -30px !important;
                margin-left: 50px !important;
            }

            .val-img {
                width: 100%;
            }

            .img-user {
                width: 95%;
            }

            .mb-jry {
                margin-top: 2.5rem !important;
            }

            .hide-mb {
                margin-top: 9.8rem;
            }

            .ipad-gap {
                padding-left: 34px;
                padding-bottom: 100px;
            }

            .ipad-space {
                padding-left: 33px;
                padding-right: 33px;
            }

            .swiper-button-prv {
                display: none !important;
            }

            .swiper-button-nxt {
                display: none !important;
            }

            .subftr-mob {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .ftr-mob {
                padding-left: 0.8rem;
                padding-right: 0.8rem;
            }

            .space-mob {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }


            /* .swiper{
                top: -5rem;
              } */

            .share-btn .popupshareside {
                top: 357px !important;
                margin-left: 5px;
            }

            .text-ipad {
                font-size: 13px;
            }

            .hide-ipad {
                display: none;
            }

            .ipd-sec {
                position: relative;
            }

            .ipd-rmv {
                position: absolute;
                top: -45px;
                left: -57px;
            }

            .ipad-cls {
                top: -5px;
                right: 4px;
            }



            .popupshareside {
                left: calc(32% - -265px) !important;
            }

            .ipad_hidden {
                display: none !important;
            }
        }


        @media screen and (min-width: 1329px) and (max-width: 1371px) {
            .font-responsive {
                font-size: 14px;
            }

            .spac {
                width: 1284px;
            }
        }



        @media only screen and (min-device-width: 1024px) and (max-device-width: 1366px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2) {

            .count-ipad-pak {
                line-height: 50px !important;
            }

            .ent-detal .popupshareside {
                left: calc(32% - 205px) !important;
            }

            .hide-mb {
                margin-top: 5.4rem;
            }

            .share-btn .popupshareside {
                margin-top: 204px !important;
                right: 40px !important;
            }

            .ipad-btn {
                margin-left: 5px;
                margin-right: 5px;
            }

            .bannerimg {
                background-image: url(https://mie-global-te43fd.s3.amazonaws.com/static/images/updated-desktop-29072024.original.png);
                height: 590px;
            }

            .popupshareside {
                left: calc(49% - -265px) !important;
            }

            .space-top {
                width: auto !important;
            }

            .space-career {
                width: auto !important;
            }

            .review {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .ipad_hidden {
                display: none !important;
            }

            .count-ipad {
                font-size: 35px !important;
                line-height: 50px !important;
            }

            .space-left {
                padding-left: 4rem !important;
            }

            .text-ipadpro {
                font-size: 17px !important;
            }


        }


        @media only screen and (min-device-width: 834px) and (max-device-width: 1194px) and (orientation: landscape) {

            .count-ipad-pak {
                line-height: 50px !important;
            }

            .bannerimg {
                background-image: url(https://mie-global-te43fd.s3.amazonaws.com/static/images/updated-desktop-29072024.original.png);
                height: 590px;
            }

            .ipad_hidden {
                display: none !important;
            }

            .review {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .count-ipad {
                font-size: 35px !important;
                line-height: 50px !important;
            }

            .space-left {
                padding-left: 4rem !important;
            }

            .text-ipadpro {
                font-size: 17px !important;
            }

        }

        @media screen and (min-width: 1025px) and (max-width: 1280px) {
            .ipad {
                margin-top: 1rem !important;
            }
        }

        @media (min-width: 1024px) and (max-width: 1366px) and (orientation: portrait) {
            .popup {
                margin-top: 1rem;
                left: calc(23% - -212px) !important;
            }

            .ipad {
                margin-top: 1.5rem !important;
            }

            @media (min-width: 1024px) and (max-width: 768px) and (orientation: portrait) {

                .ipad_hidden {
                    display: none !important;
                }

                .popupshareside {
                    left: calc(51% - -271px) !important;
                }
            }

            .popupshareside {
                left: calc(52% - -261px);
            }
        }



        .consultation::placeholder {
            color: #3f537b;
            font-size: 16px;
            font-weight: 500;
        }




        @media (min-width: 1024px) {
            .footerimg {
                background-position: top;
            }

            .width-responsiveness {
                width: 65rem !important;
            }

            .width-card {
                width: 350px;
            }

            td>a.py-2.px-6.bg-red-700.hover\:bg-\[\#1D3564\].transition.rounded-full.text-white.font-semibold {
                text-wrap: nowrap;
            }
        }


        @media (min-width: 768px) and (max-width: 1025px) {


            .ipad-pt {
                padding-top: 100px !important;
            }


            .h-ipad {
                min-height: 475px !important;
            }

            .jrp {
                margin: 0 !important;
            }

            .mb-jry {
                margin-top: 2.5rem !important;
            }

            .acco {
                max-width: 47%;
            }

            .width-responsiveness {
                width: 58rem !important;
            }

            .tst {
                max-width: 48% !important;
            }

            .res {
                top: 4.5em;
            }

            .ppc {
                border-radius: 0%;
            }

            td>a.py-2.px-6.bg-red-700.hover\:bg-\[\#1D3564\].transition.rounded-full.text-white.font-semibold {
                text-wrap: nowrap;
            }
        }

        @media (min-width: 425px) and (max-width: 769px) {

            .team {
                margin-top: 1rem;
            }

            .jrp {
                margin: 0 !important;
            }

            .mb-jry {
                margin-top: 2.5rem !important;
            }

            .acco {
                max-width: 100% !important;
            }

            .width-responsiveness {
                width: 45rem !important;
            }

            .res {
                top: 4.5em;
            }

            .ppc {
                border-radius: 0%;
            }

            .ppc h2 {
                font-size: 15px;
            }

            .arw {
                display: none;
            }

            .tst {
                max-width: 100% !important;
            }
        }

        /* For screens 425px and smaller */
        @media (max-width: 425px) {
            .team {
                width: auto !important;
                margin-left: 0 !important;
                margin-top: 1rem;
            }

            .jrp {
                margin: 0 !important;
            }

            .acco {
                max-width: 100% !important;
            }

            .tst {
                max-width: 100% !important;
            }

            .width-responsiveness {
                width: 16rem !important;
            }

            .res {
                top: 4.4em;
            }

            .ppc {
                border-radius: 0%;
            }

            .ppc h2 {
                font-size: 15px;
            }

            .arw {
                display: none;
            }

            td>a.py-2.px-6.bg-red-700.hover\:bg-\[\#1D3564\].transition.rounded-full.text-white.font-semibold {
                text-wrap: nowrap;
            }

            .valid-erro {
                margin-top: 3.25rem !important;
            }

            iframe {
                width: 100% !important;
            }

            .mobile-imgg {
                height: 100% !important;
            }
        }

        .testimonial-bg {
            background-image: url("/images/bg-image[1].png");
            background-repeat: no-repeat;
            background-position: center;
        }

        .leading-relaxed {
            list-style: disc !important;
        }

        .svg-cap {
            width: 40px !important;
        }

        .word {
            background: #efefef75;
            color: #15155e;
            border-radius: 5px;
            padding: 10px;
        }

        .tst {
            max-width: 48%;
        }

        .acco {
            max-width: 47%;
        }

        .team {
            width: 230px;
        }

        .jrp {
            margin-left: 2.5rem;
            margin-right: 2.5rem;
        }

        .custom-hover:hover {
            border-color: #2563eb;
        }

        .hours-bg {
            padding: 0.5rem;
            padding-left: 2.5rem;
        }

        .hours {
            background: #e5e5e5;
            padding: 0.5rem;
            padding-left: 2.5rem;
        }

        /* media query for navbar sticky only on desktop */
        @media screen and (min-width: 1280px) {
            .sticky-navbar-class {
                position: -webkit-sticky;
                position: fixed;
                top: 0;
                z-index: 500;
                background-color: white;
                width: 100vw;
                margin-bottom: 5rem;
            }
        }

        /* Full Parallax Slider */
        .creative-parallax--slider .f-slider-layer {
            position: relative;
        }

        .creative-parallax--slider .swiper-slide.swiper-slide-active:before {
            content: "";
            width: 475px;
            height: 100%;
            position: absolute;
            top: 0;
            right: 3%;
            transform: translateX(-50%) skew(-20deg, 0deg);
            z-index: 1;
            opacity: 0.4;
            background-color: #242e69;
            animation-name: fadeInTwo;
            animation-duration: 2.3s;
            animation-delay: 0s;
        }

        .creative-parallax--slider .f-slider-layer img {
            width: 100%;
            height: 60vh;
            vertical-align: middle;
        }

        .creative-parallax--slider .f-slider-layer:before {
            content: "";
            background: #000;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.5;
        }

        .creative-parallax--slider .f-slider-layer:after {
            background-color: #242e69;
            content: "";
            width: 280px;
            height: 540px;
            position: absolute;
            top: 60%;
            right: 1.5%;
            transform: translate(-50%, -50%) skew(-20deg, 0deg);
            z-index: 1;
        }

        .creative-parallax--slider .swiper-slide-active .f-slider-layer:after {
            animation-name: fadeInThree;
            animation-duration: 2.3s;
            animation-delay: 0s;
        }

        .creative-parallax--slider .f-slider-layer .f-slider-one-data {
            position: absolute;
            top: 60%;
            transform: translateY(-50%);
            left: 16%;
            width: 40%;
            z-index: 9;
        }

        .creative-parallax--slider .f-slider-one-data h1 {
            font-size: 67px;
            line-height: 87px;
            color: #fff;
            margin-bottom: 10px;
            margin-top: 0px;
            opacity: 0;
        }

        .creative-parallax--slider .swiper-slide-active .f-slider-one-data h1 {
            transition: opacity 0.5s ease, filter 0.5s ease;
            animation: fadeInUp 1s ease forwards;
            animation-delay: 1s;
        }

        .f-slider-layer .f-slider-one-data p {
            font-size: 20px;
            line-height: 30px;
            color: #fff;
            margin-bottom: 15px;
            width: 95%;
            font-weight: 400;
            opacity: 0;
        }

        .swiper-slide-active .f-slider-layer .f-slider-one-data p {
            transition: opacity 0.5s ease, filter 0.5s ease;
            animation: fadeInUp 1s ease forwards;
            animation-delay: 1.5s;
        }

        .f-slider-layer .slide-btn {
            text-decoration: none;
            background-color: #242e69;
            padding: 18px 70px 18px 50px;
            font-size: 16px;
            font-family: Epilogue, sans-serif;
            color: #000;
            display: inline-flex;
            position: relative;
            border: 2px solid #242e69;
            font-weight: 700;
            transition: 0.3s ease-in-out;
            opacity: 0;
        }

        .swiper-slide-active .f-slider-layer .slide-btn {
            transition: opacity 0.5s ease, filter 0.5s ease;
            animation: fadeInUp 1s ease forwards;
            animation-delay: 2s;
        }

        .f-slider-layer .slide-btn:hover {
            background-color: transparent;
            color: #fff;
        }

        .f-slider-layer .slide-btn:after {
            content: "";
            width: 30px;
            height: 100%;
            position: absolute;
            top: -2px;
            right: -32px;
            background: transparent;
            border-left: 0 solid transparent;
            border-right: 30px solid transparent;
            border-top: 65px solid #242e69;
        }

        .f-slider-layer .slide-btn i {
            width: 40px;
            height: 100%;
            position: absolute;
            top: 0;
            right: -14px;
            z-index: 1;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: 0.5s ease-in-out;
        }

        .f-slider-layer .slide-btn:hover i {
            color: #000;
            width: 45px;
        }

        .f-slider-layer .slide-btn i:after {
            content: "";
            background: #000;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: -1;
            transform: skew(-24deg, 0deg);
            transition: 0.5s ease-in-out;
        }

        .f-slider-layer .slide-btn:hover i:after {
            background-color: #242e69;
        }

        .swiper-nav {
            position: absolute;
            bottom: 10%;
            right: 0;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .swiper-nav button {
            width: 80px;
            height: 115px;
            background: transparent;
            color: #fff;
            border: 0;
            position: relative;
            z-index: 0;
            border-color: #242e69;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }

        .swiper-nav button:first-child {
            margin-right: 10px;
        }

        .swiper-nav button:before {
            content: "";
            width: 100%;
            height: 100%;
            background: #000;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            border: 2px solid;
            transform: skew(-23deg, 0deg);
            border-color: #242e69;
        }

        .swiper-nav button:hover:before {
            border-color: #c1c1c1;
        }

        @keyframes fadeInThree {
            0% {
                opacity: 0;
            }

            40% {
                opacity: 0.2;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(100px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInTwo {
            0% {
                opacity: 0;
                transform: translateX(-50%) skew(-20deg, 0deg);
            }

            40% {
                opacity: 0;
                transform: translateX(-30%) skew(-20deg, 0deg);
            }

            100% {
                opacity: 0.4;
                transform: translateX(-50%) skew(-20deg, 0deg);
            }
        }

        /* ===================== RESPONSIVE IPAD PRO ============================= */
        @media (max-width: 1366px) {
            .creative-parallax--slider .f-slider-layer .f-slider-one-data {
                width: 60%;
                left: 5%;
                top: 50%;
            }

            .creative-parallax--slider .swiper-slide.swiper-slide-active:before {
                width: 265px;
            }

            .creative-parallax--slider .f-slider-layer:after {
                width: 185px;
                height: 75%;
                right: 6.5%;
                top: 50%;
            }

            .creative-parallax--slider .f-slider-one-data h1 {
                font-size: 50px;
                line-height: 60px;
            }
        }

        /* ===================== RESPONSIVE IPAD ============================= */
        @media (max-width: 992px) {

            .ipad-btn {
                margin-left: 5px;
                margin-right: 5px;
            }

            .count {
                margin-right: 2rem;
            }

            .side-main {
                margin: 10px 10px 0 10px !important;
            }

            .space-top {
                width: auto !important;
            }

            .space-career {
                width: auto;
            }

            .space-top {
                width: auto;
            }

            .bannerimg {
                background-image: url(https://mie-global-te43fd.s3.amazonaws.com/static/images/updated-desktop-29072024.original.png);
            }

            .creative-parallax--slider .f-slider-layer .f-slider-one-data {
                width: 65%;
            }

            .creative-parallax--slider .f-slider-one-data h1 {
                font-size: 50px;
                line-height: 60px;
            }
        }

        /* ===================== RESPONSIVE IPAD ============================= */
        @media (max-width: 767px) {

            h1 {
                font-size: 1.5rem;
            }

            .gap-bottom {
                margin-bottom: 0.5rem;
            }

            .align-right {
                float: right !important;
            }

            .space-top {
                width: auto !important;
            }

            .space-career {
                width: auto;
            }

            .space-top {
                width: auto;
                max-width: auto !important;
            }

            .space {
                margin: 0 !important;
            }

            .main-sec {
                margin-top: -1rem;
            }

            .creative-parallax--slider .f-slider-layer .f-slider-one-data {
                width: 90%;
                top: 40%;
                text-align: center;
            }

            .creative-parallax--slider .f-slider-one-data h1 {
                font-size: 30px;
                line-height: 40px;
            }

            .f-slider-layer .f-slider-one-data p {
                font-size: 15px;
                line-height: 25px;
            }

            .creative-parallax--slider .swiper-slide.swiper-slide-active:before {
                right: -100%;
            }

            .creative-parallax--slider .f-slider-layer:after {
                display: none;
            }

            .f-slider-layer .slide-btn {
                padding: 13px 55px 13px 25px;
            }

            .swiper-nav {
                left: 50%;
                transform: translate(-50%, -50%);
                right: unset;
                bottom: 2%;
            }

            .swiper-nav button {
                width: 50px;
                height: 50px;
                border-width: 1px;
                transform: unset;
            }

            .swiper-nav button:before {
                transform: unset;
            }
        }

        /* register and free consultancy form popup z-index class */
        .z-prop {
            position: fixed !important;
            top: 0 !important;
            z-index: 700 !important;
            background-color: white;
        }

        .react-slideshow-container .nav:first-of-type {
            display: none;
        }

        .react-slideshow-container .nav:last-of-type {
            display: none;
        }

        .apply-now-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(94.18deg, #00216E 0%, #DB0C28 100%);
            border-radius: 0.375rem;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            position: relative;
            z-index: 1;
            transition: color 0.5s;
        }

        .apply-now-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.5s;
            z-index: -1;
            transform: translateX(-100%);
        }

        .apply-now-btn:hover {
            color: white;
        }


        .overflow-class {
            overflow-x: hidden !important;
        }

        @media (max-width: 767px) {

            .who-sli .slick-dots {
                bottom: 6px !important;
            }

            .mb-jry {
                margin-top: 2.5rem !important;
            }

            .mobile-view {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .mobile-img {
                width: 100%;
                height: auto;
                float: none;
            }

            .mobile-text {
                margin-top: 10px;
            }

            .mob-class {
                display: block;
            }

            .mob-para {
                margin-top: 15px;
            }

            .share-btn .share-mr {
                margin-right: 1rem;
            }

        }

        .cls {
            z-index: 999;
        }

        /* Share button popup */
        .popup {
            font-size: 10px;
            position: absolute;
            top: 60px;
            left: calc(50% - -212px);
            display: flex;
            justify-content: space-around;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .popup a {
            margin: 0 10px;
        }

        .popup a:hover {
            transform: scale(1.1);
            transition: transform 0.2s;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .ml {
            margin-left: 2rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .bg-white {
            background-color: white;
        }

        .border {
            border-width: 1px;
        }

        .rounded {
            border-radius: 0.375rem;
        }

        .text-red_bg {
            color: #ff0000;
        }

        .text-md {
            font-size: 1rem;
        }

        .border-red_bg {
            border-color: #ff0000;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .w-auto {
            width: auto;
        }

        .h-auto {
            height: auto;
        }

        .ml {
            margin-left: 0.5rem;
        }

        .xl\\:mt-0 {
            margin-top: 0;
        }

        /* sharebutton side */
        .popupshareside {
            font-size: 10px;
            position: absolute;
            top: 429px;
            left: calc(50% - -265px);
            display: flex;
            justify-content: space-around;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            margin-top: -47px;
            margin-left: 112px;
        }

        @media (min-width: 916px) and (max-width: 1024px) {
            .popupshareside {
                margin-top: -47px;
                margin-left: -150px;
                position: absolute;
                right: 20px;
            }
        }

        @media screen and (max-width: 915px) {
            .popupshareside {
                margin-top: 18px;
                margin-left: 50px;

            }
        }

        .popupshareside a {
            margin: 0 10px;
        }

        .popupshareside a:hover {
            transform: scale(1.1);
            transition: transform 0.2s;
        }

        /* Share button blog */
        .popupBtnshareside {
            font-size: 10px;
            position: absolute;
            display: flex;
            justify-content: space-around;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            margin-top: -47px;
            margin-left: 112px;
        }

        @media (min-width: 916px) and (max-width: 1024px) {
            .popupBtnshareside {
                margin-top: -47px;
                margin-left: -150px;
                position: absolute;
                right: 20px;
            }
        }

        @media screen and (max-width: 915px) {
            .popupBtnshareside {
                margin-top: -48px;
                margin-left: 111px;

            }
        }

        .popupBtnshareside a {
            margin: 0 10px;
        }

        .popupBtnshareside a:hover {
            transform: scale(1.1);
            transition: transform 0.2s;
        }




        .xz74otr {
            float: left;
            padding-top: 5px;
        }

        .align-center {
            display: ruby;
        }

        .space {
            margin-left: 6rem !important;
            margin-right: 6rem !important;
        }

        .space-top {
            width: 1220px;
        }

        .swiper-pagination-banner {
            display: flex;
            justify-content: left;
            align-items: center;
            position: relative !important;
            left: 0rem;
            bottom: 10px;
            width: 100%;
            z-index: 10;
            margin-top: 1rem !important;

        }

        .swiper-pagination-banner .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background-color: #b5b6ff;
            border-radius: 50%;
            margin: 0 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            opacity: 1;

        }

        .swiper-pagination-banner .swiper-pagination-bullet-active {
            background-color: #003054;
            transition: smooth;
            width: 14px;
            height: 14px;
        }

        .swiper-pagination-banner .swiper-pagination-clickable .swiper-pagination-bullet:hover {
            background-color: #003054;
        }

        .swiper-pagination-banner .swiper-pagination-horizontal {
            flex-direction: row;
        }


        /* mobile pagination homepage banner css */
        .swiper-pagination-banner-mobile {
            display: flex;
            justify-content: left;
            align-items: center;
            position: relative !important;
            left: 0rem;
            bottom: 10px;
            width: 100%;
            z-index: 10;
            margin-top: 1rem !important;

        }

        .swiper-pagination-banner-mobile .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background-color: #b5b6ff;
            border-radius: 50%;
            margin: 0 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            opacity: 1;

        }

        .swiper-pagination-banner-mobile .swiper-pagination-bullet-active {
            background-color: #003054;
            transition: smooth;
            width: 14px;
            height: 14px;
        }

        .swiper-pagination-banner-mobile .swiper-pagination-clickable .swiper-pagination-bullet:hover {
            background-color: #003054;
        }

        .swiper-pagination-banner-mobile .swiper-pagination-horizontal {
            flex-direction: row;
        }

        .swiper-pagination-testVideo {
            position: relative !important;
            margin-top: 3rem;
            left: 50% !important;
            transform: translateX(-50%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .swiper-pagination-testVideo .swiper-pagination-bullet {
            width: 10px !important;
            height: 10px !important;
            background: rgb(255, 255, 255) !important;
            opacity: 1 !important;
            transition: transform 0.3s ease !important;
            border: 1px solid #0077ff !important;
        }

        .swiper-pagination-testVideo .swiper-pagination-bullet-active {
            /* background: #0077ff !important; */
            background: linear-gradient(94.18deg, #00216E 0%, #DB0C28 100%) !important;
            transition: smooth !important;
            width: 14px !important;
            height: 14px !important;
        }

        .bg-gradient {
            background: linear-gradient(94.18deg, #00216E 0%, #DB0C28 100%);
        }

        .side-bar {
            border: 1px solid #d1d5db;
            padding: 10px 10px 0px 10px;
            border-radius: 5px;
        }

        .side-check:hover {
            background-color: #f9fafb;
            padding: 5px 5px 5px 7px;
        }

        .side-check {
            padding: 5px 5px 5px 7px;
        }

        .side-main {
            margin: 31px 10px 0 10px;
        }

        /* courses detail mobile */





        @media (max-width: 1025px) {
            .mob-hidden {
                display: none;
            }

            .banner {

                height: 200px;
                background-image: url('/images/Rectangle_379.png') !important;
            }
        }


        .act-text {
            color: #fff !important;
        }



        /* end */

        /* feedback */

        .feedback-button {
            position: fixed;
            left: 0;
            top: 45%;
            background-color: #ffeb3b;
            color: white;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px 0px 0px 5px;
            z-index: 1000;
            font-size: 16px;
            writing-mode: tb-rl;
            transform: rotate(-180deg);
            text-orientation: mixed;
            transition: left 0.3s, background-color 0.3s;
            display: flex;
            align-items: center;
        }

        .button-icon-container {
            display: inline-flex;
            align-items: center;
            transform: rotate(-180deg);
        }

        .button-icon {
            width: 16px;
            height: 24px;
        }

        .feedback-button.open {
            left: 300px;
        }

        .feedback-modal {
            position: fixed;
            top: 50%;
            left: -300px;
            transform: translateY(-50%);
            height: auto;
            width: 300px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: left 0.3s;
            z-index: 999;
            border-radius: 0 5px 5px 0;
        }

        .feedback-modal.open {
            left: 0;
        }

        .feedback-form h2 {
            font-size: 0.75em;
            font-weight: bold !important;
            text-align: center;
            padding: 12px;
            margin: 0;
            line-height: 1.0625 !important;
            min-height: 17px;
            word-break: break-word;
            word-wrap: break-word;
        }

        .feedback-form .emotions {
            display: flex;
            justify-content: space-around;
            margin: 10px 0;
        }

        .emotion-button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s, color 0.2s;
            color: #ffc107;
        }

        .emotion-button:hover {
            transform: scale(1.2);
        }

        .emotion-button.selected {
            color: #ffeb3b;
        }

        .feedback-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            background-color: #fff9c4;
        }

        .submit-button {
            background-color: #fbc02d;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #f57f17;
        }

        .emotion-icon {
            font-size: 24px;
        }

        .label-emo {
            font-size: 0.575em;
            line-height: 1.25em;
            color: rgba(0, 0, 0, 0.6);

            text-align: center;
        }

        .close-buttonn {
            font-size: 14px !important;
            font-weight: 500 !important;
            padding: 6px 16px !important;
            background: #ddd;
            position: relative;
            left: 35%;
        }

        .text-smm {
            font-size: 0.675rem;
            line-height: 1.25rem;
        }


        /* end */
        /* Enquiry now button */
        @media (max-width: 822px) {
            .enquire-button {
                padding: 0.554rem 0.75rem !important;
                font-size: 12px !important;
                width: 100% !important;
                text-align: center !important;
                margin-left: 0 !important;
            }

            .-mob {
                font-size: 12px;
                margin-left: 0;
                font-size: x-small;
            }

            .-mob img {
                width: 18px;
                height: 18px;
            }

            .-mob-btn {
                padding: 0.454rem 0.75rem !important;
            }


        }

        /*Color for feedback emogis */

        .emotion-icon {
            font-size: 24px;

            transition: color 0.3s ease;
        }

        .selected-happy .emotion-icon {
            color: green !important;
        }

        .selected-neutral .emotion-icon {
            color: rgb(245, 242, 82) !important;
        }

        .selected-sad .emotion-icon {
            color: red !important;
        }


        .fade-video {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .shadow-fade::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(234, 242, 247, 1) 20%, rgba(255, 255, 255, 0) 60%);

            z-index: -1;
        }


        .shadow-fade-mobile::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 0%, rgba(234, 242, 247, 1) 30%, rgba(255, 255, 255, 0) 70%)
        }


        .placeholder::placeholder {
            font-size: 1.13rem;
            font-weight: 500;
        }

        .popular-courses-button {
            transition: 0.3s;
            box-shadow: 0px 12px 10px 3px rgba(0, 0, 0, 0.5);

        }

        .popular-courses-button:hover {
            opacity: .7;
        }

        /* office-accordion */

        .accordion-checkbox {
            display: none;
        }

        .accordion-summary {
            cursor: pointer;
            padding: 1rem;
            background-color: #f0f0f0;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accordion-content {
            padding: 1rem;
            display: none;
        }

        .accordion-checkbox:checked+.accordion-summary+.accordion-content {
            display: block;
        }

        .accordion-icon {
            transition: transform 0.3s ease;
        }

        .accordion-checkbox:checked+.accordion-summary .accordion-icon {
            transform: rotate(180deg);
        }


        /* end */



        .student-bank {
            min-height: 265px;
        }

        /* Event slider */
        .swiperContainer {
            width: 100%;
            height: 250px;
        }

        .image-event {
            width: 90%;
            height: 70%;
            object-fit: cover;
            border-radius: 10px;
        }

        @media (max-width: 915px) {
            .swiperContainer {
                height: 200px;
            }

            .image-event {
                /* width: 100%; */
                height: 40%;
            }
        }

        /* AHZ event text and banner */
        .ahz-events-text {
            margin-bottom: 1rem;
        }

        @media (min-width: 1024px) {
            .ahz-events-text {
                margin-bottom: 1.5rem;
            }

            .padding-slide {
                padding: 0 50px !important;
            }
        }

        @media (min-width: 1280px) {
            .ahz-events-text {
                margin-bottom: 0;
            }
        }

        .shadow-top {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 -4px 8px rgba(0, 0, 0, 0.2);
        }


        @media (max-width: 767px) {
            .enquire-button {
                font-size: 10px !important;
            }

            .h-arrow {
                display: none;
            }
        }

        .popupShareOffices {
            font-size: 10px;
            position: absolute;
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            margin-top: -46px;
            margin-left: 120px;
        }

        @media (max-width: 767px) {
            .popupShareOffices {
                left: calc(-41% - -171px);
            }

            .mob-uni {
                width: 213px !important;
            }

            .mob-txt {
                text-align: center;
            }

            .g-mob {
                display: none;
            }
        }



        @media(max-width: 1024px) {

            .rgt-icon {
                position: unset !important;
                width: 100% !important;
            }


            .ipadair {
                margin-left: -9px;
                width: 100%;
            }
        }

        .border-b-8 {
            border-bottom-width: 4px !important;
        }




        .swiper-container {
            padding: 0 10px;
        }

        .testimonial-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem;
            position: relative;
            min-height: 400px;
            overflow: hidden;
        }

        .text {
            margin-bottom: 60px;
        }

        .text-content {
            font-size: 16px;
            line-height: 1.6;
            max-height: 125px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: max-height 0.3s ease;
        }

        .text-content.expanded {
            max-height: none;
        }

        .abt-f {
            border-radius: 0 !important;
        }

        .footer {
            background-color: #F4F4F4;
            height: 140px;
            border-radius: 0 0 10px 10px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .image {
            background-color: tomato;
            height: 120px;
            width: 120px;
            border-radius: 50%;
            border: 5px solid white;
            background: no-repeat center/cover;
            position: absolute;
            top: -45%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
        }

        .image-content {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .person {
            font-size: 1rem;
            font-weight: 600;
            margin-top: 40px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }



        .career img {
            height: 350px !important;
        }

        .shadow-custom-lg,
        .shadow-custom-md {
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-custom-lg {
            --tw-shadow: 0 0 55px -3px #1018281a, 0 8px 7px -4px #1018281a;
            --tw-shadow-colored: 0 0 15px -3px var(--tw-shadow-color), 0 8px 7px -4px var(--tw-shadow-color);
        }

        .bg-white {
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .bg-neutral-5 {
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .share-btn .popupshareside {
            top: 400px;
        }


        .plc input::placeholder {
            font-weight: 500;
            letter-spacing: 0.7px;
        }

        ul {

            list-style: disc;
            padding: 0.75rem;

        }

        ol {
            list-style-type: decimal;
            /* Changes numbers to Roman numerals */
            padding: 0.75rem;
        }

        .ul-class {
            list-style: none;

        }

        table tr td {
            border: 1px solid #E5E7EB;
        }

        .toc-item.h1 {
            font-weight: bold;
            margin-left: 0;
        }


        .tracking-wide {
            color: #fff;
        }

        .glb {
            color: #fff;
        }

        .ftr-loc a {
            color: #fff;
        }


        .who-sli .slick-dots li button:before {
            font-size: 12px;
            color: #1D3564 !important;
        }

        .who-sli .slick-dots {
            bottom: -14px;
        }

        .no-list {
            list-style-type: none;
            /* Disable default numbering */
            padding-left: 0;
            /* Remove any padding */
        }

        .his-img {
            width: 100%;
        }

        .ach-img {
            width: 100%;
        }

        .img-user {
            width: 100%;
            padding-right: 1.3rem;
        }

        /* Custom arrow styles */
        .slick-prev,
        .slick-next {
            width: 50px;
            /* Increase the width of the arrow */
            height: 50px;
            /* Increase the height of the arrow */
            background-color: #f1c9c9 !important;
            /* Solid black background for better contrast */
            color: #fff !important;
            /* White color for the arrow icon */
            border-radius: 50%;
            /* Circular arrows */
            z-index: 1;
            /* Ensure arrows are above the slider content */
            top: 50%;
            /* Vertically center the arrows */
            transform: translateY(-50%);
            /* Adjust for vertical centering */
            border: 2px solid #fff;
            /* White border for contrast */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            /* Make the arrow icons larger */
            font-weight: bold;
            /* Bold arrow icons */
            opacity: 0.8;
            /* Slight transparency */
            transition: opacity 0.3s, background-color 0.3s;
            /* Smooth transition */
        }

        /* Left arrow */
        .slick-prev {
            left: -60px;
            /* Adjust spacing for the left arrow */
        }

        /* Right arrow */
        .slick-next {
            right: -60px;
            /* Adjust spacing for the right arrow */
        }

        /* Hover effect for better visibility */
        .slick-prev:hover,
        .slick-next:hover {
            background-color: #ff0000;
            /* Change background color on hover to red */
            border-color: #ff0000;
            /* Change border color on hover */
            opacity: 1;
            /* Fully opaque on hover */
        }

        .who-sli .slick-prev {
            left: -36px;
        }

        .who-sli .slick-next {
            right: -15px;
        }

        .log-slide {
            height: 80px;
        }

        .ent-detal {
            position: relative;
        }

        .ent-detal .popupshareside {
            top: 89px;
            left: calc(-201% - -15px);
        }

        .ofc a {
            color: #fff;
        }

        .spc {
            padding: 0;
        }


        .fnt-txt {
            font-weight: 700 !important;
        }

        @media (max-width: 844px) {
            .mobile-width {
                width: 90%;
                max-width: 400px;
                margin: 0 auto;
            }
        }

        @media (min-width: 915px) and (max-width: 932px) {
            .mobile-width {
                width: 95%;
                max-width: 480px;
            }
        }


        /* TypeAheadDropDown.css */

        .TypeAheadDropDownUl {
            position: absolute;
            top: 70%;
            left: 7rem;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-top: none;
            max-height: 150px;
            width: 40rem;
            overflow-y: auto;
            z-index: 99999;
            box-sizing: border-box;
        }

        .TypeAheadDropDownUlMobile {
            position: absolute;
            top: 51%;
            left: 0rem;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-top: none;
            max-height: 150px;
            width: 21rem;
            overflow-y: auto;
            z-index: 99999;
            box-sizing: border-box;
        }

        .TypeAheadDropDownUl li,
        .TypeAheadDropDownUlMobile li {
            padding: 10px;
            cursor: pointer;
        }

        .TypeAheadDropDownUlMobile li:hover,
        .TypeAheadDropDownUl li:hover {
            background-color: #f0f0f0;
        }

        .evt-btn {
            padding-top: 6px;
            padding-bottom: 6px;
        }

        .popularfaculty {
            display: inline-grid;
        }

        .text-40 {
            font-size: 40px;
        }

        .bg-background {
            background-color: #f9fafb;
        }

        .roadmap {
            margin: 0px 32px 33px 32px;
        }


        .left-sct {
            position: relative;
        }

        .rgt-icon {
            position: absolute;
            left: -30px;
            width: 90%;
            top: 15%;
            bottom: 15%;

        }

        .left-sec-gra {
            padding: 5rem;
        }



        /* Popular courses mobile */
        .custom-mx-auto {
            margin-left: auto;
            margin-right: auto;
        }


        @media (max-width: 767px) {
            .custom-mx-auto {
                margin-left: 0px;
                margin-right: 46px;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        #benefits,
        #programs,
        #courses,
        #university,
        #visa,
        #admission {
            scroll-margin-top: 100px;
        }


        /* pakistan banner */

        .bnr-frst {
            min-height: 88vh !important;
        }

        /* intake univeristy table data */

        @keyframes scroll {
            0% {
                transform: translateY(0%);
            }

            100% {
                transform: translateY(-100%);
            }
        }

        .animate-scroll {
            animation: scroll 300s linear infinite;
        }


        .animate-scroll:hover {
            animation-play-state: paused;
        }


        .last\:border-r-0:last-child {
            border-right-width: 0px;
        }


        .odd\:bg-white:nth-child(odd) {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }


        .even\:bg-gray-50:nth-child(even) {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }


        .even\:bg-slate-50\/60:nth-child(even) {
            background-color: rgb(248 250 252 / 0.6);
        }


        .hover\:-translate-y-0:hover {
            --tw-translate-y: -0px;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:-translate-y-0\.5:hover {
            --tw-translate-y: -0.125rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:-translate-y-1:hover {
            --tw-translate-y: -0.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:-translate-y-2:hover {
            --tw-translate-y: -0.5rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:-translate-y-3:hover {
            --tw-translate-y: -0.75rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:scale-105:hover {
            --tw-scale-x: 1.05;
            --tw-scale-y: 1.05;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:scale-110:hover {
            --tw-scale-x: 1.1;
            --tw-scale-y: 1.1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:scale-125:hover {
            --tw-scale-x: 1.25;
            --tw-scale-y: 1.25;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:scale-\[1\.01\]:hover {
            --tw-scale-x: 1.01;
            --tw-scale-y: 1.01;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:scale-\[1\.02\]:hover {
            --tw-scale-x: 1.02;
            --tw-scale-y: 1.02;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .hover\:rounded-md:hover {
            border-radius: 0.375rem;
        }


        .hover\:border-b-4:hover {
            border-bottom-width: 4px;
        }


        .hover\:border-\[\#0A1A56\]\/20:hover {
            border-color: rgb(10 26 86 / 0.2);
        }


        .hover\:border-\[\#1D3564\]\/80:hover {
            border-color: rgb(29 53 100 / 0.8);
        }


        .hover\:border-\[\#1d3564\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#242E69\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(36 46 105 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#c5ccff\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(197 204 255 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#d86675\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(216 102 117 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#d8ddff\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(216 221 255 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#db0c28\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(219 12 40 / var(--tw-border-opacity));
        }


        .hover\:border-\[\#ffdede\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(255 222 222 / var(--tw-border-opacity));
        }


        .hover\:border-indigo-500:hover {
            --tw-border-opacity: 1;
            border-color: rgb(104 117 245 / var(--tw-border-opacity));
        }


        .hover\:border-indigo-700:hover {
            --tw-border-opacity: 1;
            border-color: rgb(81 69 205 / var(--tw-border-opacity));
        }


        .hover\:bg-\[\#1D3564\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(29 53 100 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#1D3564\]\/10:hover {
            background-color: rgb(29 53 100 / 0.1);
        }


        .hover\:bg-\[\#D1DCEE\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(209 220 238 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#DB0C28\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(219 12 40 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#a399f3\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(163 153 243 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#bdcaf3\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(189 202 243 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#c11b24\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(193 27 36 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#f7f9ff\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(247 249 255 / var(--tw-bg-opacity));
        }


        .hover\:bg-\[\#fdfdff\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(253 253 255 / var(--tw-bg-opacity));
        }


        .hover\:bg-blue_bg:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(36 46 105 / var(--tw-bg-opacity));
        }


        .hover\:bg-gray-100:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }


        .hover\:bg-gray-200:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }


        .hover\:bg-gray-300:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(209 213 219 / var(--tw-bg-opacity));
        }


        .hover\:bg-gray-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }


        .hover\:bg-indigo-100\/30:hover {
            background-color: rgb(229 237 255 / 0.3);
        }


        .hover\:bg-indigo-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(240 245 255 / var(--tw-bg-opacity));
        }


        .hover\:bg-nav_bg:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(29 53 100 / var(--tw-bg-opacity));
        }


        .hover\:bg-purple-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(246 245 255 / var(--tw-bg-opacity));
        }


        .hover\:bg-red-500:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(240 82 82 / var(--tw-bg-opacity));
        }


        .hover\:bg-red-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(224 36 36 / var(--tw-bg-opacity));
        }


        .hover\:bg-red-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(200 30 30 / var(--tw-bg-opacity));
        }


        .hover\:bg-slate-300:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(203 213 225 / var(--tw-bg-opacity));
        }


        .hover\:bg-violet-100:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(237 233 254 / var(--tw-bg-opacity));
        }


        .hover\:bg-white\/5:hover {
            background-color: rgb(255 255 255 / 0.05);
        }


        .hover\:bg-white\/50:hover {
            background-color: rgb(255 255 255 / 0.5);
        }


        .hover\:bg-gradient-to-r:hover {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }


        .hover\:from-\[\#001a57\]:hover {
            --tw-gradient-from: #001a57 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 26 87 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .hover\:from-\[\#00216E\]\/80:hover {
            --tw-gradient-from: rgb(0 33 110 / 0.8) var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(0 33 110 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .hover\:from-\[\#e6f0fa\]:hover {
            --tw-gradient-from: #e6f0fa var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(230 240 250 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .hover\:from-indigo-700:hover {
            --tw-gradient-from: #5145CD var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(81 69 205 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .hover\:from-purple-600:hover {
            --tw-gradient-from: #7E3AF2 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(126 58 242 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .hover\:to-\[\#242E69\]:hover {
            --tw-gradient-to: #242E69 var(--tw-gradient-to-position);
        }


        .hover\:to-\[\#DB0C28\]\/80:hover {
            --tw-gradient-to: rgb(219 12 40 / 0.8) var(--tw-gradient-to-position);
        }


        .hover\:to-\[\#c30b22\]:hover {
            --tw-gradient-to: #c30b22 var(--tw-gradient-to-position);
        }


        .hover\:to-\[\#d1e3ff\]:hover {
            --tw-gradient-to: #d1e3ff var(--tw-gradient-to-position);
        }


        .hover\:to-pink-600:hover {
            --tw-gradient-to: #D61F69 var(--tw-gradient-to-position);
        }


        .hover\:to-purple-600:hover {
            --tw-gradient-to: #7E3AF2 var(--tw-gradient-to-position);
        }


        .hover\:to-purple-800:hover {
            --tw-gradient-to: #5521B5 var(--tw-gradient-to-position);
        }


        .hover\:text-\[\#1D3564\]:hover {
            --tw-text-opacity: 1;
            color: rgb(29 53 100 / var(--tw-text-opacity));
        }


        .hover\:text-\[\#1a8cff\]:hover {
            --tw-text-opacity: 1;
            color: rgb(26 140 255 / var(--tw-text-opacity));
        }


        .hover\:text-\[\#1d3564\]:hover {
            --tw-text-opacity: 1;
            color: rgb(29 53 100 / var(--tw-text-opacity));
        }


        .hover\:text-\[\#242E69\]:hover {
            --tw-text-opacity: 1;
            color: rgb(36 46 105 / var(--tw-text-opacity));
        }


        .hover\:text-\[\#3a3d91\]:hover {
            --tw-text-opacity: 1;
            color: rgb(58 61 145 / var(--tw-text-opacity));
        }


        .hover\:text-blue_bg:hover {
            --tw-text-opacity: 1;
            color: rgb(36 46 105 / var(--tw-text-opacity));
        }


        .hover\:text-gray-100:hover {
            --tw-text-opacity: 1;
            color: rgb(243 244 246 / var(--tw-text-opacity));
        }


        .hover\:text-gray-400:hover {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }


        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }


        .hover\:text-indigo-700:hover {
            --tw-text-opacity: 1;
            color: rgb(81 69 205 / var(--tw-text-opacity));
        }


        .hover\:text-teal-700:hover {
            --tw-text-opacity: 1;
            color: rgb(3 102 114 / var(--tw-text-opacity));
        }


        .hover\:text-violet-700:hover {
            --tw-text-opacity: 1;
            color: rgb(109 40 217 / var(--tw-text-opacity));
        }


        .hover\:text-white:hover {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }


        .hover\:underline:hover {
            text-decoration-line: underline;
        }


        .hover\:no-underline:hover {
            text-decoration-line: none;
        }


        .hover\:underline-offset-2:hover {
            text-underline-offset: 2px;
        }


        .hover\:opacity-90:hover {
            opacity: 0.9;
        }


        .hover\:shadow-2xl:hover {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .hover\:shadow-lg:hover {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .hover\:shadow-md:hover {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .hover\:shadow-xl:hover {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .hover\:ring-white\/60:hover {
            --tw-ring-color: rgb(255 255 255 / 0.6);
        }


        .hover\:brightness-110:hover {
            --tw-brightness: brightness(1.1);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }


        .hover\:duration-200:hover {
            transition-duration: 200ms;
        }


        .hover\:ease-out:hover {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }


        .focus\:border-\[\#1D3564\]:focus {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }


        .focus\:border-indigo-400:focus {
            --tw-border-opacity: 1;
            border-color: rgb(141 162 251 / var(--tw-border-opacity));
        }


        .focus\:border-indigo-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(104 117 245 / var(--tw-border-opacity));
        }


        .focus\:border-red-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(240 82 82 / var(--tw-border-opacity));
        }


        .focus\:border-transparent:focus {
            border-color: transparent;
        }


        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }


        .focus\:ring-0:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }


        .focus\:ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }


        .focus\:ring-4:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }


        .focus\:ring-gray-200:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
        }


        .focus\:ring-indigo-300:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(180 198 252 / var(--tw-ring-opacity));
        }


        .focus\:ring-indigo-400:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(141 162 251 / var(--tw-ring-opacity));
        }


        .focus\:ring-indigo-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(104 117 245 / var(--tw-ring-opacity));
        }


        .focus\:ring-purple-300:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(202 191 253 / var(--tw-ring-opacity));
        }


        .focus\:ring-red-300:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(248 180 180 / var(--tw-ring-opacity));
        }


        .focus\:ring-red-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(240 82 82 / var(--tw-ring-opacity));
        }


        .active\:scale-95:active {
            --tw-scale-x: .95;
            --tw-scale-y: .95;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .disabled\:opacity-50:disabled {
            opacity: 0.5;
        }


        .group[open] .group-open\:rotate-180 {
            --tw-rotate: 180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:h-1 {
            height: 0.25rem;
        }


        .group:hover .group-hover\:translate-x-1 {
            --tw-translate-x: 0.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:rotate-12 {
            --tw-rotate: 12deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-105 {
            --tw-scale-x: 1.05;
            --tw-scale-y: 1.05;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-110 {
            --tw-scale-x: 1.1;
            --tw-scale-y: 1.1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-125 {
            --tw-scale-x: 1.25;
            --tw-scale-y: 1.25;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-\[1\.02\] {
            --tw-scale-x: 1.02;
            --tw-scale-y: 1.02;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-x-100 {
            --tw-scale-x: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .group:hover .group-hover\:scale-y-100 {
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }


        .group:hover .group-hover\:animate-bounce {
            animation: bounce 1s infinite;
        }


        @keyframes pulse {

            50% {
                opacity: .5;
            }
        }


        .group:hover .group-hover\:animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }


        .group:hover .group-hover\:bg-\[\#e3e7f5\] {
            --tw-bg-opacity: 1;
            background-color: rgb(227 231 245 / var(--tw-bg-opacity));
        }


        .group:hover .group-hover\:bg-indigo-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(88 80 236 / var(--tw-bg-opacity));
        }


        .group:hover .group-hover\:bg-gradient-to-tl {
            background-image: linear-gradient(to top left, var(--tw-gradient-stops));
        }


        .group:hover .group-hover\:from-indigo-200 {
            --tw-gradient-from: #CDDBFE var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(205 219 254 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .group:hover .group-hover\:text-\[\#2a5b9e\] {
            --tw-text-opacity: 1;
            color: rgb(42 91 158 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:text-\[\#3a3d91\] {
            --tw-text-opacity: 1;
            color: rgb(58 61 145 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(88 80 236 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:text-indigo-700 {
            --tw-text-opacity: 1;
            color: rgb(81 69 205 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:text-violet-700 {
            --tw-text-opacity: 1;
            color: rgb(109 40 217 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }


        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }


        .group:hover .group-hover\:opacity-20 {
            opacity: 0.2;
        }


        .group:hover .group-hover\:opacity-30 {
            opacity: 0.3;
        }


        .group:hover .group-hover\:opacity-40 {
            opacity: 0.4;
        }


        .group:hover .group-hover\:opacity-80 {
            opacity: 0.8;
        }


        .group:hover .group-hover\:opacity-90 {
            opacity: 0.9;
        }


        .group:hover .group-hover\:shadow-lg {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .group:hover .group-hover\:shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }


        .group:hover .group-hover\:shadow-indigo-200 {
            --tw-shadow-color: #CDDBFE;
            --tw-shadow: var(--tw-shadow-colored);
        }


        .group:hover .group-hover\:ring-4 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }


        .group:hover .group-hover\:ring-indigo-500\/20 {
            --tw-ring-color: rgb(104 117 245 / 0.2);
        }


        .dark\:border-\[\#1d3564\]:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(29 53 100 / var(--tw-border-opacity));
        }


        .dark\:border-black:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(0 0 0 / var(--tw-border-opacity));
        }


        .dark\:border-gray-400:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(156 163 175 / var(--tw-border-opacity));
        }


        .dark\:border-gray-500:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(107 114 128 / var(--tw-border-opacity));
        }


        .dark\:border-gray-600:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));
        }


        .dark\:border-gray-700:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity));
        }


        .dark\:border-red-500:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(240 82 82 / var(--tw-border-opacity));
        }


        .dark\:bg-gray-400:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(156 163 175 / var(--tw-bg-opacity));
        }


        .dark\:bg-gray-700:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }


        .dark\:bg-gray-800:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }


        .dark\:bg-gray-900:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }


        .dark\:from-purple-700:is(.dark *) {
            --tw-gradient-from: #6C2BD9 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(108 43 217 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }


        .dark\:to-indigo-700:is(.dark *) {
            --tw-gradient-to: #5145CD var(--tw-gradient-to-position);
        }


        .dark\:text-\[\#003054\]:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(0 48 84 / var(--tw-text-opacity));
        }


        .dark\:text-\[\#1c1f2a\]:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(28 31 42 / var(--tw-text-opacity));
        }


        .dark\:text-gray-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }


        .dark\:text-gray-300:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }


        .dark\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }


        .dark\:text-gray-600:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }


        .dark\:text-white:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }


        .dark\:placeholder-gray-400:is(.dark *)::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175 / var(--tw-placeholder-opacity));
        }


        .dark\:ring-gray-700:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(55 65 81 / var(--tw-ring-opacity));
        }


        .dark\:invert:is(.dark *) {
            --tw-invert: invert(100%);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }


        .dark\:hover\:bg-gray-700:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }


        .dark\:hover\:bg-gray-800:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }


        .dark\:focus\:ring-gray-800:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(31 41 55 / var(--tw-ring-opacity));
        }


        .dark\:focus\:ring-purple-800:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(85 33 181 / var(--tw-ring-opacity));
        }


        .dark\:focus\:ring-teal-500:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(6 148 162 / var(--tw-ring-opacity));
        }


        @media (min-width: 640px) {

            .sm\:mx-4 {
                margin-left: 1rem;
                margin-right: 1rem;
            }

            .sm\:mb-0 {
                margin-bottom: 0px;
            }

            .sm\:mb-10 {
                margin-bottom: 2.5rem;
            }

            .sm\:mb-12 {
                margin-bottom: 3rem;
            }

            .sm\:mb-4 {
                margin-bottom: 1rem;
            }

            .sm\:mb-6 {
                margin-bottom: 1.5rem;
            }

            .sm\:mb-8 {
                margin-bottom: 2rem;
            }

            .sm\:ml-10 {
                margin-left: 2.5rem;
            }

            .sm\:ml-14 {
                margin-left: 3.5rem;
            }

            .sm\:ml-16 {
                margin-left: 4rem;
            }

            .sm\:mr-10 {
                margin-right: 2.5rem;
            }

            .sm\:mr-4 {
                margin-right: 1rem;
            }

            .sm\:mr-8 {
                margin-right: 2rem;
            }

            .sm\:mt-0 {
                margin-top: 0px;
            }

            .sm\:mt-10 {
                margin-top: 2.5rem;
            }

            .sm\:mt-2 {
                margin-top: 0.5rem;
            }

            .sm\:mt-3 {
                margin-top: 0.75rem;
            }

            .sm\:mt-4 {
                margin-top: 1rem;
            }

            .sm\:mt-5 {
                margin-top: 1.25rem;
            }

            .sm\:mt-6 {
                margin-top: 1.5rem;
            }

            .sm\:mt-\[10rem\] {
                margin-top: 10rem;
            }

            .sm\:mt-\[4rem\] {
                margin-top: 4rem;
            }

            .sm\:mt-\[6\.5rem\] {
                margin-top: 6.5rem;
            }

            .sm\:block {
                display: block;
            }

            .sm\:flex {
                display: flex;
            }

            .sm\:hidden {
                display: none;
            }

            .sm\:h-12 {
                height: 3rem;
            }

            .sm\:h-16 {
                height: 4rem;
            }

            .sm\:h-20 {
                height: 5rem;
            }

            .sm\:h-4 {
                height: 1rem;
            }

            .sm\:h-40 {
                height: 10rem;
            }

            .sm\:h-5 {
                height: 1.25rem;
            }

            .sm\:h-6 {
                height: 1.5rem;
            }

            .sm\:h-7 {
                height: 1.75rem;
            }

            .sm\:h-8 {
                height: 2rem;
            }

            .sm\:h-\[320px\] {
                height: 320px;
            }

            .sm\:h-\[32px\] {
                height: 32px;
            }

            .sm\:w-1\/2 {
                width: 50%;
            }

            .sm\:w-1\/3 {
                width: 33.333333%;
            }

            .sm\:w-16 {
                width: 4rem;
            }

            .sm\:w-2\/3 {
                width: 66.666667%;
            }

            .sm\:w-20 {
                width: 5rem;
            }

            .sm\:w-32 {
                width: 8rem;
            }

            .sm\:w-4 {
                width: 1rem;
            }

            .sm\:w-4\/12 {
                width: 33.333333%;
            }

            .sm\:w-5 {
                width: 1.25rem;
            }

            .sm\:w-56 {
                width: 14rem;
            }

            .sm\:w-6 {
                width: 1.5rem;
            }

            .sm\:w-7 {
                width: 1.75rem;
            }

            .sm\:w-8 {
                width: 2rem;
            }

            .sm\:w-96 {
                width: 24rem;
            }

            .sm\:w-\[151px\] {
                width: 151px;
            }

            .sm\:w-\[20rem\] {
                width: 20rem;
            }

            .sm\:w-\[24rem\] {
                width: 24rem;
            }

            .sm\:w-\[400px\] {
                width: 400px;
            }

            .sm\:w-\[47\%\] {
                width: 47%;
            }

            .sm\:w-auto {
                width: auto;
            }

            .sm\:w-full {
                width: 100%;
            }

            .sm\:max-w-4xl {
                max-width: 56rem;
            }

            .sm\:max-w-md {
                max-width: 28rem;
            }

            .sm\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sm\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:items-start {
                align-items: flex-start;
            }

            .sm\:items-center {
                align-items: center;
            }

            .sm\:justify-around {
                justify-content: space-around;
            }

            .sm\:gap-3 {
                gap: 0.75rem;
            }

            .sm\:gap-4 {
                gap: 1rem;
            }

            .sm\:gap-8 {
                gap: 2rem;
            }

            .sm\:gap-x-16 {
                column-gap: 4rem;
            }

            .sm\:gap-x-8 {
                column-gap: 2rem;
            }

            .sm\:gap-y-16 {
                row-gap: 4rem;
            }

            .sm\:gap-y-8 {
                row-gap: 2rem;
            }

            .sm\:space-x-4> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1rem * var(--tw-space-x-reverse));
                margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .sm\:space-x-8> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .sm\:space-y-0> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0px * var(--tw-space-y-reverse));
            }

            .sm\:space-y-3> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
            }

            .sm\:space-y-6> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
            }

            .sm\:rounded-2xl {
                border-radius: 1rem;
            }

            .sm\:rounded-lg {
                border-radius: 0.5rem;
            }

            .sm\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/about-us\.original\.jpg\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/about-us.original.jpg');
            }

            .sm\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/about-us\.original\.webp\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/about-us.original.webp');
            }

            .sm\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/image_95\.original\.png\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/image_95.original.png');
            }

            .sm\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/study-option-desktop\.original\.webp\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/study-option-desktop.original.webp');
            }

            .sm\:p-4 {
                padding: 1rem;
            }

            .sm\:p-6 {
                padding: 1.5rem;
            }

            .sm\:p-8 {
                padding: 2rem;
            }

            .sm\:px-0 {
                padding-left: 0px;
                padding-right: 0px;
            }

            .sm\:px-10 {
                padding-left: 2.5rem;
                padding-right: 2.5rem;
            }

            .sm\:px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .sm\:px-7 {
                padding-left: 1.75rem;
                padding-right: 1.75rem;
            }

            .sm\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .sm\:py-12 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .sm\:py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .sm\:py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .sm\:py-3 {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
            }

            .sm\:py-3\.5 {
                padding-top: 0.875rem;
                padding-bottom: 0.875rem;
            }

            .sm\:py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            .sm\:py-6 {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .sm\:py-\[10px\] {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .sm\:pb-\[6rem\] {
                padding-bottom: 6rem;
            }

            .sm\:pt-10 {
                padding-top: 2.5rem;
            }

            .sm\:pt-16 {
                padding-top: 4rem;
            }

            .sm\:text-left {
                text-align: left;
            }

            .sm\:text-2xl {
                font-size: 1.5rem;
                line-height: 2rem;
            }

            .sm\:text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .sm\:text-4xl {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }

            .sm\:text-\[36px\] {
                font-size: 36px;
            }

            .sm\:text-base {
                font-size: 1rem;
                line-height: 1.5rem;
            }

            .sm\:text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }

            .sm\:text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .sm\:text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }

            .sm\:text-xs {
                font-size: 0.75rem;
                line-height: 1rem;
            }

            .sm\:leading-9 {
                line-height: 2.25rem;
            }

            .sm\:leading-\[65\.35px\] {
                line-height: 65.35px;
            }

            .sm\:leading-tight {
                line-height: 1.25;
            }

            .sm\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity));
            }

            .sm\:hover\:-translate-y-3:hover {
                --tw-translate-y: -0.75rem;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
        }


        @media (min-width: 768px) {

            .md\:absolute {
                position: absolute;
            }

            .md\:bottom-2 {
                bottom: 0.5rem;
            }

            .md\:bottom-24 {
                bottom: 6rem;
            }

            .md\:bottom-3 {
                bottom: 0.75rem;
            }

            .md\:right-4 {
                right: 1rem;
            }

            .md\:right-6 {
                right: 1.5rem;
            }

            .md\:top-\[1rem\] {
                top: 1rem;
            }

            .md\:order-1 {
                order: 1;
            }

            .md\:col-span-4 {
                grid-column: span 4 / span 4;
            }

            .md\:mx-0 {
                margin-left: 0px;
                margin-right: 0px;
            }

            .md\:mx-16 {
                margin-left: 4rem;
                margin-right: 4rem;
            }

            .md\:mx-5 {
                margin-left: 1.25rem;
                margin-right: 1.25rem;
            }

            .md\:mx-6 {
                margin-left: 1.5rem;
                margin-right: 1.5rem;
            }

            .md\:ml-16 {
                margin-left: 4rem;
            }

            .md\:ml-2 {
                margin-left: 0.5rem;
            }

            .md\:ms-2 {
                margin-inline-start: 0.5rem;
            }

            .md\:mt-0 {
                margin-top: 0px;
            }

            .md\:mt-4 {
                margin-top: 1rem;
            }

            .md\:mt-6 {
                margin-top: 1.5rem;
            }

            .md\:mt-8 {
                margin-top: 2rem;
            }

            .md\:mt-\[-96px\] {
                margin-top: -96px;
            }

            .md\:mt-\[2\.5rem\] {
                margin-top: 2.5rem;
            }

            .md\:block {
                display: block;
            }

            .md\:flex {
                display: flex;
            }

            .md\:table-cell {
                display: table-cell;
            }

            .md\:grid {
                display: grid;
            }

            .md\:hidden {
                display: none;
            }

            .md\:h-14 {
                height: 3.5rem;
            }

            .md\:h-\[212px\] {
                height: 212px;
            }

            .md\:h-auto {
                height: auto;
            }

            .md\:w-1\/2 {
                width: 50%;
            }

            .md\:w-1\/3 {
                width: 33.333333%;
            }

            .md\:w-1\/5 {
                width: 20%;
            }

            .md\:w-2\/3 {
                width: 66.666667%;
            }

            .md\:w-3\/12 {
                width: 25%;
            }

            .md\:w-\[30\%\] {
                width: 30%;
            }

            .md\:w-\[340px\] {
                width: 340px;
            }

            .md\:w-\[540px\] {
                width: 540px;
            }

            .md\:w-\[65\%\] {
                width: 65%;
            }

            .md\:w-\[75\%\] {
                width: 75%;
            }

            .md\:w-\[80\%\] {
                width: 80%;
            }

            .md\:w-\[87\%\] {
                width: 87%;
            }

            .md\:w-auto {
                width: auto;
            }

            .md\:w-full {
                width: 100%;
            }

            .md\:max-w-\[1341px\] {
                max-width: 1341px;
            }

            .md\:grid-cols-12 {
                grid-template-columns: repeat(12, minmax(0, 1fr));
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .md\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .md\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .md\:grid-cols-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }

            .md\:flex-row {
                flex-direction: row;
            }

            .md\:items-start {
                align-items: flex-start;
            }

            .md\:items-center {
                align-items: center;
            }

            .md\:justify-end {
                justify-content: flex-end;
            }

            .md\:justify-between {
                justify-content: space-between;
            }

            .md\:gap-0 {
                gap: 0px;
            }

            .md\:gap-4 {
                gap: 1rem;
            }

            .md\:space-x-2> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(0.5rem * var(--tw-space-x-reverse));
                margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .md\:space-x-3> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(0.75rem * var(--tw-space-x-reverse));
                margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .md\:space-x-4> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1rem * var(--tw-space-x-reverse));
                margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .md\:space-x-6> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1.5rem * var(--tw-space-x-reverse));
                margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .md\:space-x-8> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .md\:space-y-0> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0px * var(--tw-space-y-reverse));
            }

            .md\:space-y-4> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(1rem * var(--tw-space-y-reverse));
            }

            .md\:overflow-visible {
                overflow: visible;
            }

            .md\:text-nowrap {
                text-wrap: nowrap;
            }

            .md\:rounded-l-xl {
                border-top-left-radius: 0.75rem;
                border-bottom-left-radius: 0.75rem;
            }

            .md\:rounded-t-none {
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;
            }

            .md\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/internal-page-banner\.original\.png\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/internal-page-banner.original.png');
            }

            .md\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/service-banner\.original\.png\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/service-banner.original.png');
            }

            .md\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/uk-study-dk\.original\.webp\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/uk-study-dk.original.webp');
            }

            .md\:bg-gradient-to-r {
                background-image: linear-gradient(to right, var(--tw-gradient-stops));
            }

            .md\:from-black\/40 {
                --tw-gradient-from: rgb(0 0 0 / 0.4) var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
            }

            .md\:to-transparent {
                --tw-gradient-to: transparent var(--tw-gradient-to-position);
            }

            .md\:p-6 {
                padding: 1.5rem;
            }

            .md\:p-8 {
                padding: 2rem;
            }

            .md\:px-0 {
                padding-left: 0px;
                padding-right: 0px;
            }

            .md\:px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .md\:px-20 {
                padding-left: 5rem;
                padding-right: 5rem;
            }

            .md\:px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .md\:px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .md\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .md\:py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .md\:py-3 {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
            }

            .md\:pb-3 {
                padding-bottom: 0.75rem;
            }

            .md\:text-left {
                text-align: left;
            }

            .md\:text-right {
                text-align: right;
            }

            .md\:text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .md\:text-4xl {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }

            .md\:text-5xl {
                font-size: 3rem;
                line-height: 1;
            }

            .md\:text-6xl {
                font-size: 3.75rem;
                line-height: 1;
            }

            .md\:text-\[40px\] {
                font-size: 40px;
            }

            .md\:text-base {
                font-size: 1rem;
                line-height: 1.5rem;
            }

            .md\:text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }

            .md\:text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .md\:text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }
        }


        @media (min-width: 1024px) {

            .lg\:relative {
                position: relative;
            }

            .lg\:left-\[2rem\] {
                left: 2rem;
            }

            .lg\:left-\[3rem\] {
                left: 3rem;
            }

            .lg\:right-5 {
                right: 1.25rem;
            }

            .lg\:top-\[15rem\] {
                top: 15rem;
            }

            .lg\:order-last {
                order: 9999;
            }

            .lg\:float-none {
                float: none;
            }

            .lg\:mx-6 {
                margin-left: 1.5rem;
                margin-right: 1.5rem;
            }

            .lg\:mx-8 {
                margin-left: 2rem;
                margin-right: 2rem;
            }

            .lg\:mx-\[0\.5rem\] {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }

            .lg\:mx-\[2rem\] {
                margin-left: 2rem;
                margin-right: 2rem;
            }

            .lg\:mx-\[3\.5rem\] {
                margin-left: 3.5rem;
                margin-right: 3.5rem;
            }

            .lg\:mx-\[3rem\] {
                margin-left: 3rem;
                margin-right: 3rem;
            }

            .lg\:mx-\[5rem\] {
                margin-left: 5rem;
                margin-right: 5rem;
            }

            .lg\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .lg\:my-0 {
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .lg\:my-\[2rem\] {
                margin-top: 2rem;
                margin-bottom: 2rem;
            }

            .lg\:mb-0 {
                margin-bottom: 0px;
            }

            .lg\:mb-10 {
                margin-bottom: 2.5rem;
            }

            .lg\:mb-4 {
                margin-bottom: 1rem;
            }

            .lg\:mb-6 {
                margin-bottom: 1.5rem;
            }

            .lg\:mb-\[16px\] {
                margin-bottom: 16px;
            }

            .lg\:mb-\[1rem\] {
                margin-bottom: 1rem;
            }

            .lg\:ml-10 {
                margin-left: 2.5rem;
            }

            .lg\:ml-\[1rem\] {
                margin-left: 1rem;
            }

            .lg\:ml-\[5rem\] {
                margin-left: 5rem;
            }

            .lg\:mr-\[1rem\] {
                margin-right: 1rem;
            }

            .lg\:mr-\[2\.2px\] {
                margin-right: 2.2px;
            }

            .lg\:mr-\[2\.4rem\] {
                margin-right: 2.4rem;
            }

            .lg\:mr-\[2\.7px\] {
                margin-right: 2.7px;
            }

            .lg\:mt-0 {
                margin-top: 0px;
            }

            .lg\:mt-10 {
                margin-top: 2.5rem;
            }

            .lg\:mt-14 {
                margin-top: 3.5rem;
            }

            .lg\:mt-16 {
                margin-top: 4rem;
            }

            .lg\:mt-20 {
                margin-top: 5rem;
            }

            .lg\:mt-4 {
                margin-top: 1rem;
            }

            .lg\:mt-6 {
                margin-top: 1.5rem;
            }

            .lg\:mt-\[2\.5rem\] {
                margin-top: 2.5rem;
            }

            .lg\:mt-\[3\.5rem\] {
                margin-top: 3.5rem;
            }

            .lg\:mt-\[4rem\] {
                margin-top: 4rem;
            }

            .lg\:mt-\[8rem\] {
                margin-top: 8rem;
            }

            .lg\:block {
                display: block;
            }

            .lg\:flex {
                display: flex;
            }

            .lg\:grid {
                display: grid;
            }

            .lg\:hidden {
                display: none;
            }

            .lg\:h-10 {
                height: 2.5rem;
            }

            .lg\:h-12 {
                height: 3rem;
            }

            .lg\:h-14 {
                height: 3.5rem;
            }

            .lg\:h-\[350px\] {
                height: 350px;
            }

            .lg\:h-\[360px\] {
                height: 360px;
            }

            .lg\:h-\[38rem\] {
                height: 38rem;
            }

            .lg\:h-\[4\.5rem\] {
                height: 4.5rem;
            }

            .lg\:h-\[450px\] {
                height: 450px;
            }

            .lg\:h-\[470px\] {
                height: 470px;
            }

            .lg\:h-\[640px\] {
                height: 640px;
            }

            .lg\:h-full {
                height: 100%;
            }

            .lg\:min-h-full {
                min-height: 100%;
            }

            .lg\:w-1\/2 {
                width: 50%;
            }

            .lg\:w-1\/3 {
                width: 33.333333%;
            }

            .lg\:w-12 {
                width: 3rem;
            }

            .lg\:w-2\/3 {
                width: 66.666667%;
            }

            .lg\:w-28 {
                width: 7rem;
            }

            .lg\:w-\[100\%\] {
                width: 100%;
            }

            .lg\:w-\[15\%\] {
                width: 15%;
            }

            .lg\:w-\[22\%\] {
                width: 22%;
            }

            .lg\:w-\[23rem\] {
                width: 23rem;
            }

            .lg\:w-\[30\%\] {
                width: 30%;
            }

            .lg\:w-\[35\%\] {
                width: 35%;
            }

            .lg\:w-\[40\%\] {
                width: 40%;
            }

            .lg\:w-\[400px\] {
                width: 400px;
            }

            .lg\:w-\[42\%\] {
                width: 42%;
            }

            .lg\:w-\[50\%\] {
                width: 50%;
            }

            .lg\:w-\[55\%\] {
                width: 55%;
            }

            .lg\:w-\[593px\] {
                width: 593px;
            }

            .lg\:w-\[60\%\] {
                width: 60%;
            }

            .lg\:w-\[65\%\] {
                width: 65%;
            }

            .lg\:w-\[70\%\] {
                width: 70%;
            }

            .lg\:w-\[74rem\] {
                width: 74rem;
            }

            .lg\:w-\[80\%\] {
                width: 80%;
            }

            .lg\:w-full {
                width: 100%;
            }

            .lg\:max-w-3xl {
                max-width: 48rem;
            }

            .lg\:max-w-7xl {
                max-width: 80rem;
            }

            .lg\:max-w-\[500px\] {
                max-width: 500px;
            }

            .lg\:max-w-\[66\.2rem\] {
                max-width: 66.2rem;
            }

            .lg\:max-w-\[74rem\] {
                max-width: 74rem;
            }

            .lg\:max-w-\[86\.2rem\] {
                max-width: 86.2rem;
            }

            .lg\:max-w-sm {
                max-width: 24rem;
            }

            .lg\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .lg\:grid-cols-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:flex-col {
                flex-direction: column;
            }

            .lg\:flex-nowrap {
                flex-wrap: nowrap;
            }

            .lg\:items-start {
                align-items: flex-start;
            }

            .lg\:justify-between {
                justify-content: space-between;
            }

            .lg\:gap-10 {
                gap: 2.5rem;
            }

            .lg\:gap-20 {
                gap: 5rem;
            }

            .lg\:gap-x-\[24px\] {
                column-gap: 24px;
            }

            .lg\:gap-y-\[28px\] {
                row-gap: 28px;
            }

            .lg\:space-x-3> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(0.75rem * var(--tw-space-x-reverse));
                margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .lg\:space-x-6> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1.5rem * var(--tw-space-x-reverse));
                margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .lg\:space-y-0> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0px * var(--tw-space-y-reverse));
            }

            .lg\:space-y-2> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
            }

            .lg\:space-y-20> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(5rem * var(--tw-space-y-reverse));
            }

            .lg\:p-12 {
                padding: 3rem;
            }

            .lg\:p-4 {
                padding: 1rem;
            }

            .lg\:px-0 {
                padding-left: 0px;
                padding-right: 0px;
            }

            .lg\:px-10 {
                padding-left: 2.5rem;
                padding-right: 2.5rem;
            }

            .lg\:px-12 {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .lg\:px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .lg\:px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .lg\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .lg\:px-\[15\.125rem\] {
                padding-left: 15.125rem;
                padding-right: 15.125rem;
            }

            .lg\:px-\[2\.697rem\] {
                padding-left: 2.697rem;
                padding-right: 2.697rem;
            }

            .lg\:px-\[24px\] {
                padding-left: 24px;
                padding-right: 24px;
            }

            .lg\:px-\[2rem\] {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .lg\:px-\[3\.125rem\] {
                padding-left: 3.125rem;
                padding-right: 3.125rem;
            }

            .lg\:px-\[5\.7rem\] {
                padding-left: 5.7rem;
                padding-right: 5.7rem;
            }

            .lg\:py-0 {
                padding-top: 0px;
                padding-bottom: 0px;
            }

            .lg\:py-1 {
                padding-top: 0.25rem;
                padding-bottom: 0.25rem;
            }

            .lg\:py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .lg\:py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .lg\:py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .lg\:py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            .lg\:py-6 {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .lg\:py-\[2\.5rem\] {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .lg\:pb-0 {
                padding-bottom: 0px;
            }

            .lg\:pb-10 {
                padding-bottom: 2.5rem;
            }

            .lg\:pb-16 {
                padding-bottom: 4rem;
            }

            .lg\:pb-4 {
                padding-bottom: 1rem;
            }

            .lg\:pb-6 {
                padding-bottom: 1.5rem;
            }

            .lg\:pb-8 {
                padding-bottom: 2rem;
            }

            .lg\:pb-\[1rem\] {
                padding-bottom: 1rem;
            }

            .lg\:pb-\[4rem\] {
                padding-bottom: 4rem;
            }

            .lg\:pl-12 {
                padding-left: 3rem;
            }

            .lg\:pt-0 {
                padding-top: 0px;
            }

            .lg\:pt-10 {
                padding-top: 2.5rem;
            }

            .lg\:pt-5 {
                padding-top: 1.25rem;
            }

            .lg\:pt-8 {
                padding-top: 2rem;
            }

            .lg\:pt-\[8rem\] {
                padding-top: 8rem;
            }

            .lg\:text-left {
                text-align: left;
            }

            .lg\:text-center {
                text-align: center;
            }

            .lg\:text-2xl {
                font-size: 1.5rem;
                line-height: 2rem;
            }

            .lg\:text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .lg\:text-4xl {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }

            .lg\:text-5xl {
                font-size: 3rem;
                line-height: 1;
            }

            .lg\:text-6xl {
                font-size: 3.75rem;
                line-height: 1;
            }

            .lg\:text-\[16px\] {
                font-size: 16px;
            }

            .lg\:text-\[17px\] {
                font-size: 17px;
            }

            .lg\:text-\[19px\] {
                font-size: 19px;
            }

            .lg\:text-\[2\.5rem\] {
                font-size: 2.5rem;
            }

            .lg\:text-\[20px\] {
                font-size: 20px;
            }

            .lg\:text-\[25px\] {
                font-size: 25px;
            }

            .lg\:text-base {
                font-size: 1rem;
                line-height: 1.5rem;
            }

            .lg\:text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }

            .lg\:text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .lg\:text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }

            .lg\:leading-4 {
                line-height: 1rem;
            }

            .lg\:leading-\[60px\] {
                line-height: 60px;
            }

            .lg\:placeholder\:text-\[13px\]::placeholder {
                font-size: 13px;
            }
        }


        @media (min-width: 1280px) {

            .xl\:absolute {
                position: absolute;
            }

            .xl\:top-\[5\.5rem\] {
                top: 5.5rem;
            }

            .xl\:mx-12 {
                margin-left: 3rem;
                margin-right: 3rem;
            }

            .xl\:mx-16 {
                margin-left: 4rem;
                margin-right: 4rem;
            }

            .xl\:mx-8 {
                margin-left: 2rem;
                margin-right: 2rem;
            }

            .xl\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .xl\:-mt-16 {
                margin-top: -4rem;
            }

            .xl\:-mt-28 {
                margin-top: -7rem;
            }

            .xl\:-mt-48 {
                margin-top: -12rem;
            }

            .xl\:-mt-\[4\.7rem\] {
                margin-top: -4.7rem;
            }

            .xl\:ml-2 {
                margin-left: 0.5rem;
            }

            .xl\:ml-\[12\.5rem\] {
                margin-left: 12.5rem;
            }

            .xl\:ml-\[12rem\] {
                margin-left: 12rem;
            }

            .xl\:ml-\[1rem\] {
                margin-left: 1rem;
            }

            .xl\:ml-\[2rem\] {
                margin-left: 2rem;
            }

            .xl\:mt-0 {
                margin-top: 0px;
            }

            .xl\:mt-10 {
                margin-top: 2.5rem;
            }

            .xl\:mt-5 {
                margin-top: 1.25rem;
            }

            .xl\:mt-\[0rem\] {
                margin-top: 0rem;
            }

            .xl\:mt-\[1\.25rem\] {
                margin-top: 1.25rem;
            }

            .xl\:mt-\[1\.2rem\] {
                margin-top: 1.2rem;
            }

            .xl\:mt-\[12rem\] {
                margin-top: 12rem;
            }

            .xl\:mt-\[4\.5rem\] {
                margin-top: 4.5rem;
            }

            .xl\:block {
                display: block;
            }

            .xl\:inline-block {
                display: inline-block;
            }

            .xl\:flex {
                display: flex;
            }

            .xl\:hidden {
                display: none;
            }

            .xl\:h-\[300px\] {
                height: 300px;
            }

            .xl\:h-\[385px\] {
                height: 385px;
            }

            .xl\:h-\[520px\] {
                height: 520px;
            }

            .xl\:h-auto {
                height: auto;
            }

            .xl\:w-1\/2 {
                width: 50%;
            }

            .xl\:w-1\/3 {
                width: 33.333333%;
            }

            .xl\:w-2\/3 {
                width: 66.666667%;
            }

            .xl\:w-\[40\%\] {
                width: 40%;
            }

            .xl\:w-\[40rem\] {
                width: 40rem;
            }

            .xl\:w-\[45\%\] {
                width: 45%;
            }

            .xl\:w-\[50\%\] {
                width: 50%;
            }

            .xl\:w-\[70\%\] {
                width: 70%;
            }

            .xl\:w-\[80\%\] {
                width: 80%;
            }

            .xl\:w-auto {
                width: auto;
            }

            .xl\:w-full {
                width: 100%;
            }

            .xl\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .xl\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .xl\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .xl\:grid-cols-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .xl\:flex-row {
                flex-direction: row;
            }

            .xl\:items-center {
                align-items: center;
            }

            .xl\:justify-between {
                justify-content: space-between;
            }

            .xl\:gap-\[1\.6rem\] {
                gap: 1.6rem;
            }

            .xl\:space-x-12> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(3rem * var(--tw-space-x-reverse));
                margin-left: calc(3rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .xl\:space-x-4> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1rem * var(--tw-space-x-reverse));
                margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .xl\:space-x-6> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1.5rem * var(--tw-space-x-reverse));
                margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .xl\:space-x-8> :not([hidden])~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
            }

            .xl\:space-y-0> :not([hidden])~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0px * var(--tw-space-y-reverse));
            }

            .xl\:text-wrap {
                text-wrap: wrap;
            }

            .xl\:rounded-lg {
                border-radius: 0.5rem;
            }

            .xl\:bg-\[url\(\'https\:\/\/mie-global-te43fd\.s3\.amazonaws\.com\/static\/images\/service-banner\.original\.png\'\)\] {
                background-image: url('https://mie-global-te43fd.s3.amazonaws.com/static/images/service-banner.original.png');
            }

            .xl\:px-0 {
                padding-left: 0px;
                padding-right: 0px;
            }

            .xl\:px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .xl\:px-24 {
                padding-left: 6rem;
                padding-right: 6rem;
            }

            .xl\:px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .xl\:px-\[15rem\] {
                padding-left: 15rem;
                padding-right: 15rem;
            }

            .xl\:px-\[18rem\] {
                padding-left: 18rem;
                padding-right: 18rem;
            }

            .xl\:pl-1 {
                padding-left: 0.25rem;
            }

            .xl\:pl-7 {
                padding-left: 1.75rem;
            }

            .xl\:pl-\[4rem\] {
                padding-left: 4rem;
            }

            .xl\:pt-0 {
                padding-top: 0px;
            }

            .xl\:text-left {
                text-align: left;
            }

            .xl\:text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .xl\:text-\[20px\] {
                font-size: 20px;
            }

            .xl\:text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }

            .xl\:text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }
        }


        .rtl\:rotate-180:where([dir="rtl"],
        [dir="rtl"] *) {
            --tw-rotate: 180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }


        .rtl\:space-x-reverse:where([dir="rtl"],
        [dir="rtl"] *)> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 1;
        }


        .rtl\:text-right:where([dir="rtl"],
        [dir="rtl"] *) {
            text-align: right;
        }
    </style>



    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .hero {
            position: relative;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        /* Background Video */
        .hero video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
            object-fit: cover;
        }

        /* Dark overlay for better text readability */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Adjust opacity as needed */
            z-index: 1;
        }

        /* Content */
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            padding: 14px 36px;
            background: #fff;
            color: #111;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #f0f0f0;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.2rem;
            }
        }

        .hero-title-pro {
            font-size: clamp(2.5rem, 5.5vw, 4.5rem);
            font-weight: 950;
            line-height: 1.08;
            letter-spacing: -1.8px;
            margin-bottom: 1.2rem;
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .dynamic-text {
            position: relative;
            display: inline-block;
            height: 1.2em;
            margin-left: 15px;
            vertical-align: bottom;
            overflow: hidden;
        }

        .dynamic-text::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg,
                    transparent 0%,
                    rgba(255, 255, 255, 0.15) 50%,
                    transparent 100%);
            transform: translateX(-100%);
            animation: shimmer 4s infinite;
            z-index: 1;
        }

        .word {
            display: block;
            background: linear-gradient(90deg,
                    #d1e424 0%,
                    #ffffff 30%,
                    #d1e424 70%,
                    #ffffff 100%);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 950;
            padding: 0 4px;
            animation:
                slideWords 12s infinite,
                gradientFlow 6s ease-in-out infinite,
                subtleGlow 4s ease-in-out infinite alternate;
            filter: drop-shadow(0 0 20px rgba(209, 228, 36, 0.5));
        }

        @keyframes slideWords {

            0%,
            16% {
                transform: translateY(0);
            }

            bass20%,
            33% {
                transform: translateY(-100%);
            }

            37%,
            53% {
                transform: translateY(-200%);
            }

            57%,
            73% {
                transform: translateY(-300%);
            }

            77%,
            93% {
                transform: translateY(-400%);
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes gradientFlow {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes subtleGlow {
            from {
                filter: drop-shadow(0 0 20px rgba(209, 228, 36, 0.5));
            }

            to {
                filter: drop-shadow(0 0 40px rgba(209, 228, 36, 0.9));
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* প্রিমিয়াম বাটন স্টাইল */
        .hero-actions .btn-primary {
            background: linear-gradient(135deg, #d1e424, #a0b81b);
            color: #000;
            padding: 16px 36px;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(209, 228, 36, 0.4);
            transition: all 0.3s ease;
        }

        ,
        ] .hero-actions .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(209, 228, 36, 0.6);
        }

        .hero-actions .btn-secondary {
            margin-left: 15px;
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 14px 32px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        /* মোবাইল অপটিমাইজেশন */
        @media (max-width: 768px) {
            .dynamic-text {
                margin-left: 8px;
                height: 1.1em;
            }

            .hero-title-pro {
                letter-spacing: -1px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Start Header Area -->
    @include('frontend-partials.header')



    <!-- Start Side Vav -->
    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start Banner Area -->
    <section class="hero">
        <!-- Replace the src with your own video (MP4 recommended) -->
        <video autoplay muted loop playsinline>
            <source src="https://kmfglobaleducation.com/assets/images/banner/bg-slide.mp4" type="video/mp4">
        </video>

        <div class="hero-content">
            <h1 class="hero-title-pro">
                Achieve Your Global Education Dreams With
                <span class="dynamic-text">
                    <span class="word">KMF GLOBAL EDUCATION</span>
                    <span class="word">Expert Guidance</span>
                    <span class="word">100% Visa Success</span>


                </span>
            </h1>

            <p class="hero-desc">
                Trusted by 200+ students | Partnered with 20+ universities in UK, Canada, Australia, USA, Malta & more
            </p>

            <div class="hero-actions">
                <a href="#" class="btn-primary">Free Consultancy</a>
            </div>
        </div>



        <style>
            @keyframes floatGlow {

                0%,
                100% {
                    transform: translateY(-50%) translateX(0);
                    box-shadow: 0 10px 40px rgba(30, 60, 120, 0.6)
                }

                50% {
                    transform: translateY(-50%) translateX(8px);
                    box-shadow: 0 15px 55px rgba(255, 215, 0, 0.35)
                }
            }

            @keyframes hoverPush {
                to {
                    transform: translateY(-50%) translateX(15px);
                    box-shadow: 0 20px 60px rgba(255, 215, 0, 0.45)
                }
            }

            @media(max-width:768px) {
                div[style*='top:50%'] {
                    padding: 14px 22px;
                    font-size: 16px;
                    gap: 12px
                }

                div[style*='top:50%']>div:first-child {
                    width: 48px;
                    height: 48px
                }
            }


            < !-- sticky -->.sticky-consult {
                position: fixed;
                left: 20px;
                top: 80%;
                transform: translateY(-50%);
                background: linear-gradient(45deg, #1e3c72, #2a5298);
                color: #ffd700;
                padding: 16px 28px;
                border-radius: 50px;
                display: flex;
                gap: 16px;
                align-items: center;
                box-shadow: 0 10px 40px rgba(30, 60, 120, 0.6);
                font: 700 18px system-ui;
                border: 1px solid #ffd700;
                cursor: pointer;
                z-index: 1000;
                animation: floatGlow 4s ease-in-out infinite;
                transition: transform .2s, box-shadow .2s;
            }

            .sticky-consult:hover {
                animation: floatGlow 4s ease-in-out infinite, hoverPush 0.4s forwards;
            }

            /* avatar wrapper */
            .sticky-consult .avatar {
                width: 54px;
                height: 54px;
                border-radius: 50%;
                overflow: hidden;
                border: 3px solid #ffd700;
                flex-shrink: 0;
            }

            /* mobile adjustments */
            @media (max-width: 768px) {
                .sticky-consult {
                    left: 12px;
                    bottom: 20px;
                    top: auto;
                    transform: none;
                    padding: 12px 18px;
                    font-size: 15px;
                    gap: 12px;
                }

                .sticky-consult .avatar {
                    width: 44px;
                    height: 44px;
                    border-width: 2px;
                }
            }
        </style>



    </section>
    <!-- End Banner Area -->

    <!-- start About Area -->

    <!-- End About Area -->
    </br></br>
    <style>
        /* Sticky left-side counselling button - Enhanced */
        .sticky-consult {
            position: fixed;
            left: 20px;
            top: 80%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px;
            border-radius: 50%;
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 45px rgba(102, 126, 234, 0.4);
            font: 700 16px system-ui;
            border: 2px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            z-index: 1000;
            animation: floatGlowEnhanced 4s ease-in-out infinite;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            width: 70px;
            height: 70px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .sticky-consult:hover {
            padding: 12px 28px;
            width: auto;
            border-radius: 50px;
            box-shadow: 0 25px 60px rgba(102, 126, 234, 0.5);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            border: 2px solid rgba(255, 255, 255, 0.5);
            transform: translateY(-50%) scale(1.05);
        }

        /* Avatar styling */
        .sticky-consult .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid white;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sticky-consult:hover .avatar {
            transform: scale(1.1) rotate(5deg);
        }

        .sticky-consult .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Text animation (smooth reveal using max-width) */
        .sticky-consult>div:last-child {
            white-space: nowrap;
            opacity: 0;
            max-width: 0;
            transition: opacity 0.45s cubic-bezier(0.22, 1, 0.36, 1), max-width 0.45s cubic-bezier(0.22, 1, 0.36, 1), margin 0.45s;
            overflow: hidden;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #ffffff;
            padding-left: 0;
            display: inline-block;
        }

        .sticky-consult:hover>div:last-child {
            opacity: 1;
            max-width: 380px;
            /* space for full text */
            margin-left: 14px;
            padding-left: 8px;
        }

        /* Pulse effect on avatar */
        .sticky-consult::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: pulseEffect 2s ease-in-out infinite;
            z-index: -1;
        }

        .sticky-consult:hover::before {
            animation: pulseEffectHover 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Badge indicator */
        .sticky-consult::after {
            content: '●';
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 12px;
            color: #ffeb3b;
            animation: blink 2s infinite;
            text-shadow: 0 0 10px rgba(255, 235, 59, 0.8);
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .sticky-consult {
                left: 12px;
                bottom: 20px;
                top: auto;
                transform: none;
                width: 60px;
                height: 60px;
                padding: 8px;
            }

            .sticky-consult:hover {
                padding: 10px 20px;
                width: auto;
            }

            .sticky-consult .avatar {
                width: 50px;
                height: 50px;
                border-width: 2px;
            }

            .sticky-consult::before {
                width: 60px;
                height: 60px;
            }
        }

        /* Animations */
        @keyframes floatGlowEnhanced {

            0%,
            100% {
                transform: translateY(-50%) translateY(0);
                box-shadow: 0 15px 45px rgba(102, 126, 234, 0.4);
            }

            50% {
                transform: translateY(-50%) translateY(-12px);
                box-shadow: 0 25px 60px rgba(102, 126, 234, 0.6);
            }
        }

        @keyframes pulseEffect {

            0%,
            100% {
                width: 70px;
                height: 70px;
                opacity: 0.3;
            }

            50% {
                width: 90px;
                height: 90px;
                opacity: 0;
            }
        }

        @keyframes pulseEffectHover {
            0% {
                width: 70px;
                height: 70px;
                opacity: 0.5;
            }

            100% {
                width: 100px;
                height: 100px;
                opacity: 0;
            }
        }

        @keyframes blink {

            0%,
            49%,
            100% {
                opacity: 1;
            }

            50%,
            99% {
                opacity: 0.3;
            }
        }
        .popular-destinations-section {
            padding: 0px !important;
        }
        .rbt-section-gap {
           padding: 0px !important; /*120px 0; */
        }

        .rbt-video-area {
            margin-top:70px;
        }
                
    </style>

    <div class="sticky-consult" role="button" tabindex="0" aria-label="Book experts counselling"
        onclick="openExpertAdvisorModal()">
        <div class="avatar">
            <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="Counsellor">
        </div>
        <div>BOOK EXPERTS COUNSELLING</div>
    </div>

    <!-- Start faculties Area -->
    <div class="rbt-categories-area bg-color-white">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb--60">
                        <h5 class="title">MOSTLY STUDENTS’ DESTINATION</h5>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row g-5">
                @forelse($subjects as $subject)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="rbt-cat-box rbt-cat-box-1 variation-2 text-center">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ route('courseFilterOneOpen', ['subject' => $subject->name]) }}">
                                        <img src="{{ $subject->image ? asset($subject->image) : asset('assets/images/category/image/web-design.jpg') }}" alt="{{ $subject->name }}">
                                    </a>
                                </div>
                                <div class="icons">
                                    <img src="{{ $subject->image ? asset($subject->image) : asset('assets/images/category/web-design.png') }}" alt="{{ $subject->name }}">
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="{{ route('courseFilterOneOpen', ['subject' => $subject->name]) }}">{{ $subject->name }}</a></h5>
                                    @if ($subject->description)
                                        <p>{!! \Illuminate\Support\Str::limit($subject->description, 70) !!}</p>
                                    @endif
                                    <div class="read-more-btn">
                                        <a class="rbt-btn-link" href="{{ route('courseFilterOneOpen', ['subject' => $subject->name]) }}">Explore Courses<i class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @empty
                    <div class="col-12 text-center">
                        <p>No subjects available at the moment.</p>
                    </div>
                @endforelse
            </div> --}}
            <div class="container rbt-section-gap">
                <style>
                    /* Popular Destinations Section */
                    .popular-destinations-section {
                        background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
                        padding: 60px 0;
                    }

                    .destinations-title-wrapper {
                        margin-bottom: 50px;
                        text-align: center;
                    }

                    .destinations-title-wrapper .sub-title {
                        display: inline-block;
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        font-size: 14px;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 2px;
                        margin-bottom: 15px;
                    }

                    .destinations-title-wrapper h2 {
                        font-size: 2.5rem;
                        font-weight: 700;
                        color: #1a1a1a;
                        margin-bottom: 15px;
                    }

                    .destinations-title-wrapper p {
                        font-size: 16px;
                        color: #666;
                        max-width: 600px;
                        margin: 0 auto;
                    }

                    .destinations-grid {
                        display: grid;
                        grid-template-columns: 2fr 1fr 1fr;
                        grid-template-rows: auto auto;
                        gap: 20px;
                        margin-bottom: 40px;
                    }

                    .destination-card {
                        position: relative;
                        border-radius: 20px;
                        overflow: hidden;
                        cursor: pointer;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                        min-height: 250px;
                    }

                    .destination-card:nth-child(1) {
                        grid-row: 1 / 3;
                        grid-column: 1;
                    }

                    .destination-card:nth-child(2) {
                        grid-row: 1;
                        grid-column: 2;
                    }

                    .destination-card:nth-child(3) {
                        grid-row: 2;
                        grid-column: 2;
                    }

                    .destination-card:nth-child(4) {
                        grid-row: 1;
                        grid-column: 3;
                    }

                    .destination-card:nth-child(5) {
                        grid-row: 2;
                        grid-column: 3;
                    }

                    .destination-card img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        display: block;
                        transition: transform 0.5s ease;
                    }

                    .destination-card:hover img {
                        transform: scale(1.1);
                    }

                    .destination-overlay {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.85) 100%);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        opacity: 0;
                        transition: opacity 0.4s ease;
                        padding: 20px;
                        text-align: center;
                    }

                    .destination-card:hover .destination-overlay {
                        opacity: 1;
                    }

                    .destination-overlay a {
                        text-decoration: none;
                        color: white;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        gap: 15px;
                    }

                    .destination-overlay a h4 {
                        font-size: 1.5rem;
                        font-weight: 700;
                        margin: 0;
                        color: white;
                        transition: transform 0.4s ease;
                    }

                    .destination-overlay a:hover h4 {
                        transform: scale(1.05);
                    }

                    .destination-overlay a::before {
                        content: '';
                        width: 40px;
                        height: 40px;
                        background: white;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: transform 0.4s ease;
                    }

                    .destination-overlay a:hover::before {
                        transform: rotate(45deg);
                    }

                    /* Right Side Content */
                    .destinations-benefits {
                        background: white;
                        border-radius: 20px;
                        padding: 40px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    }

                    .destinations-benefits h3 {
                        font-size: 1.8rem;
                        font-weight: 700;
                        color: #1a1a1a;
                        margin-bottom: 10px;
                        line-height: 1.3;
                    }

                    .benefits-list {
                        list-style: none;
                        padding: 0;
                        margin: 25px 0 0 0;
                    }

                    .benefits-list li {
                        display: flex;
                        align-items: flex-start;
                        margin-bottom: 16px;
                        font-size: 15px;
                        color: #555;
                        line-height: 1.6;
                        animation: slideInLeft 0.5s ease forwards;
                    }

                    .benefits-list li:nth-child(1) {
                        animation-delay: 0s;
                    }

                    .benefits-list li:nth-child(2) {
                        animation-delay: 0.1s;
                    }

                    .benefits-list li:nth-child(3) {
                        animation-delay: 0.2s;
                    }

                    .benefits-list li:nth-child(4) {
                        animation-delay: 0.3s;
                    }

                    .benefits-list li i {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        color: white;
                        width: 24px;
                        height: 24px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 12px;
                        font-size: 12px;
                        flex-shrink: 0;
                        margin-top: 2px;
                    }

                    .benefits-list li span {
                        color: #333;
                        font-weight: 500;
                    }

                    .destinations-benefits .btn {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        color: white;
                        border: none;
                        padding: 14px 32px;
                        border-radius: 30px;
                        font-weight: 600;
                        font-size: 15px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        text-decoration: none;
                        display: inline-block;
                        margin-top: auto;
                    }

                    .destinations-benefits .btn:hover {
                        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
                        transform: translateY(-3px);
                        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
                        color: white;
                    }

                    @keyframes slideInLeft {
                        from {
                            opacity: 0;
                            transform: translateX(-20px);
                        }

                        to {
                            opacity: 1;
                            transform: translateX(0);
                        }
                    }

                    @media (max-width: 1024px) {
                        .destinations-grid {
                            grid-template-columns: 1fr 1fr;
                            grid-template-rows: auto auto auto;
                        }

                        .destination-card:nth-child(1) {
                            grid-row: 1 / 3;
                            grid-column: 1;
                        }

                        .destination-card:nth-child(2) {
                            grid-row: 1;
                            grid-column: 2;
                        }

                        .destination-card:nth-child(3) {
                            grid-row: 2;
                            grid-column: 2;
                        }

                        .destination-card:nth-child(4) {
                            grid-row: 3;
                            grid-column: 1;
                        }

                        .destination-card:nth-child(5) {
                            grid-row: 3;
                            grid-column: 2;
                        }

                        .destinations-benefits {
                            grid-column: 1 / -1;
                            margin-top: 20px;
                        }
                    }

                    @media (max-width: 768px) {
                        .destinations-grid {
                            grid-template-columns: 1fr;
                            grid-template-rows: auto;
                        }

                        .destination-card {
                            grid-column: 1 !important;
                            grid-row: auto !important;
                            min-height: 200px;
                        }

                        .destinations-benefits {
                            grid-column: 1;
                            margin-top: 20px;
                        }

                        .destinations-title-wrapper h2 {
                            font-size: 1.8rem;
                        }

                        .destinations-benefits h3 {
                            font-size: 1.4rem;
                        }
                    }
                </style>

                <div class="popular-destinations-section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="destinations-title-wrapper">

                                <h2>STUDENTS-PREFERRED STUDY DESTINATIONS </h2>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="destinations-grid">
                                <div class="destination-card">
                                    <img src="{{ asset('assets/images/uk.jpg') }}" alt="United Kingdom" loading="lazy">
                                    <div class="destination-overlay">
                                        <a
                                            href="https://kmfglobaleducation.com/courses/course-filter-one-toggle?country=1">
                                            <h4>United Kingdom</h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="destination-card">
                                    <img src="{{ asset('assets/images/Malta.jpg') }}" alt="Malta" loading="lazy">
                                    <div class="destination-overlay">
                                        <a
                                            href="https://kmfglobaleducation.com/courses/course-filter-one-toggle?country=14">
                                            <h4>Malta</h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="destination-card">
                                    <img src="{{ asset('assets/images/Canada.jpg') }}" alt="Canada" loading="lazy">
                                    <div class="destination-overlay">
                                        <a
                                            href="https://kmfglobaleducation.com/courses/course-filter-one-toggle?country=3">
                                            <h4>Canada</h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="destination-card">
                                    <img src="{{ asset('assets/images/Malaysia.jpg') }}" alt="Malaysia" loading="lazy">
                                    <div class="destination-overlay">
                                        <a
                                            href="https://kmfglobaleducation.com/courses/course-filter-one-toggle?country=5">
                                            <h4>Malaysia</h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="destination-card">
                                    <img src="{{ asset('assets/images/Australia.jpg') }}" alt="Australia" loading="lazy">
                                    <div class="destination-overlay">
                                        <a
                                            href="https://kmfglobaleducation.com/courses/course-filter-one-toggle?country=4">
                                            <h4>Australia</h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="destinations-benefits">
                                    <div>
                                        <h3>Multi-Destination Advantages</h3>
                                        <ul class="benefits-list">
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <span>Best Education System</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <span>High Quality Education</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <span>World Class Universities</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <span>Best Career Opportunities</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="https://kmfglobaleducation.com/" class="btn">
                                        Explore More Destinations
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </br> </br>

        </div>

    </div>
    <!-- End faculties Area -->

    <!--start explore premium services area  -->
    <style>
        .explore-premium-wrapper {
            background: #0f0f0f;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .explore-premium-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .explore-premium-left {
            z-index: 2;
        }

        .explore-premium-left h2 {
            font-size: 48px;
            font-weight: 900;
            color: #FFD700;
            line-height: 1.2;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .explore-premium-left p {
            font-size: 16px;
            color: #f5f5f5;
            line-height: 1.7;
            margin-bottom: 30px;
            max-width: 450px;
        }

        .explore-premium-btn {
            display: inline-block;
            padding: 14px 40px;
            background: linear-gradient(135deg, #B8860B 0%, #FFD700 100%);
            color: #000;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
            border: none;
            cursor: pointer;
        }

        .explore-premium-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 215, 0, 0.5);
        }

        .explore-premium-right {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .premium-ring-circle {
            position: relative;
            width: 380px;
            height: 380px;
            margin: 0 auto;
        }

        .ring-border {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid #FFD700;
            border-radius: 50%;
            top: 0;
            left: 0;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.3), inset 0 0 30px rgba(255, 215, 0, 0.1);
        }

        .ring-center {
            position: absolute;
            width: 160px;
            height: 160px;
            background: linear-gradient(135deg, #1a1400 0%, #2d1f00 100%);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.2), inset 0 0 20px rgba(255, 215, 0, 0.1);
            z-index: 10;
        }

        .service-pill {
            position: absolute;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 50px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 13px;
            color: #1a1a1a;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            white-space: nowrap;
            width: max-content;
        }

        .service-pill:hover {
            transform: scale(1.08);
            box-shadow: 0 15px 40px rgba(255, 215, 0, 0.3);
        }

        .service-pill-icon {
            font-size: 20px;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Top pill */
        .pill-top {
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Top right pill */
        .pill-top-right {
            top: 25px;
            right: -90px;
        }

        /* Bottom right pill */
        .pill-bottom-right {
            bottom: 25px;
            right: -90px;
        }

        /* Bottom pill */
        .pill-bottom {
            bottom: -35px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Left pill */
        .pill-left {
            bottom: 65px;
            left: -80px;
        }

        @media (max-width: 1024px) {
            .explore-premium-inner {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 0 20px;
            }

            .explore-premium-left h2 {
                font-size: 36px;
                text-align: center;
            }

            .explore-premium-left p {
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }

            .explore-premium-btn {
                display: block;
                text-align: center;
            }

            .premium-ring-circle {
                width: 320px;
                height: 320px;
            }
        }

        @media (max-width: 768px) {
            .explore-premium-wrapper {
                padding: 40px 0;
            }

            .explore-premium-left h2 {
                font-size: 28px;
            }

            .explore-premium-left p {
                font-size: 14px;
            }

            .premium-ring-circle {
                width: 280px;
                height: 280px;
            }

            .service-pill {
                font-size: 12px;
                padding: 10px 16px;
            }

            .service-pill-icon {
                font-size: 16px;
            }
        }
    </style>

    <section id="explorePremium" class="explore-premium-wrapper">
        <div class="explore-premium-inner">
            <!-- Left Content -->
            <div class="explore-premium-left">
                <h2>Stress-Free Study Abroad Applications: Expert Guidance Awaits</h2>
                <p>Get expert study abroad counseling and assistance with your application process. Our team of
                    professionals will provide you with personalized support and guidance</p>
                <a href="/premium" target="_blank" rel="noopener noreferrer" class="explore-premium-btn">Explore
                    Premium</a>
            </div>

            <!-- Right Content - Ring with Services -->
            <div class="explore-premium-right">
                <div class="premium-ring-circle">
                    <!-- Golden Ring -->
                    <div class="ring-border"></div>

                    <!-- Center Crown -->
                    <div class="ring-center">👑</div>

                    <!-- Service Pills -->
                    <div class="service-pill pill-top">
                        <span class="service-pill-icon">🎯</span>
                        <span>Personalised Counselling</span>
                    </div>

                    <div class="service-pill pill-top-right">
                        <span class="service-pill-icon">📋</span>
                        <span>Profile Building+Shortlisting</span>
                    </div>

                    <div class="service-pill pill-bottom-right">
                        <span class="service-pill-icon">✏️</span>
                        <span>Editing Guidance+Applications</span>
                    </div>

                    <div class="service-pill pill-bottom">
                        <span class="service-pill-icon">🎓</span>
                        <span>Visa+Scholarship Mentoring</span>
                    </div>

                    <div class="service-pill pill-left">
                        <span class="service-pill-icon">💰</span>
                        <span>Finance and Loan Advice</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--end explore premium services area  -->


    <!-- Start Top University Area  -->
    <!--<div class="rbt-category-area bg-color-white rbt-section-gapTop">-->
    <!--    <div class="container">-->
    <!--        <div class="row g-5">-->



    <!-- Start Category Box Layout  -->
    <!--            <div class="row g-5">-->
    <!--                <h2 class="title" align="center">EXPLORE TOP UNIVERSITIES</h2>-->
    <!-- Start Service Grid  -->

    <!-- End Service Grid  -->

    <!-- Start Service Grid  -->
    <!--                {{-- <div class="col-lg-4 col-xl-3 col-xxl-3 col-md-6 col-sm-6 col-12">-->
    <!--                <div class="service-card service-card-5">-->
    <!--                    <div class="inner">-->
    <!--                        <div class="icon">-->
    <!--                            <img src="assets/images/shape/icon-02.png" alt="Shape Images">-->
    <!--                        </div>-->
    <!--                        <div class="content">-->
    <!--                            <h6 class="title"><a href="#">Accounting</a></h6>-->
    <!--                            <p class="description">40+ Course</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div> --}}-->
    <!-- End Service Grid  -->

    <!-- Start Service Grid  -->
    <!-- Start University Grid -->
    <!--                <style>-->
    <!--                    .university-grid {-->
    <!--                        display: grid;-->
    <!--                        grid-template-columns: repeat(4, 1fr);-->
    <!--                        gap: 24px;-->
    <!--                    }-->

    <!--                    @media (max-width: 1200px) {-->
    <!--                        .university-grid {-->
    <!--                            grid-template-columns: repeat(3, 1fr);-->
    <!--                        }-->
    <!--                    }-->

    <!--                    @media (max-width: 900px) {-->
    <!--                        .university-grid {-->
    <!--                            grid-template-columns: repeat(2, 1fr);-->
    <!--                        }-->
    <!--                    }-->

    <!--                    @media (max-width: 600px) {-->
    <!--                        .university-grid {-->
    <!--                            grid-template-columns: 1fr;-->
    <!--                        }-->
    <!--                    }-->

    <!--                    .university-card {-->
    <!--                        background: #fff;-->
    <!--                        border-radius: 16px;-->
    <!--                        overflow: hidden;-->
    <!--                        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);-->
    <!--                        transition: .3s;-->
    <!--                        display: flex;-->
    <!--                        flex-direction: column;-->
    <!--                        height: 100%-->
    <!--                    }-->

    <!--                    .university-card:hover {-->
    <!--                        transform: translateY(-8px);-->
    <!--                        box-shadow: 0 12px 24px rgba(0, 0, 0, .12)-->
    <!--                    }-->

    <!--                    .card-image {-->
    <!--                        position: relative;-->
    <!--                        height: 160px-->
    <!--                    }-->

    <!--                    .card-image img {-->
    <!--                        width: 100%;-->
    <!--                        height: 100%;-->
    <!--                        object-fit: cover-->
    <!--                    }-->

    <!--                    .card-logo {-->
    <!--                        position: absolute;-->
    <!--                        bottom: -20px;-->
    <!--                        left: 16px;-->
    <!--                        width: 80px;-->
    <!--                        height: 80px;-->
    <!--                        background: #fff;-->
    <!--                        border-radius: 12px;-->
    <!--                        padding: 8px;-->
    <!--                        box-shadow: 0 2px 8px rgba(0, 0, 0, .1);-->
    <!--                        display: flex;-->
    <!--                        align-items: center;-->
    <!--                        justify-content: center;-->
    <!--                        border: 3px solid #ff7f32;-->
    <!--                        overflow: hidden-->
    <!--                    }-->

    <!--                    .card-logo img {-->
    <!--                        max-width: 100%;-->
    <!--                        max-height: 100%;-->
    <!--                        object-fit: contain-->
    <!--                    }-->

    <!--                    .card-content {-->
    <!--                        flex: 1;-->
    <!--                        padding: 32px 16px 20px;-->
    <!--                        display: flex;-->
    <!--                        flex-direction: column-->
    <!--                    }-->

    <!--                    .card-title {-->
    <!--                        font: 600 1.1rem/1.2 sans-serif;-->
    <!--                        color: #0066cc;-->
    <!--                        margin: 0 0 8px-->
    <!--                    }-->

    <!--                    .card-location {-->
    <!--                        font-size: .9rem;-->
    <!--                        color: #000;-->
    <!--                        margin-bottom: 16px;-->
    <!--                        display: flex;-->
    <!--                        align-items: center;-->
    <!--                        gap: 6px-->
    <!--                    }-->

    <!--                    .card-location svg {-->
    <!--                        width: 16px;-->
    <!--                        height: 16px;-->
    <!--                        fill: #ff7f32-->
    <!--                    }-->

    <!--                    .ranking-badges {-->
    <!--                        display: flex;-->
    <!--                        gap: 8px;-->
    <!--                        margin-bottom: auto;-->
    <!--                        flex-wrap: wrap;-->
    <!--                        justify-content: center-->
    <!--                    }-->

    <!--                    .badge {-->
    <!--                        background: #e8f5e8;-->
    <!--                        color: #2d7c2d;-->
    <!--                        padding: 6px 10px;-->
    <!--                        border-radius: 8px;-->
    <!--                        font: 600 .75rem/1 sans-serif;-->
    <!--                        min-width: 68px;-->
    <!--                        text-align: center;-->
    <!--                        display: flex;-->
    <!--                        flex-direction: column;-->
    <!--                        align-items: center;-->
    <!--                        justify-content: center;-->
    <!--                        height: 48px-->
    <!--                    }-->

    <!--                    .badge.country {-->
    <!--                        background: #fff3e0;-->
    <!--                        color: #e67e22-->
    <!--                    }-->

    <!--                    .badge span {-->
    <!--                        display: block;-->
    <!--                        font-size: 1.2rem;-->
    <!--                        font-weight: 700;-->
    <!--                        line-height: 1;-->
    <!--                        margin-bottom: 2px-->
    <!--                    }-->

    <!--                    .find-courses-btn {-->
    <!--                        background: #0066cc;-->
    <!--                        color: #fff;-->
    <!--                        border: none;-->
    <!--                        padding: 10px 16px;-->
    <!--                        border-radius: 8px;-->
    <!--                        font-weight: 600;-->
    <!--                        width: 100%;-->
    <!--                        cursor: pointer;-->
    <!--                        transition: .3s;-->
    <!--                        text-decoration: none;-->
    <!--                        text-align: center;-->
    <!--                    }-->

    <!--                    .find-courses-btn:hover {-->
    <!--                        background: #0055aa;-->
    <!--                        color: #fff;-->
    <!--                        text-decoration: none-->
    <!--                    }-->
    <!--                </style>-->

    <!--                <div class="university-grid">-->
    <!--                    @foreach ($universities as $university)
    -->
    <!--                        <div class="university-card">-->
    <!--                            <div class="card-image">-->
    <!--                                <img src="{{ $university->university_image ? asset($university->university_image) : asset('assets/images/course/course-online-01.jpg') }}"-->
    <!--                                    alt="{{ $university->university_name }}">-->
    <!--                                <div class="card-logo">-->
    <!--                                    <img src="{{ $university->logo ? asset($university->logo) : asset('assets/images/client/avatar-02.png') }}"-->
    <!--                                        alt="{{ $university->university_name }} Logo">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="card-content">-->
    <!--                                <h3 class="card-title">{{ $university->university_name }}</h3>-->
    <!--                                <p class="card-location">-->
    <!--                                    <svg viewBox="0 0 24 24">-->
    <!--                                        <path-->
    <!--                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />-->
    <!--                                    </svg>-->
    <!--                                    <b>{{ $university->location ? $university->location : 'Location not specified' }}</b>-->
    <!--                                </p>-->
    <!--                                <div class="ranking-badges">-->
    <!--                                    <div class="badge global"><span>{{ $university->global_rank ?? 'N/A' }}</span>-->
    <!--                                        Global(QS)</div>-->
    <!--                                    <div class="badge country"><span>{{ $university->in_country_rank ?? 'N/A' }}</span>-->
    <!--                                        in Country</div>-->
    <!--                                </div><br>-->
    <!--                                <a href="{{ route('courseFilterOneOpen', ['university' => $university->id]) }}"-->
    <!--                                    class="find-courses-btn">Find Courses</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--
    @endforeach-->
    <!--                </div>-->
    <!-- End University Grid -->

    <!-- Start Pagination -->
    <!--                @if ($universities->hasPages())
    -->
    <!--                    <div class="row">-->
    <!--                        <div class="col-lg-12 mt--60">-->
    <!--                            <nav>-->
    <!--                                <ul class="rbt-pagination">-->
    <!--                                    {{ $universities->links('vendor.pagination.custom') }}-->
    <!--                                </ul>-->
    <!--                            </nav>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--
    @endif-->
    <!-- End Pagination -->


    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- End Top University Area  -->

    <div class="rbt-video-area bg-color-white rbt-section-gap overflow-hidden">
        <div class="container">
            <div class="row row--35 align-items-center mt_dec--50">
                <div class="col-xl-6 col-12 mt--50">
                    <div class="video-popup-wrapper version-02">
                        <div class="v-shape-1 style-02">
                            <!--<img src="assets/images/shape/video-dot-02.png" alt="Shape">-->
                        </div>
                        <img class="w-100 rbt-radius position-relative"
                            src="{{ asset('assets/images/others/video-11.png') }}">
                        {{-- <a class="rbt-btn btn-white rounded-player-2 popup-video position-to-top bounced-btn" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo"> --}}
                        <span class="play-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-12 mt--50">
                    <div class="inner">
                        <div class="section-title text-start">
                            {{-- <h6 class="b2 mb--15"><span class="theme-gradient">Histudy</span></h6> --}}
                            <h2 class="title w-600">ABOUT US</h2>
                        </div>

                        <!-- Start Feature List  -->

                        <div class="rbt-feature-wrapper mt--30 ml_dec_20">
                            <div class="rbt-feature feature-style-2 rbt-radius">
                                <div class="icon bg-pink-opacity">
                                    <i class="feather-heart"></i>
                                </div>
                                <div class="feature-content">
                                    {{-- <h6 class="feature-title">Flexible Classes</h6> --}}
                                    <p class="feature-description">KMF Global Education Ltd transforms students dream to
                                        study abroad. It is specialized in providing the guidance to the students to find
                                        the right universities and the right courses. KMF Global Education ltd empowers the
                                        students to unlock their potentials and achieve their academic excellence.

                                    </p>
                                </div>
                            </div>

                            <div class="rbt-feature feature-style-2 rbt-radius">
                                <div class="icon bg-primary-opacity">
                                    <i class="feather-book"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">Our Mission
                                    </h6>
                                    <p class="feature-description">Personalized, reliable, ethical consultancy guides
                                        students abroad with confidence, connecting ambitions to ideal institutions.

                                    </p>
                                </div>
                            </div>

                            <div class="rbt-feature feature-style-2 rbt-radius">
                                <div class="icon bg-secondary-opacity">
                                    <i class="feather-award"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">Our Vision
                                    </h6>
                                    <p class="feature-description">Personalized guidance to affordable universities,
                                        courses, visas, accommodation via vast partner network.

                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- End Feature List  -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- End Services Area  -->
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">&nbsp</h2>
                </div>
            </div>
        </div>
        <!-- Start Card Area -->
        <div class="row row--15 mt_dec--30">
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="section-title text-start">
                    <h2 class="title">Our services.</h2>
                    <p class="description mt--20">There are many variations of passages of the Ipsum available.</p>
                    <div class="read-more-btn">
                        <a class="rbt-btn btn-gradient radius rbt-marquee-btn marquee-text-y"
                            href="{{ route('about') }}">
                            <span data-text="About More Us">
                                About More Us
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Start Service Grid  -->
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="service-card service-card-6 bg-color bg-card-color-1">
                    <div class="inner">

                        <div class="icon">

                            <img src="{{ asset('assets/images/shape/service-01.png') }}" alt="Shape Image">

                            <img class="opacity_image" src="http://localhost:8000/assets/images/shape/service-01.png"
                                alt="Shape Images">

                        </div>

                        <div class="content">
                            <h6 class="title"><a href="{{ route('services.admission') }}">Admission</a></h6>
                            <p class="description">English Learning looking for random paragraphs, you've come to the right
                                place. When a random word.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Service Grid  -->

            <!-- Start Service Grid  -->
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="service-card service-card-6 bg-color bg-card-color-2">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{ asset('assets/images/shape/service-04.png') }}" alt="Shape Images">
                            <img class="opacity_image" src="{{ asset('assets/images/shape/service-04.png') }}"
                                alt="Shape Images">
                        </div>

                        <div class="content">
                            <h6 class="title"><a href="{{ route('services.scholarship') }}">Scholarships</a></h6>
                            <p class="description">Javascript Learning looking for random paragraphs, you've come to the
                                right place. When a random word.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Service Grid  -->

            <!-- Start Service Grid  -->
            <div class="col-lg-4 col-xl-4 col-xxl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="service-card service-card-6 bg-color bg-card-color-3">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{ asset('assets/images/shape/service-03.png') }}" alt="Shape Images">
                            <img class="opacity_image" src="{{ asset('assets/images/shape/service-03.png') }}"
                                alt="Shape Images">
                        </div>

                        <div class="content">
                            <h6 class="title"><a href="{{ route('services.visa-guidance') }}">Visa Guidance</a></h6>
                            <p class="description">Angular Learning looking for random paragraphs, you've come to the right
                                place. When a random word.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Service Grid  -->

            <!-- Start Service Grid  -->
            <div class="col-lg-4 col-xl-4 col-xxl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="service-card service-card-6 bg-color bg-card-color-4">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{ asset('assets/images/shape/service-02.png') }}" alt="Shape Images">
                            <img class="opacity_image" src="{{ asset('assets/images/shape/service-02.png') }}"
                                alt="Shape Images">_
                            </div. <div class="content">
                            <h6 class="title"><a href="{{ route('services.departure-guidance') }}">Departure
                                    Guidance</a></h6>
                            <p class="description">Php Learning looking for random paragraphs, you've come to the right
                                place. When a random word.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Service Grid  -->

            <!-- Start Service Grid  -->
            <div class="col-lg-4 col-xl-4 col-xxl-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="service-card service-card-6 bg-color bg-card-color-5">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{ asset('assets/images/shape/service-05.png') }}" alt="Shape Images">
                            <img class="opacity_image" src="{{ asset('assets/images/shape/service-05.png') }}"
                                alt="Shape Images">
                        </div>

                        <div class="content">
                            <h6 class="title"><a href="{{ route('services.career-counsel') }}">IELTS & Career</a></h6>
                            <p class="description">Spoken english looking for random paragraphs, you've come to the right
                                place. When a random word.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Service Grid  -->
        </div>
        <!-- End Card Area -->
    </div>
    <!-- End Services Area  -->



    {{-- resources/views/components/popular-destinations.blade.php --}}
    @php
        $destinations = [
            [
                'image' => 'h5_project_img01.jpg',
                'title' => 'United Kingdom',
                'url' => '/study-abroad/uk',
                'class' => 'col-md-4 p-1 h-100',
                'height' => 'h-100',
            ],
            [
                'image' => 'h5_project_img02.jpg',
                'title' => 'United States',
                'url' => '/study-abroad/usa',
                'class' => 'col-md-4 p-1 h-100',
                'height' => 'h-50',
            ],
            [
                'image' => 'h5_project_img03.jpg',
                'title' => 'Canada',
                'url' => '/study-abroad/canada',
                'class' => 'col-md-4 p-1 h-100',
                'height' => 'h-50 mt-2',
            ],
            [
                'image' => 'h5_project_img04.jpg',
                'title' => 'Malaysia',
                'url' => '/study-abroad/malaysia',
                'class' => 'col-md-4 p-1 h-100',
                'height' => 'h-50',
            ],
            [
                'image' => 'h5_project_img05.jpg',
                'title' => 'Australia',
                'url' => '/study-abroad/australia',
                'class' => 'col-md-4 p-1 h-100',
                'height' => 'h-50 mt-2',
            ],
        ];

        $advantages = [
            'Best Education System',
            'High Quality Education',
            'World Class Universities',
            'Best Career Opportunities',
        ];
    @endphp



    <!-- Start Popular Course Area  -->
    <!--<div class="rbt-featured-course bg-color-white rbt-section-gap">-->
    <!--    <div class="container">-->
    <!--        <div class="row g-5 align-items-end mb--60">-->
    <!--            <div class="col-lg-6 col-md-12 col-12">-->
    <!--                <div class="section-title text-start">-->
    <!--                    <h2 class="title">POPULAR COURSES</h2>-->
    <!--                    <p class="description mt--20">Choose Your Desired Course From Our Wide Range Of Courses-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            {{-- <div class="col-lg-6 col-md-12 col-12">-->
    <!--                                                    <div class="load-more-btn text-start text-lg-end">-->
    <!--                                                        <a class="rbt-btn btn-border icon-hover radius-round" href="#">-->
    <!--                                                            <span class="btn-text">BROWSE ALL KMF COURSE</span>-->
    <!--                                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>-->
    <!--                                                        </a>-->
    <!--                                                    </div>-->
    <!--                                                </div> --}}-->
    <!--        </div>-->

    <!-- Start Card Area -->
    <!--        <div class="row g-5">-->
    <!--            @foreach ($courses as $course)
    -->
    <!--                <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up"-->
    <!--                    data-sal-duration="800">-->
    <!--                    <div class="rbt-card variation-01 rbt-hover">-->
    <!--                        <div class="rbt-card-img">-->
    <!--                            <a href="{{ route('courseDetails2', [$course->slug ?? $course->id]) }}">-->
    <!--                                <img src="{{ $course->images ? asset($course->images) : asset('assets/images/course/course-online-01.jpg') }}"-->
    <!--                                    alt="Card image">-->
    <!--                                @if ($course->off_price && $course->current_price)
    -->
    <!--                                    <div class="rbt-badge-3 bg-white">-->
    <!--                                        <span>-{{ round((1 - $course->current_price / max(1, $course->off_price)) * 100) }}%</span>-->
    <!--                                        Fl <span>Off</span>-->
    <!--                                    </div>-->
    <!--
    @endif-->
    <!--                            </a>-->
    <!--                        </div>-->
    <!--                        <div class="rbt-card-body">-->
    <!--                            <div class="rbt-card-top">-->
    <!--                                <div class="rbt-review">-->
    <!--                                    <div class="rating">-->
    <!--                                        @for ($i = 0; $i < 5; $i++)
    -->
    <!--                                            <i-->
    <!--                                                class="fas fa-star {{ $i < round($course->rating ?? 0) ? '' : 'text-muted' }}"></i>-->
    <!--
    @endfor-->
    <!--                                    </div>-->
    <!--                                    <span class="rating-count"> ({{ rand(1, 40) }} Reviews)</span>-->
    <!--                                </div>-->
    <!--                                <div class="rbt-bookmark-btn">-->
    <!--                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i-->
    <!--                                            class="feather-bookmark"></i></a>-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <h4 class="rbt-card-title">-->
    <!--                                <a-->
    <!--                                    href="{{ route('courseDetails2', [$course->slug ?? $course->id]) }}">{{ $course->course_name }}</a>-->
    <!--                            </h4>-->

    <!--                            <ul class="rbt-meta">-->
    <!--                                {{-- <li><i class="feather-book"></i>Subjects</li> --}}-->
    <!--                                <li><i class="feather-home"></i>{{ $course->university->university_name }} </li>-->
    <!--                            </ul>-->

    <!--                            {{-- <p class="rbt-card-text">{{ \Illuminate\Support\Str::limit($course->description ?? 'No description available.', 100) }}</p> --}}-->
    <!--                            <div class="rbt-author-meta mb--10">-->
    <!--                                {{-- <div class="rbt-avater">-->
    <!--                                                                        <a href="#">-->
    <!--                                                                            <img src="{{ optional($course->instructor)->avatar ? asset(optional($course->instructor)->avatar) : asset('assets/images/client/avatar-02.png') }}" alt="{{ optional($course->instructor)->name ?? 'Instructor' }}">-->
    <!--                                                                        </a>-->
    <!--                                                                    </div>-->
    <!--                                                                    <div class="rbt-author-info">-->
    <!--                                                                        By <a href="#">{{ optional($course->instructor)->name ?? 'Instructor' }}</a> In <a href="#">{{ optional($course->university)->university_name ?? 'Category' }}</a>-->
    <!--                                                                    </div> --}}-->
    <!--                            </div>-->
    <!--                            <div class="rbt-card-bottom">-->
    <!--                                {{-- <div class="rbt-price">-->
    <!--                                                                        <span class="current-price">${{ $course->current_price ?? '0' }}</span>-->
    <!--                                                                        @if ($course->off_price)-->
    <!--                                                                            <span class="off-price">${{ $course->off_price }}</span>-->
    <!--                                                                        @endif-->
    <!--                                                                    </div> --}}-->
    <!--                                <a class="rbt-btn-link"-->
    <!--                                    href="{{ route('courseDetails2', [$course->slug ?? $course->id]) }}">Learn-->
    <!--                                    More<i class="feather-arrow-right"></i></a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--
    @endforeach-->
    <!--        </div>-->
    <!-- End Card Area -->
    <!--    </div>-->
    <!--</div>-->
    <!-- End Popular Course Area  -->

    <!--<section class="destination-area-two py-5 position-relative" style="background: url('https://www.educationhub-bd.com/assets/front/img/blog-bg-1.png')">-->
    <!--<img height="100%" width="100%" data-bb-lazy="true" data-aos="fade-left" data-aos-delay="500" loading="lazy" src="./Education Hub - The Most Reliable Study Abroad Consultancy Near You._files/about-shape03.png" alt="25 Years Of Experience In This Finance Advisory Company" class="aos-init right-shape entered loading aos-animate img-fluid w-auto" data-ll-status="loading">-->

    </section>




    <div class="rbt-video-area bg-color-white overflow-hidden">
        <div class="container" >
            <div class="row mb--60">
                <div class="col-lg-12" style="margin-top:70px;">
                    <div class="section-title text-center">
                        <h2 class="title w-600">How We Simplify The Process</h2>
                    </div>
                </div>
            </div>

            <style>
                .process-cards-wrapper {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 30px;
                    margin: 60px 0;
                }

                .process-card {
                    background: white;
                    border-radius: 12px;
                    padding: 40px 30px;
                    text-align: center;
                    transition: all 0.3s ease;
                    position: relative;
                }

                .process-card:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
                }

                .process-card-icon {
                    width: 80px;
                    height: 80px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 25px;
                    font-size: 36px;
                    font-weight: 600;
                    color: white;
                    transition: transform 0.3s ease;
                }

                .process-card:hover .process-card-icon {
                    transform: scale(1.1);
                }

                .process-card-icon.guidance {
                    background: linear-gradient(135deg, #c8b6ff 0%, #9d7ff7 100%);
                }

                .process-card-icon.support {
                    background: linear-gradient(135deg, #ffc0cb 0%, #ff97ba 100%);
                }

                .process-card-icon.expertise {
                    background: linear-gradient(135deg, #7dd3fc 0%, #38bdf8 100%);
                }

                .process-card h4 {
                    font-size: 18px;
                    font-weight: 600;
                    color: #1a1a1a;
                    margin: 0 0 15px 0;
                }

                .process-card p {
                    font-size: 14px;
                    line-height: 1.6;
                    color: #666;
                    margin: 0;
                }

                /* Connector lines */
                .process-cards-wrapper::before {
                    content: '';
                    position: absolute;
                    top: 40px;
                    left: 15%;
                    right: 15%;
                    height: 2px;
                    background: linear-gradient(90deg, transparent 0%, #ddd 50%, transparent 100%);
                    z-index: 0;
                }

                @media (max-width: 1024px) {
                    .process-cards-wrapper {
                        grid-template-columns: 1fr;
                        gap: 20px;
                    }
                }

                @media (max-width: 768px) {
                    .process-card {
                        padding: 30px 20px;
                    }

                    .process-card h4 {
                        font-size: 16px;
                    }

                    .process-card p {
                        font-size: 13px;
                    }
                }
            </style>

            <div class="process-cards-wrapper">
                <div class="process-card">
                    <div class="process-card-icon guidance">📋</div>
                    <h4>Guidance</h4>
                    <p>We provide personalized support for each important academic milestone and decision in your study abroad journey.</p>
                </div>

                <div class="process-card">
                    <div class="process-card-icon support">✈️</div>
                    <h4>Support</h4>
                    <p>Get 24/7 assistance from our expert team throughout the application process and beyond your admission.</p>
                </div>

                <div class="process-card">
                    <div class="process-card-icon expertise">⭐</div>
                    <h4>Expertise</h4>
                    <p>Leverage our extensive knowledge of global universities and ensure your profile stands out to admissions.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-section-gap">
        <div class="rbt-counterup-area bg_image  bg_image_fixed bg_image--20 ptb--170 bg-black-overlay"
            data-black-overlay="2">
            <div class="conter-style-2">
                <div class="container">
                    <div class="row g-5">
                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                            <div class="rbt-counterup style-2">
                                <div class="inner">
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                        </h3>
                                        <span class="subtitle">Learners &amp; counting</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                            <div class="rbt-counterup style-2">
                                <div class="inner">
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="800">00</span>
                                        </h3>
                                        <span class="subtitle">Courses & Video</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                            <div class="rbt-counterup style-2">
                                <div class="inner">
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="1000">00</span>
                                        </h3>
                                        <span class="subtitle">Certified Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                            <div class="rbt-counterup style-2">
                                <div class="inner">
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                        </h3>
                                        <span class="subtitle">Certified Students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Student Feedback Counter  -->

    <!-- Start Success Stories Counter  -->

    {{-- <div class="success-stories-area rbt-section-gap">
        <div class="container">
            <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle bg-secondary-opacity">Student Achievements</span>
                        <h2 class="title">Success Stories From Our Students</h2>
                        <p class="description mt--20">Hear directly from our successful students about their transformative
                            journeys</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="success-stories-slider swiper">
                        <style>
                            .success-stories-area {
                                background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
                            }

                            .success-stories-slider {
                                padding: 40px 20px;
                            }

                            .success-story-card {
                                background: white;
                                border-radius: 15px;
                                padding: 30px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                                min-height: 350px;
                                display: flex;
                                flex-direction: column;
                                justify-content: space-between;
                                transition: all 0.3s ease;
                                opacity: 0;
                                animation: slideInCard 0.6s ease forwards;
                            }

                            .success-story-card:hover {
                                transform: translateY(-8px);
                                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
                            }

                            @keyframes slideInCard {
                                from {
                                    opacity: 0;
                                    transform: translateX(50px);
                                }

                                to {
                                    opacity: 1;
                                    transform: translateX(0);
                                }
                            }

                            .swiper-slide:nth-child(1) .success-story-card {
                                animation-delay: 0s;
                            }

                            .swiper-slide:nth-child(2) .success-story-card {
                                animation-delay: 0.2s;
                            }

                            .swiper-slide:nth-child(3) .success-story-card {
                                animation-delay: 0.4s;
                            }

                            .success-story-header {
                                display: flex;
                                align-items: center;
                                gap: 15px;
                                margin-bottom: 20px;
                            }

                            .story-avatar {
                                width: 60px;
                                height: 60px;
                                border-radius: 50%;
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-weight: 600;
                                font-size: 24px;
                            }

                            .story-info h4 {
                                margin: 0;
                                font-size: 16px;
                                font-weight: 600;
                                color: #1a1a1a;
                            }

                            .story-info p {
                                margin: 5px 0 0 0;
                                font-size: 13px;
                                color: #666;
                            }

                            .story-content {
                                flex: 1;
                                margin-bottom: 15px;
                            }

                            .story-content p {
                                font-size: 15px;
                                line-height: 1.6;
                                color: #555;
                                margin: 0;
                            }

                            .story-rating {
                                display: flex;
                                gap: 5px;
                                margin-bottom: 15px;
                            }

                            .star {
                                color: #ffc107;
                                font-size: 16px;
                            }

                            .story-destination {
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                color: white;
                                padding: 8px 15px;
                                border-radius: 20px;
                                display: inline-block;
                                font-size: 12px;
                                font-weight: 600;
                            }

                            .swiper-pagination {
                                margin-top: 30px;
                            }

                            .swiper-pagination-bullet {
                                background: #667eea;
                                opacity: 0.5;
                            }

                            .swiper-pagination-bullet-active {
                                background: #667eea;
                                opacity: 1;
                            }

                            .swiper-button-next,
                            .swiper-button-prev {
                                color: #667eea;
                                background: rgba(102, 126, 234, 0.1);
                                padding: 15px;
                                border-radius: 50%;
                                width: 50px;
                                height: 50px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .swiper-button-next:after,
                            .swiper-button-prev:after {
                                font-size: 20px;
                            }

                            @media (max-width: 768px) {
                                .success-story-card {
                                    min-height: auto;
                                    padding: 20px;
                                }

                                .swiper-button-next,
                                .swiper-button-prev {
                                    display: none;
                                }
                            }
                        </style>

                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="success-story-card">
                                    <div>
                                        <div class="success-story-header">
                                            <div class="story-avatar">SA</div>
                                            <div class="story-info">
                                                <h4>Sarah Anderson</h4>
                                                <p>UK · Computer Science</p>
                                            </div>
                                        </div>

                                        <div class="story-rating">
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                        </div>

                                        <div class="story-content">
                                            <p>"KMF Global Education made my dream of studying at Oxford a reality. From the
                                                initial consultation to visa approval, their team was incredibly supportive
                                                and professional. I couldn't have done it without them!"</p>
                                        </div>
                                    </div>
                                    <span class="story-destination">Oxford University</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="success-story-card">
                                    <div>
                                        <div class="success-story-header">
                                            <div class="story-avatar"
                                                style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">PK
                                            </div>
                                            <div class="story-info">
                                                <h4>Priya Kapoor</h4>
                                                <p>Canada · Engineering</p>
                                            </div>
                                        </div>

                                        <div class="story-rating">
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                        </div>

                                        <div class="story-content">
                                            <p>"The guidance I received for my Canadian universities was outstanding. KMF
                                                helped me navigate the entire process with such ease. I'm now studying at
                                                University of Toronto and absolutely loving it!"</p>
                                        </div>
                                    </div>
                                    <span class="story-destination">University of Toronto</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="success-story-card">
                                    <div>
                                        <div class="success-story-header">
                                            <div class="story-avatar"
                                                style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">JM
                                            </div>
                                            <div class="story-info">
                                                <h4>James Mitchell</h4>
                                                <p>Australia · Business</p>
                                            </div>
                                        </div>

                                        <div class="story-rating">
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                        </div>

                                        <div class="story-content">
                                            <p>"Best decision ever! The team at KMF was extremely responsive and helped me
                                                get admitted to Melbourne Business School. Their expertise in the Australian
                                                education system is unmatched."</p>
                                        </div>
                                    </div>
                                    <span class="story-destination">University of Melbourne</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="success-story-card">
                                    <div>
                                        <div class="success-story-header">
                                            <div class="story-avatar"
                                                style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">EM
                                            </div>
                                            <div class="story-info">
                                                <h4>Emma Martinez</h4>
                                                <p>USA · Medicine</p>
                                            </div>
                                        </div>

                                        <div class="story-rating">
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                        </div>

                                        <div class="story-content">
                                            <p>"Getting into Harvard Medical School was a dream, and KMF made it possible.
                                                Their personalized approach and attention to detail in preparing my
                                                application was phenomenal!"</p>
                                        </div>
                                    </div>
                                    <span class="story-destination">Harvard Medical School</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            new Swiper('.success-stories-slider', {
                                slidesPerView: 1,
                                spaceBetween: 30,
                                pagination: {
                                    el: '.success-stories-slider .swiper-pagination',
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: '.success-stories-slider .swiper-button-next',
                                    prevEl: '.success-stories-slider .swiper-button-prev',
                                },
                                breakpoints: {
                                    768: {
                                        slidesPerView: 2,
                                    },
                                    1024: {
                                        slidesPerView: 3,
                                    },
                                },
                                autoplay: {
                                    delay: 5000,
                                    disableOnInteraction: false,
                                },
                                loop: true,
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- End Success Stories  -->

    <!--    <div class="col-lg-12">-->
    <!--    <div class="swiper team-slide-activation rbt-arrow-between rbt-dot-bottom-center swiper-initialized swiper-horizontal swiper-pointer-events">-->
    <!--        <div class="swiper-wrapper" id="swiper-wrapper-486edb7b3fb2971010" aria-live="polite" style="transform: translate3d(-1335px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="4 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="5 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                     <a href="#">-->
    <!--                         <img src="{{ asset('assets/images/team/team-01.jpg') }}" alt="Team Image">-->
    <!--                     </a>-->
    <!--                    </div>-->

    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="5" role="group" aria-label="6 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="assets/images/team/team-01.jpg" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group" aria-label="2 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">John Due</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Griffin DM</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide" data-swiper-slide-index="4" role="group" aria-label="5 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5" role="group" aria-label="6 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group" aria-label="1 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Aaron M. Griffin</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" role="group" aria-label="2 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">John Due</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group" aria-label="3 / 6" style="width: 415px; margin-right: 30px;">-->
    <!--                <div class="team team-style--bottom variation-2">-->
    <!--                    <div class="thumbnail">-->
    <!--                        <a href="#"><img src="{{ asset('assets/images/team/team-01.JPG') }}" alt="Blog Images"></a>-->
    <!--                    </div>-->
    <!--                    <div class="content">-->
    <!--                        <div class="inner">-->
    <!--                            <h4 class="title"><a href="#">Griffin DM</a></h4>-->
    <!--                            <p class="designation">Depertment Head</p>-->
    <!--                        </div>-->
    <!--                        <div class="icon-right">-->
    <!--                            <a href="#"><i class="feather-arrow-right"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div></div>-->

    <!--        <div class="rbt-swiper-arrow rbt-arrow-left" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-486edb7b3fb2971010">-->
    <!--            <div class="custom-overfolow">-->
    <!--                <i class="rbt-icon feather-arrow-left"></i>-->
    <!--                <i class="rbt-icon-top feather-arrow-left"></i>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="rbt-swiper-arrow rbt-arrow-right" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-486edb7b3fb2971010">-->
    <!--            <div class="custom-overfolow">-->
    <!--                <i class="rbt-icon feather-arrow-right"></i>-->
    <!--                <i class="rbt-icon-top feather-arrow-right"></i>-->
    <!--            </div>-->
    <!--        </div>-->


    <!--        <div class="rbt-swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span></div>-->
    <!--    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>-->
    <!--</div>-->

    <!-- Start Succsess Stoy Counter  -->







    <!-- Close Faqs -->
    </br>


    <!-- Start Newsletter Area  -->

    <!-- End Newsletter Area  -->








    @include('frontend-partials.expert-advisor-modal')
    @include('frontend-partials.footer')

    <!-- End Copyright Area  -->
@endsection
