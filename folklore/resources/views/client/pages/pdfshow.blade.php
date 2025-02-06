<section class="preview-section mb-5">
    <div class="container">
        <div class="text-center">
            <h2 class="preview-title">Preview</h2>
            <p class="preview-notice">
                You can only read the first 10 pages. <br> 
                <strong>Purchase the full book to continue reading.</strong>
            </p>
            <div class="divider"></div>
        </div>
        <div id="pdf-container" class="pdf-preview"></div>
    </div>
</section>

<style>
    /* Custom Styles for Preview Section */
    .preview-section {
        background-color: #ffffff;
        padding: 3rem 0;
        margin: 2rem auto;
    }

    .preview-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.75rem;
    }

    .preview-notice {
        font-size: 1.1rem;
        color: #e74c3c;
        font-weight: 500;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .preview-notice strong {
        color: #2c3e50;
        font-weight: 600;
    }

    .divider {
        width: 100px;
        height: 4px;
        background-color: #e74c3c;
        border-radius: 2px;
        margin: 0 auto 2rem;
        transition: width 0.3s ease;
    }

    .preview-section:hover .divider {
        width: 150px;
    }

    .pdf-preview {
        width: 100%;
        overflow-x: auto;
        background-color: #f9f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    #pdf-container canvas {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #pdf-container canvas:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
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