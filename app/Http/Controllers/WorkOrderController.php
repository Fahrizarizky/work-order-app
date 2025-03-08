<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkOrderController extends Controller
{
    public function getWorkOrder() {
        //work order untuk di tampilkan kepada manajer production
        $workorders = WorkOrder::with('user')->latest()->get();

        //work order untuk di tampilkan kepada operator yang di tugaskan
        $workordersoperator = WorkOrder::where('user_id', Auth::user()->id)->latest()->get();

        return view('dashboard.wo-manager.index',compact('workorders','workordersoperator'));
    }

    public function createWorkOrder() {
        $operators = User::where('role', 'Operator')->get();
        return view('dashboard.wo-manager.create', compact('operators'));
    }

    public function storeWorkOrder() {

        // Validasi Input
    request()->validate([
        'nama_produk' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
    ]);

    // Buat nomor WO otomatis
    $count = WorkOrder::count() + 1; 
    $workOrderNumber = 'WO-' . date('Ymd') . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

    WorkOrder::create([
        'nomor_wo' => $workOrderNumber,
        'nama_produk' => request('nama_produk'),
        'jumlah' => request('jumlah'),
        'tenggat_waktu' => request('tenggat_waktu'),
        'status' => request('status'),
        'user_id' => request('user_id')
    ]);

    return redirect('/dashboard/wo-manager')->with('message','The record has been successfully created.');

    }

    public function editWorkOrder($id) {
        $allstatus = ['Pending','In Progress','Completed','Canceled'];
        $operators = User::where('role', 'Operator')->get();

        $workorder = WorkOrder::find($id);

        //cek apakah operator yang terkait dengan work order masih ada/ sudah di hapus
        if ($workorder->user) {
        //untuk mendapatkan operator dari work order yang di pilih
        $operatorid = $workorder->user->id;
        } else {
        $operatorid = '';   
        }
        //untuk mendapatkan status dari work order yang di pilih
        $statusname = $workorder->status;

        return view('dashboard.wo-manager.edit', compact('operators','operatorid', 'workorder', 'allstatus', 'statusname'));
    }

    public function updateWorkOrder($id) {
        $workorder = WorkOrder::find($id);

        $workorder->update([
            'status' => request('status'),
            'user_id' => request('user_id'),
            'jumlah_dikerjakan' => request('jumlah_dikerjakan'),
            'catatan' => request('catatan')
        ]);
        return redirect('/dashboard/wo-manager')->with('message','The record has been successfully updated.');
    }

    public function showWorkOrder($id) {
        $workorder = WorkOrder::with('user')->find($id);
        return view('dashboard.wo-manager.show', compact('workorder'));
    }

    public function deleteWorkOrder($id) {
        $workorder = WorkOrder::find($id);
        $workorder->delete();
        return redirect('/dashboard/wo-manager')->with('message', 'The record has been successfully deleted.');
    }
}
