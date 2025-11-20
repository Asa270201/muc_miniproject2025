<?php

namespace App\Models\marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql_marketing';
    protected $table = 'proposal';
    protected $primaryKey = 'id';
    protected $fillable = ['number','year','description','status'];

    // Relasi ke ServiceusedModel
    public function serviceuseds()
    {
        return $this->hasMany(ServiceusedModel::class, 'proposal_id');
    }
}
