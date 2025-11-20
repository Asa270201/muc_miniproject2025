@extends('master')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Create Proposal</h2>
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

                <form action="{{ route('proposal.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="number">Proposal Number</label>
                        <input type="text" name="number" id="number" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="year" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="agreed">Agreed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
