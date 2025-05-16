<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function index() {
        $reports = Report::where('user_id', Auth::user()->id)->get();
        $userId = Auth::id();
        $statuses = Status::all();
        return view('reports.index', compact('reports', 'userId', 'statuses'));
    }

    public function create() {
        $reports = Report::all();
        return view('reports.create', compact('reports'));
    }

    public function store(Request $request): RedirectResponse {

        $request->validate([
            'date' => ['required', 'date', 'max:255'],
            'time' => ['required', 'date_format:H:i', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'payment' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
        ]);

        Report::create([
            'date' => $request->date,
            'time' => $request->time,
            'type' => $request->type,
            'payment' => $request->payment,
            'adress' => $request->adress,
            "user_id" => Auth::user()->id,
            "status_id" => "1",
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'status_id' => ['required'],
            'id' => ['required']
        ]);

        Report::where('id', $request->id)->update([
            'status_id' => $request->status_id,
        ]);
        return redirect()->back();
    }
}
