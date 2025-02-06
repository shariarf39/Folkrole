@extends('client.layouts.masterlayout')
@section('content')
<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        padding: 10px;
        border-radius: 5px;
        margin: 20px auto; /* Centers the box horizontally */
        text-align: center; /* Centers the text inside the box */
        max-width: 400px; /* Optional: To limit the width of the alert box */
    }

    .error-box {
        background: #ffebee;
        border-left: 5px solid #d32f2f;
        color: #d32f2f;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;    
        font-weight: bold;
    }
    .error-box ul {
        margin: 5px 0 0;
        padding-left: 20px;
    }
    .error-box li {
       list-style: disc;
    }
    
    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>


<link rel="stylesheet" href="{{asset('style/user_ebook.css')}}">

<div class="publication_book">
    <section id="publications" class="publications-section">
        <h1 class="publication_heading">Our E-Book</h1>

        
        @if ($errors->any())
           <div class="error-box">
               <strong>⚠ Please fix the following errors:</strong>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
        @endif


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <div class="publications-grid">
            @foreach($ebooks as $ebook)
            <article class="publication">
                <div class="pdf-preview_book">
                    <div id="pdf-container-book-{{ $ebook->id }}"></div>
                </div>
                <h2>{{ $ebook->title }}</h2>
                <p>{{ Str::limit($ebook->shortdes, 150) }}</p>
                <h3 class="book_price"><strong>Regular Price:</strong> <del>TK. {{ number_format($ebook->regularprice, 2) }}</del></h3>
        <h3 class="book_price"><strong>Offer Price:</strong>TK. {{ number_format($ebook->offerprice ?? $ebook->regularprice, 2) }}</h3>

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