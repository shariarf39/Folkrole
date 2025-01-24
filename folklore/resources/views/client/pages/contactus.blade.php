@extends('client.layouts.masterlayout')
@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/contactus.css') }}">

    <style>
        hr {
    width: 22%;
    height: 4px;
    border: none;
    background-color: red;
    text-align: center;
    margin: 0 auto;
    margin-top: 1rem;
}

.heading {
    font-size: 2.3rem;
    color: #00ff00;
    text-align: center;
    font-weight: 500;
    letter-spacing: 2px;
    text-transform: uppercase;
    opacity: 1 !important;
}



/* Contact Section */

.contact_sec {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 5rem 1rem;
}

.contact_content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    width: 100%;
}

.contact_left {
    width: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contact_right {
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.contact_left form {
    display: flex;
    flex-direction: column;
    padding: 2rem;
    border-radius: 20px;
    border: 1px solid black;
    transition: .5s ease;

    &:hover {
        box-shadow: 0 0 1rem blue;
        border: 1px solid white;
    }
}

.contact_txt {
    font-size: 1.1rem;
    font-weight: normal;
    padding: 1rem;
}

.contact_link {
    display: flex;
    flex-direction: column;
    padding: .3rem;
}

.contact_link p {
    font-size: 1.2rem;
    padding: .5rem;
    color: blue;
}

.contact_link a {
    color: black;
    text-decoration: none;
    padding-left: 1rem;
    transition: .5s ease;
    font-size: 1.1rem;

    &:hover {
        color: blue;
    }
}

.contact_link h1 {
    color: black;
    text-decoration: none;
    padding-left: 1rem;
    font-size: 1.1rem;
    font-weight: normal;
}

.contact_link i {
    color: black;
    font-size: 1.2rem;
}


.contact_right form {
    display: flex;
    flex-direction: column;
    padding: 1rem 1.5rem;
    border: 1px solid black;
    border-radius: 15px;
    width: 100%;
    transition: .5s ease;

    &:hover {
        box-shadow: 0 0 1rem blue;
        border: 1px solid white;
    }

}

.contact_right label {
    font-size: 1.1rem;
    color: blue;
    padding: 1rem 0 .5rem 0;
}

.contact_right form input {
    width: 100%;
    font-size: 1rem;
    padding: .5rem;
    outline: none;
    margin-top: .5rem;
}

.marge form,
.marge {
    width: 100%;
}

.contact_right form .marge {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}

.contact_right form .marge label {
    gap: 10px;
    width: 45%;
}

.contact_right form textarea {
    height: 10vw;
    font-size: 1rem;
    outline: none;
    padding: 1rem;
    resize: none;
}

.contact_right form button {
    font-size: 1.3rem;
    padding: .6rem 1.7rem;
    margin: 0 auto;
    margin-top: 2rem;
    border: none;
    border-radius: 20px;
    background: linear-gradient(to left, yellow, aqua);
    transition: 2s ease;

    &:hover {
        background: linear-gradient(to right, yellow, aqua);
    }
}







 @media only screen and (max-width: 600px) {
    .contact_sec {
        padding: 2rem 1rem;
    }

    .contact_content {
        flex-direction: column-reverse;
        align-items: center;
        padding: 1rem 0;
    }

    .contact_left,
    .contact_right {
        width: 90%;
        margin-bottom: 5rem;
    }

    .contact_right form .marge {
        flex-direction: column;
        width: 100%;
    }

    .contact_right form .marge label {
        width: 100%;
        margin-bottom: 1rem;
    }

    .contact_right form textarea {
        height: 15vw;
    }

    .heading {
        font-size: 1.8rem;
    }

    hr {
        width: 50%;
    }
}

@media only screen and (min-width: 601px) and (max-width: 1024px) {
    .contact_sec {
        padding: 3rem 2rem;
    }

    .contact_content {
        flex-direction: column;
        align-items: center;
    }

    .contact_left,
    .contact_right {
        width: 80%;
        margin-bottom: 2rem;
    }

    .contact_right form .marge {
        flex-direction: column;
        width: 100%;
    }

    .contact_right form .marge label {
        width: 100%;
        margin-bottom: 1rem;
    }

    .contact_right form textarea {
        height: 12vw;
    }

    .heading {
        font-size: 2rem;
    }

    hr {
        width: 30%;
    }
}


@media only screen and (min-width: 1025px) {
    .contact_sec {
        padding: 5rem 3rem;
    }

    .contact_content {
        flex-direction: row;
        justify-content: space-between;
    }

    .contact_left {
        width: 45%;
    }

    .contact_right {
        width: 50%;
    }

    .contact_right form textarea {
        height: 8vw;
    }

    .heading {
        font-size: 2.5rem;
    }

    hr {
        width: 20%;
    }
} 
    </style>

    <div class="contact_sec">
        <p class="heading">Contact Us</p>
        <hr>
        <p class="contact_txt">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque, repellendus ad sapiente
            ab modi maxime,
            debitis exercitationem tempore quia quo beatae dolores! Soluta fugit deserunt, commodi saepe voluptates
            similique eligendi?</p>
        <div class="contact_content">
            <div class="contact_left">
                <form action="">
                    <div class="contact_link">
                        <p>Contact:</p>
                        <p><i class="fa-solid fa-phone"></i><a href="tel:+880 1755-513176" class="about_lik">
                                +880 1755-513176</a>
                        </p>
                    </div>
                    <div class="contact_link">
                        <p>E-mail:</p>
                        <p><i class="fa-solid fa-envelope"></i><a href="mailto: dranwar.karim@gmail.com"
                                class="about_lik">dranwar.karim@gmail.com</a></p>
                    </div>
                    <div class="contact_link">
                        <p>Address:</p>
                        <h1><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Ishordi Road, Kushtia-7000,
                            Bangladesh
                        </h1>
                    </div>
                </form>
            </div>
            <div class="contact_right">
                <form action="">
                    <div class="marge">
                        <label for="name">Your Name:
                            <input type="text" placeholder="Enter Your Name...." required>
                        </label>
                        <label for="mail">Your Mail:
                            <input type="mail" placeholder="Enter Your Mail..." required>
                        </label>
                    </div>

                    <label for="Subject">Subject:</label>
                    <input type="text" placeholder="Subject...." required>

                    <label for="tel">Your Number:</label>
                    <input type="tel" placeholder="Enter Your Number.." required>

                    <label for="message">Message:</label>
                    <textarea name="message" id="message" placeholder="Message Here....." required></textarea>

                    <button>Sent Message</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('style/style.js') }}"></script>

@endsection
