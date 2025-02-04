@extends('server.layouts.masterlayout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">eBook Management</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Upload eBook Button -->
    <div class="text-end mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-upload me-2"></i>Upload eBook
        </button>
    </div>

     <!-- Search Form -->
     <form method="get" action="{{ route('adminebook') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Search
            </button>
        </div>
    </form>

    <!-- eBooks Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Uploaded eBooks</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Regular Price</th>
                            <th>Offer Price</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($ebooks->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No eBooks found.</td>
                                </tr>
                            @else
                        @foreach($ebooks as $ebook)
                            <tr>
                                <td>{{ $ebook->title }}</td>
                                <td>{{ $ebook->shortdes }}</td>
                                <td>{{ number_format($ebook->regularprice, 2) }}</td>
                                <td>
                                    @if($ebook->offerprice)
                                        <span class="text-danger">{{ number_format($ebook->offerprice, 2) }}</span>
                                    @else
                                        <span class="text-muted">No Offer</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/pdf/ebooks/'.$ebook->file_path) }}" class="btn btn-outline-info btn-sm" target="_blank">
                                        <i class="fas fa-file-pdf me-1"></i>View PDF
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('ebooks.toggle', $ebook->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $ebook->is_active ? 'btn-success' : 'btn-warning' }}">
                                            {{ $ebook->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('ebooks.destroy', $ebook->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
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

<!-- Upload eBook Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="uploadModalLabel">Upload eBook</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeEbook') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Short Description</label>
                            <input type="text" name="short_description" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Description</label>
                            <textarea name="full_description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Regular Price</label>
                            <input type="number" name="regular_price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Offer Price</label>
                            <input type="number" name="offer_price" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Upload PDF</label>
                            <input type="file" name="file" class="form-control" accept=".pdf" required>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="is_active" value="1">
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection