<!DOCTYPE html>
<html lang="en">

<x-head />

<style>
    .find-courses-btn {
        text-align: center !important;
    }
</style>

<body class="<?php echo isset($bodyClass) ? $bodyClass : 'rbt-header-sticky'; ?>">


    <?php

        if (!isset($switcher)) {
            ?>
    <x-switcher />
    <?php
        }
    ?>

    <?php

        if (!isset($header)) {
            ?>
    {{-- <x-header/> --}}
    <?php
        }
    ?>

    @yield('content')

    <?php

        if (isset($topToBottom) && $topToBottom === 'true') {
            ?>
    <x-topToBottom />
    <?php
        }
    ?>

    <?php

        if (isset($footer) && $footer === 'true') {
            ?>
    {{-- <x-footer /> --}}
    <?php
        }
    ?>


    <x-script />

    @stack('scripts')
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/692a01cc19aa9e197e301027/1jb61e2eh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
<!--<script id="pixel-chaty" async="true" src="https://cdn.chaty.app/pixel.js?id=pyncEeKQ"></script>-->

<!-- Meta Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '870666095921991');
    fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=870666095921991&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->

</html>
