<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterPending() {
        $workorders = WorkOrder::where('status', 'Pending')->get();
        return view('dashboard.wo-manager.index', compact('workorders'));
    }

    public function filterInprogress() {
        $workorders = WorkOrder::where('status', 'In Progress')->get();
        return view('dashboard.wo-manager.index', compact('workorders'));
    }

    public function filterCompleted() {
        $workorders = WorkOrder::where('status', 'Completed')->get();
        return view('dashboard.wo-manager.index', compact('workorders'));
    }

    public function filterCanceled() {
        $workorders = WorkOrder::where('status', 'Canceled')->get();
        return view('dashboard.wo-manager.index', compact('workorders'));
    }
}
