@extends('master')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Create Serviceused</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i>
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('serviceused.store') }}" method="POST">
                @csrf
                <!-- Proposal Dropdown -->
                <div class="mb-3">
                    <label for="proposal_id" class="form-label">Proposal Number</label>
                    <select name="proposal_id" id="proposal_id" class="form-select" required onchange="updateServiceName()">
                        <option value="">-- Pilih Proposal --</option>
                        @foreach($proposals as $proposal)
                            <option value="{{ $proposal->id }}" data-description="{{ $proposal->description }}">
                                {{ $proposal->number }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Service Name (auto-filled) -->
                <div class="mb-3">
                    <label for="service_name" class="form-label">Service Name</label>
                    <input type="text" name="service_name" id="service_name" class="form-control" readonly>
                </div>

                <!-- Employee Dropdown -->
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Nama Karyawan</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="pending">Pending</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="done">Done</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('serviceused.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

            <!-- Script to auto-fill service name -->
            <script>
                function updateServiceName() {
                    const select = document.getElementById('proposal_id');
                    const selectedOption = select.options[select.selectedIndex];
                    const description = selectedOption.getAttribute('data-description');
                    document.getElementById('service_name').value = description || '';
                }
            </script>


            </div>
        </div>
    </div>
</div>
@endsection
