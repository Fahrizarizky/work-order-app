<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function getLaporanWorkOrder() {
        $workorders = WorkOrder::select('nama_produk', 'status', DB::raw('SUM(jumlah) as total_quantity'))
                            ->groupBy('nama_produk', 'status')
                            ->get();

    return view('dashboard.laporan.workorder', compact('workorders'));
    }

    public function getLaporanOperator() {
        $operatorReports = WorkOrder::select('user_id', 'nama_produk', DB::raw('SUM(jumlah) as total_completed'))
                                    ->where('status', 'Completed')
                                    ->groupBy('user_id', 'nama_produk')
                                    ->get();

        $operators = User::all();  // Untuk mengambil data operator (user)
    return view('dashboard.laporan.operator', compact('operatorReports', 'operators'));
    }

}
