<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManajemenOperatorController extends Controller
{
    public function getOperator() {
        $operators = User::where('role', 'Operator')->latest()->get();
        return view('dashboard.manajemen-operator.index', compact('operators'));
    }

    public function createOperator() {
        return view('dashboard.manajemen-operator.create');
    }

    public function storeOperator() {
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'role' => request('role')
        ]);
        return redirect('/dashboard/manajemen-operator')->with('message',  'The record has been successfully created.');
    }

    public function editOperator($id) {
        $operator = User::find($id);
        return view('dashboard.manajemen-operator.edit', compact('operator'));
    }

    public function updateOperator($id) {
        $operator = User::find($id);
        $newOperator = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        $operator->update($newOperator);
        return redirect('/dashboard/manajemen-operator')->with('message', 'The record has been successfully updated.');
    }

    public function deleteOperator($id) {
        $operator = User::find($id);
        $operator->delete();
        return redirect('/dashboard/manajemen-operator')->with('message', 'The record has been successfully deleted.');
    }
}
