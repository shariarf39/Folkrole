@extends('client.layouts.masterlayout')
@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/contactus.css">

    <section class="contact-section">
    <div class="contact-info">
        <h2>Contact Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

        <div class="info-item">
            <i class="fa fa-phone"></i>
            <span><a href="tel:+880 1755-513176"> +880 1755-513176</a></span>
        </div>
        <div class="info-item">
            <i class="fa fa-envelope"></i>
            <span><a href="mailto:dranwar.karim@gmail.com"> dranwar.karim@gmail.com</a></span>
        </div>
        <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <span>Ishordi Road, Kushtia-7000, Bangladesh</span>
        </div>
    </div>

    <div class="contact-form">
        <h3>Send Message</h3>
        <form action="#" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name..." required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email...." required>
            </div>
            <div class="form-group">
                <input type="number" name="number" placeholder="Number...." required>
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Type your Message..." required></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</section>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="{{ asset('style/style.js') }}"></script>

@endsection
