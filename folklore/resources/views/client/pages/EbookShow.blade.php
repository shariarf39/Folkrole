@extends('client.layouts.masterlayout')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $ebook->title }}</h2>

    <div class="mb-4">
        <p><strong>Description:</strong> {{ $ebook->fulldes }}</p>
        <p><strong>Price:</strong> ${{ number_format($ebook->offerprice ?? $ebook->regularprice, 2) }}</p>
        <a href="{{ route('pdf.show', $ebook->id) }}" class="btn btn-outline-primary mt-auto">View pdf</a>
    </div>

  
    @if($hasPurchased)
        <a href="{{ asset('uploads/pdf/ebooks/' . $ebook->file_path) }}" class="btn btn-success" download>
            <i class="fas fa-download"></i> Download Full PDF
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

                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>
        </div>
    @endif
</div>

@endsection
