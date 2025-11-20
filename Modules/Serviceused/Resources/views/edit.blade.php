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

                    <div class="form-group mb-3">
                        <label for="proposal_id">Proposal ID</label>
                        <input type="text" name="proposal_id" id="proposal_id" class="form-control" value="{{ $service->proposal_id }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="service_name">Service Name</label>
                        <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $service->service_name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
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
