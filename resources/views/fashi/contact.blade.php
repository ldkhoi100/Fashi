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
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Map Section Begin -->
<div class="map spad">
    <div class="container">
        <div class="map-inner">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.364827977654!2d107.59936971481298!3d16.457054388642355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a16b2f566917%3A0x5f5c283c442d24ff!2zNCDEkOG6t25nIFbEg24gTmfhu68sIEFuIMSQw7RuZywgVGjDoG5oIHBo4buRIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1586138480706!5m2!1svi!2s"
                width="600" height="610" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <div class="icon">
                {{-- <i class="fa fa-map-marker"></i> --}}
            </div>
        </div>
    </div>
</div>
<!-- Map Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacts Us</h4>
                    <p>If you have questions, please contact the address below.</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address:</span>
                            <p>4/2 Dang Van Ngu Street</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone:</span>
                            <p>+84 79.399.5401</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>ldkhoi100@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">

                        <h4>Leave A Feedback</h4>
                        <p>Our staff will call back later and answer your questions.</p>

                        <form action="{{ route('contact.post') }}" method="POST" class="comment-form" id="my-form">
                            @csrf
                            <div class="row">
                                <div
                                    class="col-lg-6 form-input @error('contact_name') has-error has-feedback @enderror">
                                    <input type="text" placeholder="Your name" name="contact_name"
                                        value="{{ old('contact_name') }}" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your email" name="contact_email"
                                        value="{{ old('contact_email') }}" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea id="comment" placeholder="Messages" name="contact_message" rows="5"
                                        maxlength="999"
                                        style="margin-bottom: 10px">{{ old('contact_message') }}</textarea>
                                    <div id="the-count_comment" style="margin-bottom: 15px">
                                        <span id="current_comment">0</span>
                                        <span id="maximum_comment"> / 999</span>
                                        <span>
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            <span
                                                class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        </span>
                                    </div>

                                    <button type="submit" class="site-btn" id="btn-submit" style="border: none">Send
                                        message</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection

@push('clicked')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            $("#btn-submit").attr("disabled", true);
		  $("#btn-submit").addClass('button-clicked');
            return true;
        });
    });
</script>
<script>
    $('#comment').keyup(function() {
        var characterCount = $(this).val().length,
            current = $('#current_comment'),
            maximum = $('#maximum_comment'),
            theCount = $('#the-count_comment');
        var maxlength = $(this).attr('maxlength');
        var changeColor = 0.75 * maxlength;
        current.text(characterCount);

        if (characterCount > changeColor && characterCount < maxlength) {
            current.css('color', '#FF4500');
            current.css('fontWeight', 'bold');
        } else if (characterCount >= maxlength) {
            current.css('color', '#B22222');
            current.css('fontWeight', 'bold');
        } else {
            var col = maximum.css('color');
            var fontW = maximum.css('fontWeight');
            current.css('color', col);
            current.css('fontWeight', fontW);
        }
    });
</script>
@endpush