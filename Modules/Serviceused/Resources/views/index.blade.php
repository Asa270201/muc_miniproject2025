@extends('master')

@section('content')
@if(session('success'))
    <div class="alert alert-success d-flex align-items-center fw-semibold shadow-sm mb-3"
         id="success-banner"
         style="border-left: 6px solid #28a745; font-size: 15px;">
         
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
             class="bi bi-check-circle-fill me-2">
            <path d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM6.97 11.03l4.47-4.47a.75.75 0 1 0-1.06-1.06L6.5 9.94 4.62 8.06a.75.75 0 0 0-1.06 1.06l2.35 2.35a.75.75 0 0 0 1.06 0z"/>
        </svg>

        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const banner = document.getElementById('success-banner');
            if (banner) {
                banner.style.transition = "opacity 0.5s ease";
                banner.style.opacity = "0";
                setTimeout(() => banner.remove(), 500);
            }
        }, 3000);
    </script>
@endif

<div class="row mb-3">
    <div class="col-md-12">
        <h2>Serviceused List</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>All Serviceused</span>
                <a href="{{ url('serviceused/create') }}" class="btn btn-primary btn-sm">Add New Serviceused</a>
            </div>
            <div class="card-body">
                @if($services->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Proposal Number</th>
                                    <th>Nama Service</th>
                                    <th>Status</th>
                                    <th>Timespent (hh:mm)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->proposal_id }}</td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'ongoing' => 'info',
                                                    'done' => 'success'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$service->status] ?? 'secondary' }}">
                                                {{ ucfirst($service->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $service->timespent }}</td>
                                        <td>
                                            <a href="{{ route('serviceused.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('serviceused.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this service?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        No serviceused found.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
