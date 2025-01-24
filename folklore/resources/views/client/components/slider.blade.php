
    <!-- Home Slider Section -->

<link rel="stylesheet" href="{{asset('style.style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="slider home" id="home">
        <div class="slides">
            <div class="slide">
                <div class="content">
                    <span class="tag">Latest Project</span>
                    <h2>Community Development</h2>
                    <p>Build a world where all youth are safe, strong, and valued.</p>
                    <a href="#" class="btn">Read More</a>
                </div>
                <img src="img/home_slide1.jpg" alt="Community Development">
            </div>
            <div class="slide">
                <div class="content">
                    <span class="tag">Latest Project</span>
                    <h2>Empower Rural Youth</h2>
                    <p>Enabling sustainable development for rural communities.</p>
                    <a href="#" class="btn">Read More</a>
                </div>
                <img src="img/home_slide2.jpg" alt="Empower Rural Youth">
            </div>
            <div class="slide">
                <div class="content">
                    <span class="tag">Latest Project</span>
                    <h2>Education for All</h2>
                    <p>Promoting equal opportunities for education worldwide.</p>
                    <a href="#" class="btn">Read More</a>
                </div>
                <img src="img/home_slide3.png" alt="Education for All">
            </div>
        </div>

        <div class="controls">
            <span class="dot active" onclick="moveToSlide(0)"></span>
            <span class="dot" onclick="moveToSlide(1)"></span>
            <span class="dot" onclick="moveToSlide(2)"></span>
        </div>

        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
