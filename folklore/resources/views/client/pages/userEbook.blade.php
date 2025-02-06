@extends('client.layouts.masterlayout')
@section('content')

<link rel="stylesheet" href="{{asset('style/user_ebook.css')}}">

<div class="publication_book">
    <section id="publications" class="publications-section">
        <h1 class="publication_heading">Our E-Book</h1>
        <hr>
        <div class="publications-grid">
            @foreach($ebooks as $ebook)
            <article class="publication">
                <div class="pdf-preview_book">
                    <div id="pdf-container-book-{{ $ebook->id }}"></div>
                </div>
                <h2>{{ $ebook->title }}</h2>
                <p>{{ Str::limit($ebook->shortdes, 150) }}</p>
                <p class="book_price">${{ number_format($ebook->offerprice ?? $ebook->regularprice, decimals: 2) }}</p>
                <a href="{{ route('ebooks.show', $ebook->id) }}" class="book-link">View Book</a>
            </article>
            @endforeach
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

        @foreach($ebooks as $ebook)
        (function () {
            var url = "{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}";
            var pdfContainer = document.getElementById("pdf-container-book-{{ $ebook->id }}");

            pdfjsLib.getDocument(url).promise.then(function (pdf) {
                pdf.getPage(1).then(function (page) {
                    var canvas = document.createElement("canvas");
                    pdfContainer.appendChild(canvas);
                    var context = canvas.getContext("2d");

                    var viewport = page.getViewport({ scale: 1 }); // Render at default scale (1)

                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        })();
        @endforeach
    });
</script>

@endsection
