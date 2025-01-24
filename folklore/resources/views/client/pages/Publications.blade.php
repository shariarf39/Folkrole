@extends('client.layouts.masterlayout')
@section('content')

  <link rel="stylesheet" href="style/Publications.css">

  <main>
  <section id="publications" class="publications-section">
    <h1 class="publication_heading">Our Publications</h1>
    <hr>
    <div class="publications-grid">
      <article class="publication">
        <img src="img/gallery_slider28.png" alt="Book 1 Cover">
        <h2>FOLKLORE</h2>
        <p>A captivating collection of folklore stories from deep within the forests.</p>
        <a href="book1" class="book-link">View Book</a>
      </article>
      <article class="publication">
        <img src="img/gallery_slider29.jpg" alt="Book 2 Cover">
        <h2>ART THEORY OF BAUL MUSIC</h2>
        <p>Explore the mysteries and legends of the ocean, passed down through generations.</p>
        <a href="book2" class="book-link">View Book</a>
      </article>
      <article class="publication">
        <img src="img/about_slider8.jpg" alt="Book 3 Cover">
        <h2>KUSHTIA FOLKLORE</h2>
        <p>Stories of bravery, adventure, and myths from the highest peaks.</p>
        <a href="book3" class="book-link">View Book</a>
      </article>
    </div>
  </section>
</main>

<script src="style/Publications.js"></script>

@endsection

