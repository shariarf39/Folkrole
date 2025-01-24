@extends('client.layouts.masterlayout')
@section('content')


<link rel="stylesheet" href="style/donate.css">

    <main>
        <div class="donation-description">
            <h2>Make a Difference Today</h2>
            <p>Your donation helps preserve the rich folklore traditions and stories passed down through generations. Join us in keeping these treasures alive!</p>
        </div>

        <form action="" method="">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="name">Your Number</label>
                <input type="tel" id="number" name="number" placeholder="Enter your number" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="mail" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
                <label for="amount">Donation Amount ($)</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount to donate" required min="1">
            </div>
            <div class="form-group">
                <button type="submit">Donate Now</button>
            </div>
        </form>
    </main>


    @endsection
