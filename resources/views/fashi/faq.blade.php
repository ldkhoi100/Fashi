@extends('fashi.layouts')

@section('title', 'home')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>FAQs</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Faq Section Begin -->
<div class="faq-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-accordin">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-heading active">
                                <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                    Information that may be Collected from You?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Shoppersstop.com collects the details provided by you on registration together
                                        with information we learn about you from your use of our service and your visits
                                        to our website and other websites accessible from them.
                                        <br><br>
                                        We take customer data privacy very seriously. Kindly, note that Shoppersstop.com
                                        does not access or store your Payment Card details (i.e. credit/debit card
                                        number, expiration date, CVV etc.). When you make a purchase using your card,
                                        all required transaction details are captured on the secured payment page, and
                                        encrypted using Industrial Strength Cipher, and are securely transmitted to your
                                        card issuer for obtaining an authorization decision. At no time during the
                                        purchase process or thereafter does Shoppers Stop have access to, or store, your
                                        complete card account information.
                                        <br><br>
                                        We read your SMS messages only for the purpose of OTP verification at the time
                                        of making payments and during user registration on Shoppers Stop. We do not read
                                        any other messages on your mobile except OTP verification SMS sent by Shoppers
                                        Stop. We also don’t access your call logs on phone.
                                        <br><br>
                                        We may collect additional information in connection with your participation in
                                        any promotions or contests offered by us and information you provide when giving
                                        us feedback or completing profile forms. We also monitor customer traffic
                                        patterns and website use, which enables us to improve the service we provide. We
                                        will collect only such information as is necessary and relevant to us to provide
                                        you with the services available on the website.
                                        <br><br>
                                        While you use our website, we may have automatic access to (receive and collect)
                                        certain anonymous information in standard usage logs through our web server,
                                        obtained from "cookies" sent to your browser from web server cookies stored on
                                        your hard drive, including but not limited to:
                                        <br><br>
                                        Computer-identification information.<br>
                                        IP address, assigned to the computer which you use.<br>
                                        The domain server through which you access our service.<br>
                                        The type of computer you're using.<br>
                                        The type of web browser you're using.<br><br>
                                        While you are transacting on our website personally identifiable information
                                        collected about you may include:<br>
                                        First and last name.<br>
                                        Email addresses.<br>
                                        Contact details including phone numbers.<br>
                                        PIN/ZIP code.<br>
                                        Demographic profile (like your age, gender, occupation, education, address and
                                        durables owned).<br>
                                        Personal preferences and interests (such as books, movies, music and so on); and
                                        Your opinion on services, products, features on our websites.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseTwo">
                                    When / How do we collect the Information?
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.We will collect anonymous traffic information from you when you visit
                                        our website.
                                        <br><br>
                                        We collect the personally identifiable information from you when you register
                                        with us or you transact as a guest. During registration you are required to give
                                        us your contact information (such as name, email address, date of birth, gender,
                                        billing address, delivery address, pin code, mobile number, occupation,
                                        interests etc.) Upon registration users may receive communications from
                                        Shoppersstop.com (e.g. newsletters, updates). Even when transact as a guest we
                                        collect identifiable information (such as name, email address, date of birth,
                                        gender, billing address, delivery address, pin code, mobile number etc.)
                                        <br><br>
                                        We use this information to contact you about the services you are using on our
                                        website and services in which you have expressed interest.
                                        <br><br>
                                        When you purchase a product or service from us, we request certain personally
                                        identifiable information from you on our order form, in order to be able to
                                        fulfill your requested service. You must provide contact information (such as
                                        name, email, and shipping address).
                                        <br><br>
                                        We use this information for billing purposes and to fill your orders. If we have
                                        trouble processing an order, we will use this information to contact you.
                                        <br><br>
                                        You have the option to provide demographic information (such as occupation,
                                        education and gender) to us; we encourage you to submit this information so we
                                        can provide you a more personalized experience on our website.
                                        <br><br>
                                        If you choose to use our referral service to tell a friend about our website, we
                                        will ask you for your friend's name and email address. We will automatically
                                        send your friend a one-time email inviting him or her to visit the website.
                                        Shoppersstop.com does store this information and the information is used for the
                                        sole purpose of sending this one-time email and tracking the success of our
                                        referral program.
                                        <br><br>
                                        Your friend may contact us at customercare@shoppersstop.com to request that we
                                        remove this information from our database.
                                        <br><br>
                                        We are the sole owners of your information collected by us at different points
                                        on our Website.
                                        <br><br>
                                        We will collect personally identifiable information about you only as part of a
                                        voluntary registration process, guest check out, on-line survey, or contest or
                                        any combination thereof.
                                        <br><br>
                                        Our advertisers may collect anonymous traffic information from their own
                                        assigned cookies to your browser.
                                        <br><br>
                                        The website contains links to other websites. We are not responsible for the
                                        privacy practices of such websites which we do not own, manage or control.
                                        <br><br>
                                        We may at certain times make chat rooms, forums, instant messenger and message
                                        boards and other services available to you. Please understand that any
                                        information that is disclosed in these areas becomes public information. We have
                                        no control over its use and you should exercise caution when disclosing your
                                        personal information to anyone.
                                        <br><br>
                                        If you use a bulletin board or chat room on this website, you should be aware
                                        that any personally identifiable information you submit there can be read,
                                        collected, or used by other users of these forums, and could be used to send you
                                        unsolicited messages. We are not responsible for the personally identifiable
                                        information you choose to submit in these forums</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseThree">
                                    Policy updates
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>We reserve the right to change or update this policy at any time by placing a
                                        prominent notice on our website. Such changes shall be effective immediately
                                        upon posting to this website.
                                        <br><br>
                                        If we decide to change our privacy policy, we will post those changes to this
                                        privacy statement, the homepage, and other places we deem appropriate so that
                                        you are aware of what information we collect, how we use it, and under what
                                        circumstances, if any, we disclose it. We reserve the right to modify this
                                        privacy statement at any time, so please review it frequently. If we make
                                        material changes to this policy, we will notify you here, or by means of a
                                        notice on our homepage.
                                        <br><br>
                                        If we decide to make changes in our email practices, we will post those changes
                                        to this privacy policy, the homepage, and other places we deem appropriate so
                                        that you are aware of what information we collect, how we use it, and under what
                                        circumstances, if any, we disclose it.
                                        <br><br>
                                        You can offer your views, suggestions, if any, by submitting the filled in
                                        feedback form online.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq Section End -->

@endsection