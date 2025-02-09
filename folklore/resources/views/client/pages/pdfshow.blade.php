<section class="preview-section mb-5">
    <div class="container">
        <div class="text-center">
            <h2 class="preview-title">Preview</h2>
            <div class="divider"></div>
            <p class="preview-notice">
                @if($hasPurchased)
                    You have purchased this book. <br> 
                    <strong>Enjoy reading the full book!</strong>
                @else
                    You can only read the first 10 pages. <br> 
                    <strong>Purchase the full book to continue reading.</strong>
                @endif
            </p>
        </div>
        <div id="pdf-container" class="pdf-preview"></div>
    </div>
</section>

<style>
    /* Custom Styles for Preview Section */
    .preview-section {
        background-color: #f8f9fa;
        padding: 1rem 0 2rem 0;
        margin: 2rem auto;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .preview-title {
        font-family: 'Pacifico', cursive;
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(45deg, red, rgb(255, 0, 255), aqua);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
        text-align: center;
    }

    .preview-notice {
        font-size: 1.3rem;
        color: #e74c3c;
        font-weight: 500;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        text-align: center;
    }

    .preview-notice strong {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.3rem;
    }

    .divider {
        width: 100px;
        height: 4px;
        background-color: #e74c3c;
        border-radius: 2px;
        margin: 0 auto 2rem;
        transition: width 0.3s ease;
    }

    .pdf-preview {
        width: 100%;
        overflow-x: auto;
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    #pdf-container canvas {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 1rem auto;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #pdf-container canvas:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .preview-title {
            font-size: 2rem;
        }

        .preview-notice {
            font-size: 1rem;
        }

        .pdf-preview {
            padding: 1rem;
        }

        #pdf-container canvas {
            margin: 0.5rem auto;
        }
    }

    @media (max-width: 576px) {
        .preview-title {
            font-size: 1.75rem;
        }

        .preview-notice {
            font-size: 0.95rem;
        }

        .divider {
            width: 80px;
            height: 3px;
        }

        .preview-section:hover .divider {
            width: 100px;
        }
    }
</style>

{{-- PDF.js Script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    var url = "{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}";
    var hasPurchased = @json($hasPurchased);
    var numPagesToShow = hasPurchased ? null : 10; // Show full PDF if purchased, else only 10 pages

    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

    var pdfContainer = document.getElementById('pdf-container');

    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        var totalPages = pdf.numPages;
        var pagesToRender = numPagesToShow ? Math.min(totalPages, numPagesToShow) : totalPages;

        for (let i = 1; i <= pagesToRender; i++) {
            pdf.getPage(i).then(function(page) {
                var canvas = document.createElement("canvas");
                pdfContainer.appendChild(canvas);
                var context = canvas.getContext("2d");

                var viewport = page.getViewport({ scale: 1.5 }); // Adjust scale for better readability
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }
    }).catch(function(error) {
        console.error("Error loading PDF: ", error);
        pdfContainer.innerHTML = `
            <div class="alert alert-danger text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> Failed to load the PDF. Please try again later.
            </div>
        `;
    });
</script>
