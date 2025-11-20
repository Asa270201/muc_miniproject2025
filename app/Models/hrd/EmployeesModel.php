<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\activity\TimesheetModel;

class EmployeesModel extends Model
{
    use HasFactory;

    // koneksi ke database HRD
    protected $connection = 'mysql_hrd';

    // nama tabel di database
    protected $table = 'employees';

    // kolom yang bisa diisi
    protected $fillable = [
        'fullname',
        'status',
    ];

    // relasi ke timesheet
    public function timesheets()
    {
        return $this->hasMany(TimesheetModel::class, 'employee_id', 'id');
    }
}
