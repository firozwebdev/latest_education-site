@extends('layout.layout')

@php
$footer='true';
$topToBottom='true';
$bodyClass='';
@endphp

@section('content')

```
@include('frontend-partials.header')

<!-- Start Side Nav -->
<x-sideVav/>
<!-- End Side Nav -->

<a class="close_side_menu" href="javascript:void(0);"></a>
<style>

    .container-fluid{
        display: none !important;
    }
</style>

<div class="rbt-overlay-page-wrapper">
    <div class="breadcrumb-image-container breadcrumb-style-max-width">
        <div class="breadcrumb-image-wrapper">
            <div class="breadcrumb-dark">
                <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
            </div>
        </div>
        <div class="breadcrumb-content-top text-center">
            <h1 class="title">Terms & Conditions</h1>
            <p class="mb--20">Welcome to KFM GLOBAL EDUCATION LTD !</p>
            <ul class="page-list">
                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                <li>
                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                </li>
                <li class="rbt-breadcrumb-item active">Terms & Conditions</li>
            </ul>
        </div>
    </div>

    <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
        <div class="rbt-article-content-wrapper">
            <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                <img class="w-100" src="{{ asset('assets/images/blog/blog-card-01.jpg') }}" alt="Blog Images">
            </div>
            <div class="content">
                <p>These terms and conditions outline the rules and regulations for the use of KFM GLOBAL EDUCATION LTD's Website, located at <a href="https://educationhub-bd.com/contact">https://educationhub-bd.com/contact</a>.</p>

                <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use KFM GLOBAL EDUCATION LTD if you do not agree to take all of the terms and conditions stated on this page.</p>

                <h4>Terminology</h4>
                <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice, and all Agreements: "Client", "You" and "Your" refers to you, the person who log on to this website and is compliant with the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance, and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of the provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands.</p>

                <h4>Cookies</h4>
                <p>We employ the use of cookies. By accessing KFM GLOBAL EDUCATION LTD, you agreed to use cookies in agreement with the KFM GLOBAL EDUCATION LTD's Privacy Policy.</p>

                <h4>License</h4>
                <p>Unless otherwise stated, KFM GLOBAL EDUCATION LTD and/or its licensors own the intellectual property rights for all material on KFM GLOBAL EDUCATION LTD. All intellectual property rights are reserved. You may access this from KFM GLOBAL EDUCATION LTD for your own personal use subjected to restrictions set in these terms and conditions.</p>

                <ul>
                    <li>Republish material from KFM GLOBAL EDUCATION LTD</li>
                    <li>Sell, rent or sub-license material from KFM GLOBAL EDUCATION LTD</li>
                    <li>Reproduce, duplicate or copy material from KFM GLOBAL EDUCATION LTD</li>
                    <li>Redistribute content from KFM GLOBAL EDUCATION LTD</li>
                </ul>

                <h4>Comments and Content Liability</h4>
                <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. KFM GLOBAL EDUCATION LTD does not filter, edit, publish or review Comments prior to their presence on the website. Comments reflect the views and opinions of the person who post their views and opinions. KFM GLOBAL EDUCATION LTD shall not be liable for any Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of Comments.</p>

                <h4>Hyperlinking to our Content</h4>
                <p>The following organizations may link to our Website without prior written approval: Government agencies, search engines, news organizations, online directory distributors, and system-wide Accredited Businesses. Other organizations may request approval to hyperlink under certain conditions.</p>

                <h4>iFrames</h4>
                <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

                <h4>Content Liability</h4>
                <p>We shall not be held responsible for any content that appears on your Website. You agree to protect and defend us against all claims arising from your Website.</p>

                <h4>Your Privacy</h4>
                <p>Please read our Privacy Policy for information on how we handle personal data.</p>

                <h4>Reservation of Rights</h4>
                <p>We reserve the right to request that you remove all links or any particular link to our Website. We also reserve the right to amend these terms and conditions at any time. By continuously linking to our Website, you agree to be bound by these terms and conditions.</p>

                <h4>Disclaimer</h4>
                <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and its use. Nothing in this disclaimer will limit or exclude liability that cannot be limited or excluded under applicable law.</p>
            </div>
        </div>
    </div>
</div>

<x-imgSection/>
@include('frontend-partials.footer')
```

@endsection
