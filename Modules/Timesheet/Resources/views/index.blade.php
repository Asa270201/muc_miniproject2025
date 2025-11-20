@extends('master')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h2>Timesheet List</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if($timesheets->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Karyawan</th>
                                    <th>Proposal Number</th>
                                    <th>Service Name</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Total Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($timesheets as $sheet)
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime($sheet->timestart)) }}</td>
                                        <td>{{ $sheet->employee->fullname ?? '-' }}</td>
                                        <td>{{ $sheet->serviceused->proposal->number ?? '-' }}</td>
                                        <td>{{ $sheet->serviceused->service_name ?? '-' }}</td>
                                        <td>{{ date('H:i', strtotime($sheet->timestart)) }}</td>
                                        <td>{{ date('H:i', strtotime($sheet->timefinish)) }}</td>
                                        <td>{{ $sheet->total_jam }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">No timesheets found.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
