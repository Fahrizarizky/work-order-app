<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class WorkOrder extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($order) {
            if ($order->isDirty('status')) {
                // Ambil last_updated_at sebelumnya
                $lastUpdated = $order->last_updated_at ?? $order->created_at;

                // Hitung waktu dari perubahan terakhir
                $order->time_spent += abs(now()->diffInMinutes($lastUpdated));

                // Perbarui last_updated_at dengan waktu sekarang
                $order->last_updated_at = now();
            }
        });
    }

     // Accessor untuk mengubah format waktu
     public function getFormattedTimeSpentAttribute()
     {
         $hours = floor($this->time_spent / 60);
         $minutes = $this->time_spent % 60;
 
         if ($hours > 0 && $minutes > 0) {
             return "$hours jam $minutes menit";
         } elseif ($hours > 0) {
             return "$hours jam";
         } else {
             return "$minutes menit";
         }
     }

}
