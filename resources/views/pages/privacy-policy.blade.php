@extends('layout.layout')

@php
$footer='true';
$topToBottom='true';
$bodyClass='';
@endphp



@section('content')

```
@include('frontend-partials.header')

<!-- Start Side Vav -->
<x-sideVav/>
<!-- End Side Vav -->

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
            <h1 class="title">Privacy Policy</h1>
            <p class="mb--20">KFM GLOBAL EDUCATION LTD Privacy Policy</p>
            <ul class="page-list">
                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                <li>
                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                </li>
                <li class="rbt-breadcrumb-item active">Privacy Policy</li>
            </ul>
        </div>
    </div>

    <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
        <div class="rbt-article-content-wrapper">
            <div class="content">
                <h4>Welcome to KFM GLOBAL EDUCATION LTD</h4>
                <p>At KFM GLOBAL EDUCATION LTD, accessible from <a href="https://kmfglobaleducation.com/contact">https://kmfglobaleducation.com/contact</a>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by KFM GLOBAL EDUCATION LTD and how we use it.</p>

                <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in KFM GLOBAL EDUCATION LTD. This policy is not applicable to any information collected offline or via channels other than this website.</p>

                <h4>Consent</h4>
                <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

                <h4>Information we collect</h4>
                <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
                <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

                <h4>How we use your information</h4>
                <p>We use the information we collect in various ways, including to:</p>
                <ul>
                    <li>Provide, operate, and maintain our website</li>
                    <li>Improve, personalize, and expand our website</li>
                    <li>Understand and analyze how you use our website</li>
                    <li>Develop new products, services, features, and functionality</li>
                    <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                    <li>Send you emails</li>
                    <li>Find and prevent fraud</li>
                </ul>

                <h4>Log Files</h4>
                <p>KFM GLOBAL EDUCATION LTD follows a standard procedure of using log files. These files log visitors when they visit websites. The information collected includes IP addresses, browser type, ISP, date and time stamp, referring/exit pages, and possibly the number of clicks. This information is used for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

                <h4>Cookies and Web Beacons</h4>
                <p>KFM GLOBAL EDUCATION LTD uses cookies to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. This information is used to optimize the users' experience by customizing web page content based on visitors' browser type and/or other information.</p>

                <h4>Advertising Partners Privacy Policies</h4>
                <p>Third-party ad servers or ad networks use technologies like cookies, JavaScript, or Web Beacons in their advertisements and links that appear on KFM GLOBAL EDUCATION LTD. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>
                <p>KFM GLOBAL EDUCATION LTD has no access to or control over these cookies used by third-party advertisers.</p>

                <h4>Third Party Privacy Policies</h4>
                <p>KFM GLOBAL EDUCATION LTD's Privacy Policy does not apply to other advertisers or websites. We advise you to consult the respective Privacy Policies of these third-party ad servers for detailed information.</p>

                <h4>CCPA Privacy Rights (Do Not Sell My Personal Information)</h4>
                <p>Under the CCPA, California consumers have rights to request disclosure, deletion, or restriction of their personal data. We have one month to respond to such requests.</p>

                <h4>GDPR Data Protection Rights</h4>
                <p>Every user has rights under GDPR including access, rectification, erasure, restriction, objection, and data portability. Requests will be responded to within one month.</p>

                <h4>Children's Information</h4>
                <p>KFM GLOBAL EDUCATION LTD does not knowingly collect any Personal Identifiable Information from children under 13. If you believe your child has provided such information, contact us immediately.</p>

                <h4>Changes to This Privacy Policy</h4>
                <p>We may update our Privacy Policy from time to time. Changes are effective immediately after posting on this page.</p>

                <h4>Contact Us</h4>
                <p>If you have any questions or suggestions about our Privacy Policy, contact us.</p>
            </div>
        </div>
    </div>
</div>

<x-imgSection/>
@include('frontend-partials.footer')
```

@endsection
