<?php

namespace App\Models\marketing;

use Illuminate\Database\Eloquent\Model;
use App\Models\marketing\ProposalModel;
use Modules\Timesheet\Entities\Timesheet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class ServiceusedModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql_marketing'; // koneksi ke database muc__marketing__miniproject
    protected $table = 'serviceused';
    protected $fillable = ['proposal_id', 'service_name', 'status', 'created_at', 'updated_at'];

    // Relasi untuk menghitung total timespent
    public function getTimespentAttribute()
    {
        // Ambil total durasi dari timesheet database muc__activity__miniproject
        $totalSeconds = DB::connection('muc__activity__miniproject')
            ->table('timesheet')
            ->where('serviceused_id', $this->id)
            ->sum(DB::raw('TIMESTAMPDIFF(SECOND, timestart, timefinish)'));

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);

        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function proposal()
    {
        return $this->belongsTo(ProposalModel::class, 'proposal_id');
    }
    
   public function timesheets()
    {
        return $this->hasMany(Timesheet::class, 'serviceused_id');
    }

}
