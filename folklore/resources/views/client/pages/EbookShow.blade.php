<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ebook->title }} - Ebook Details</title>
    <link rel="stylesheet" href="{{ asset('style/ebookshow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }
        .container{
            margin: 0 auto !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            padding: 2rem 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100% !important;
            padding: 0;
            padding-bottom: 1rem;
            border: 1px solid grey;
            width: 100% !important;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 1.5rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            transition: transform 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            transition: transform 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-2px);
        }
        .alert-warning {
            background: #fff3cd;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
        }
        .modal-content {
            border: none;
            border-radius: 15px;
        }
        .modal-header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        }
        .form-select:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        }

        .acc_num{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: .2rem  1rem .2rem 2.5rem;
            background-color: #cdd3bb;
            margin: 0 3rem;
            border-radius: 10px;
        }

        .acc_num p{
            margin: .3rem 0;
        }

        .mobile_banking{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 1rem  1rem .5rem 2.5rem;
            background-color: #cdd3bb;
            margin: 2rem 3rem;
            border-radius: 10px;
        }
        
        .bkash{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: .2rem  1rem .2rem 0;
        }
        
        .nagad {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: .2rem  1rem .2rem 0;
        }

        @media screen and (max-width: 400px) {
            .mobile_banking{
                margin: 1rem 2rem;
            }
            .acc_num{
                margin: 1rem 2rem;
            }
            
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title mb-0">{{ $ebook->title }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted"><strong>Description:</strong> {{ $ebook->fulldes }}</p>
                        <div class="mb-4">
                            <h4 class="text-muted"><strong>Regular Price:</strong> <del>TK. {{ number_format($ebook->regularprice, 2) }}</del></h4>
                            <h3 class="text-success"><strong>Offer Price:</strong> TK. {{ number_format($ebook->offerprice ?? $ebook->regularprice, 2) }}</h3>
                        </div>
                        <a href="{{ route('pdf.show', $ebook->id) }}" target="_blank" class="btn btn-outline-primary btn-lg w-100 mb-3">
                            <i class="fas fa-book-open"></i> Preview Ebook
                        </a>

                        @if($hasPurchased)
                            <a href="{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}" class="btn btn-success btn-lg w-100" download>
                                <i class="fas fa-download"></i> Download Full Book
                            </a>
                        @else
                            <div class="alert alert-warning">
                                <strong>Note:</strong> You can preview only the first 10 pages. Purchase the full eBook to access all pages.
                            </div>

                            <div class="alert alert-warning">
                                <strong>Support:</strong> &nbsp;+880 1755-513176
                            </div>

                            <div class="mt-4 text-center">
                                <h4>Buy Full eBook</h4>
                                <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                    <i class="fas fa-shopping-cart"></i> Buy Now
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Complete Your Purchase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

<div class="payment_items" style="padding: 20px 0; font-family: Arial;">
        <div class="mobile_banking">
            <p style="color:red;"> Mobile Banking (Personal)</p>
            <div class="bkash">
            <p class="acc_no" style="font-size: 12px; margin:0;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Bkash: &nbsp;</span>
                +880 1755-513176 
                <i class="fas fa-copy" 
                   style="cursor: pointer; margin-left: 5px;" 
                   onclick="copyToClipboard('+880 1755-513176')"></i>
            </p>
        </div>
        <div class="nagad">
            <p class="acc_no" style="font-size: 12px; margin:0;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Nagad: &nbsp;</span>
                +880 1755-513176 
                <i class="fas fa-copy" 
                   style="cursor: pointer; margin-left: 5px;" 
                   onclick="copyToClipboard('+880 1755-513176')"></i>
            </p>
        </div>
        </div>


    <div class="acc_num">
        <p style="color:red;">Bank Information</p>
        <p style="font-size: 12px;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Account Holder:</span> PROFESSOR DR ANWARUL KARIM
    <i class="fas fa-copy" 
                   style="cursor: pointer; margin-left: 5px;" 
                   onclick="copyToClipboard('PROFESSOR DR ANWARUL KARIM')"></i></p>
        <p class="acc_no" style="font-size: 12px;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Account Number: &nbsp;</span>
            1121005441202 
            <i class="fas fa-copy" 
               style="cursor: pointer; margin-left: 5px;" 
               onclick="copyToClipboard('1121005441202')"></i>
        </p>
        <P style="font-size: 12px;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Bank Name:</span>&nbsp; Mercantile Bank PLC
    <i class="fas fa-copy" 
                   style="cursor: pointer; margin-left: 5px;" 
                   onclick="copyToClipboard('Mercantile Bank PLC')"></i></P>
        <p style="font-size: 12px;"><span style="font-size: 12px; color: #2575fc; font-weight:600;">Branch:</span> &nbsp; Banani</p>
    </div>


</div>

                <div class="modal-body">
                    <form action="{{ route('ebooks.purchase', $ebook) }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select" required>
                                <option value="">Select Payment Method</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Account">Bank</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Transaction ID</label>
                            <input type="text" name="transaction_id" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-check-circle"></i> Submit Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function () {
            alert(`Copied: ${text}`);
        }).catch(function (err) {
            console.error('Could not copy text: ', err);
        });
    }
</script>

</body>
</html>