@extends('client.layouts.masterlayout')
@section('content')

<link rel="stylesheet" href="{{asset('style/about.css')}}">

    <div class="about" id="about">
        <p class="heading">Who We Are</p>
        <hr>
        <div class="about_sec">
            <div class="about_content">
                <p>The Bangladesh Institute for Folklore and Community Development (BIFCD), formerly known as the
                    Folklore Research
                    Institute (established in 1985 and registered with the Social Welfare Department), is a
                    non-governmental organization
                    (NGO) with a mission to safeguard and advance the diverse cultural heritage of Bangladesh. BIFCD
                    received official
                    registration with the NGO Bureau on 20/9/2022. Their primary focus involves collaborating with
                    marginalized communities
                    in rural areas of Bangladesh to identify, document, and rejuvenate traditional folklore and cultural
                    practices. the lives
                    of countless individuals in rural Bangladesh, establishing them as a prominent leader in the realms
                    of community
                    development and cultural preservation.</p>
            </div>
            <div class="about_pic">
                <div class="about_pic1">
                    <img src="img/about_1.jpg" alt="">
                    <img src="img/about_2.jpg" alt="">
                </div>
                <div class="about_pic2">
                    <img src="img/about_img.jpg" alt="">
                </div>
            </div>
        </div>

        <a href="" class="rd_mor">Read More</a>
    </div>





    @endsection