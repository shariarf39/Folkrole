<div class="container mt-5">
    <h2 class="mb-4 text-center">My eBook</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Upload eBook Button -->
    <div class="text-end mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-upload me-2"></i>Total Purchases: {{ $ebooks->count() }}
        </button>
    </div>

    <!-- eBooks Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Purchases eBooks</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                          
                            <th>Title</th>
                            <th>Payment Number</th>
                            <th>Method</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($ebooks->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No eBooks found.</td>
                            </tr>
                        @else
                            @foreach($ebooks as $ebook)
                                <tr>
                                    <td>{{ $ebook->title }}</td>
                                    <td>{{ $ebook->phone_number }}</td>
                                    <td>{{ $ebook->payment_method }}</td>
                                    <td>Tk. {{ number_format($ebook->offerprice, 2) }}</td>
                                    <td>
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $ebook->pur_is_active == 2 ? 'btn-success' : 'btn-warning' }}">
                                                {{ $ebook->pur_is_active == 1 ? 'Pending' : 'Approved' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        @if($ebook->pur_is_active == 1)
                                            <a href="" class="btn btn-sm btn-outline-secondary disabled">Please Wait for Approval</a>
                                        @elseif($ebook->pur_is_active == 2)
                                            <a href="{{ route('ebooks.show', $ebook->id) }}" class="btn btn-sm btn-outline-primary">Read or Download Book</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>