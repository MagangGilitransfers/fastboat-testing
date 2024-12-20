<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastboatAvailability extends Model
{
    use HasFactory;
    protected $table = "fastboatavailability";
    protected $primaryKey = "fba_id";
    protected $fillable = ['fba_trip_id', 'fba_date', 'fba_dept_time', 'fba_arriv_time', 'fba_adult_nett', 'fba_child_nett', 'fba_adult_publish', 'fba_child_publish', 'fba_discount', 'fba_stock', 'fba_status', 'fba_shuttle_status', 'fba_min_pax', 'fba_info', 'fba_created_by', 'fba_updated_by'];

    public function trip(){
        return $this->belongsTo(FastboatTrip::class,'fba_trip_id','fbt_id');
    }
    public function departure(){
        return $this->belongsTo(MasterPort::class);
    }
    public function arrival(){
        return $this->belongsTo(MasterPort::class);
    }
    public function fastboat(){
        return $this->belongsTo(DataFastboat::class);
    }
    public function company(){
        return $this->belongsTo(DataCompany::class);
    }
    public function schedule(){
        return $this->belongsTo(FastboatSchedule::class);
    }
    public function route(){
        return $this->belongsTo(DataRoute::class);
    }
    public function deptTime(){
        return $this->belongsTo(FastboatTrip::class);
    }
    public function island(){
        return $this->belongsTo(MasterIsland::class);
    }
}
