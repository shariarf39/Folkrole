@extends('client.layouts.masterlayout')
@section('content')

<link rel="stylesheet" href="{{ asset('style/ebookshow.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="ebook_show_container">
    <h2 class="mb-4">{{ $ebook->title }}</h2>

    <div class="mb-4">
        <p class="book_des"><strong>Description:</strong> {{ $ebook->fulldes }}</p>
        <h3 class="book_price"><strong>Regular Price:</strong> <del>TK. {{ number_format($ebook->regularprice, 2) }}</del></h3>
        <h3 class="book_price"><strong>Offer Price:</strong> TK. {{ number_format($ebook->offerprice ?? $ebook->regularprice, 2) }}</h3>
        <a href="{{ route('pdf.show', $ebook->id) }}" target="_blank" class="view_pdf">View Ebook</a>
    </div>

    @if($hasPurchased)
        <a href="{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}" class="btn btn-success" download>
            <i class="fas fa-download"></i> Download Full Book
        </a>
    @else
        <div class="alert alert-warning">
            <strong>Note:</strong> You can preview only the first 10 pages. Buy the full eBook to access all pages.
        </div>

        <div class="mt-4">
            <h4>Buy Full eBook</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                <i class="fas fa-shopping-cart"></i> Buy Now
            </button>
        </div>
    @endif
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Complete Your Purchase</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ebooks.purchase', $ebook) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="mb-3">
                        <label>Payment Method</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Transaction ID</label>
                        <input type="text" name="transaction_id" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
