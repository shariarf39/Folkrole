
    <!-- Home Slider Section -->
<link rel="stylesheet" href="{{asset('style/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="home_page">
    <div class="home_img">
        <img src="img/Nikhil-Chandra-Das-scroll-painting.jpg" alt="Home">
    </div>
    <div class="home_text">
<p class="wlc" id="auto-typing"></p>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const text = "Welcome to BIFCD!";
        let index = 0;
        const typingSpeed = 100;
        const delayBetweenLoops = 2000;

        function typeText() {
            if (index < text.length) {
                document.getElementById('auto-typing').innerHTML += text.charAt(index);
                index++;
                setTimeout(typeText, typingSpeed);
            } else {
                setTimeout(clearText, delayBetweenLoops);
            }
        }

        function clearText() {
            document.getElementById('auto-typing').innerHTML = '';
            index = 0;
            typeText();
        }

        typeText();
    });
</script>

        
        <p class="des_home">Where Stories, Culture & Heritage Come Alive</p>

        <p class="des_home">Discover the vibrant world of folklore, traditions, and timeless tales that shape our identity. At BFCDI,we celebrate the cultural heritage passed down through generations, nurturing connections between the past and present.</p> 

        <p class="des_home">Explore our carefully curated collections of folk stories, music, and art. Learn about legendary figures, customs, and the roots of communities near and far. Whether you're a culture enthusiast, a researcher, or just curious, there's something here for you to uncover and cherish. </p>

        <p class="des_home">Let’s journey through history and celebrate the beauty of folklore together!
        </p>
    </div>
</div>


    <script src="style/autotext.js"></script>