<?php

namespace Modules\Timesheet\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\marketing\ServiceusedModel as Serviceused;
use App\Models\hrd\EmployeesModel as Employee;
use App\Models\marketing\ProposalModel as Proposal;

class Timesheet extends Model
{
    use HasFactory;

    protected $connection = 'muc__activity__miniproject';
    protected $table = 'timesheet';

    // Kolom yang bisa diisi
    protected $fillable = [
        'employee_id',       // sudah disesuaikan dari employees_id
        'proposal_id',
        'serviceused_id',
        'timestart',
        'timefinish',
        'total_jam'
    ];

    // Relasi ke tabel serviceused
    public function serviceused()
    {
        return $this->belongsTo(Serviceused::class, 'serviceused_id');
    }

    // Relasi ke tabel employees (HRD)
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    // Relasi ke tabel proposal (Marketing)
    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    // Akses total jam kerja
    public function getTotalJamAttribute()
    {
        if (!$this->timestart || !$this->timefinish) return '00:00';
        $totalSeconds = strtotime($this->timefinish) - strtotime($this->timestart);
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        return sprintf('%02d:%02d', $hours, $minutes);
    }
}
