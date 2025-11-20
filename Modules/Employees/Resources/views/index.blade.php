@extends('master')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

   
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Employee List</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>All Employees</span>
            </div>
            <div class="card-body">
                @if($employees->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->fullname ?? '-' }}</td>
                                        <td>
                                            @if($employee->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif($employee->status == 'inactive')
                                                <span class="badge bg-danger">Inactive</span>
                                            @else
                                                <span class="badge bg-warning">Probation</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}" 
                                               class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        No employees found.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
