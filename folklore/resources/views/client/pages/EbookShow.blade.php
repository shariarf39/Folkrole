@extends('client.layouts.masterlayout')
@section('content')

<link rel="stylesheet" href="{{asset('style/ebookshow.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="ebook_show_container">
        <h2 class="mb-4">{{ $ebook->title }}</h2>

        <div class="mb-4">
            <p class="book_des"><strong>Description:</strong> {{ $ebook->fulldes }}</p>
            <p class="book_price"><strong>Price:</strong> ${{ number_format($ebook->offerprice ?? $ebook->regularprice, decimals: 2) }}</p>
            <a href="{{ route('pdf.show', $ebook->id) }}" class="view_pdf">View PDF</a>
        </div>

        @if($hasPurchased)
            <a href="{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}" class="bton btn-success" download>
                <i class="fa-solid fa-download"></i> Download Full PDF
            </a>
        @else
            <div class="alert alert-warning">
                <strong>Note:</strong> You can preview only the first 10 pages. Buy the full eBook to access all pages.
            </div>

            <div class="mt-4">
                <h4>Buy Full eBook</h4>
                <form action="{{ route('ebooks.purchase', $ebook) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    
                    <div class="mb-3">
                        <label>Payment Method</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="SSLCommerz">SSLCommerz</option>
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

                    <button type="submit" class="submit">Submit Payment</button>
                </form>
            </div>
        @endif
    </div>



@endsection
