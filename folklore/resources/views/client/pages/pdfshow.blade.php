
  <div class="mb-4">
        <h4>Preview</h4>
        <div id="pdf-container"></div>
    </div>


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
                
                var viewport = page.getViewport({ scale: 1.2 });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }
    });
</script>
