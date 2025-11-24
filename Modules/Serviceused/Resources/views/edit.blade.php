@extends('master')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Edit Serviceused</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('serviceused.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Proposal Number (readonly) -->
                    <div class="mb-3">
                        <label class="form-label">Proposal Number</label>
                        <input type="text" class="form-control" value="{{ $service->proposal->number ?? '-' }}" readonly>
                    </div>

                    <!-- Service Name (readonly) -->
                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" class="form-control" value="{{ $service->service_name }}" readonly>
                    </div>

                    <!-- Nama Karyawan (editable dropdown) -->
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Nama Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-select" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $employee->id == $service->employee_id ? 'selected' : '' }}>
                                    {{ $employee->fullname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status (editable) -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ $service->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="ongoing" {{ $service->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="done" {{ $service->status == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('serviceused.index') }}" class="btn btn-secondary">Back</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
