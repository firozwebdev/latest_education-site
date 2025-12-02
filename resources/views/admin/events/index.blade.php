@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Events Management</h3>
                        <div class="d-flex align-items-center gap-3">
                            <div class="input-group" style="width: 350px;">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" id="searchInput" class="form-control border-start-0 ps-0" placeholder="Search events by name or location...">
                            </div>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm px-4">
                                <i class="fas fa-plus me-2"></i>Add Event
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="searchResults">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Event Name</th>
                                    <th>Logo</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="eventsTableBody">
                                @include('admin.events.partials.table-rows')
                            </tbody>
                        </table>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center" id="paginationContainer">
                            {{ $events->links('vendor.pagination.admin') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let searchTimeout;
    const searchInput = document.getElementById('searchInput');
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value;
        
        searchTimeout = setTimeout(function() {
            fetch('{{ route("admin.events.index") }}?search=' + encodeURIComponent(query), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('eventsTableBody').innerHTML = data.html;
                document.getElementById('paginationContainer').innerHTML = data.pagination;
            });
        }, 300);
    });
});
</script>
@endsection