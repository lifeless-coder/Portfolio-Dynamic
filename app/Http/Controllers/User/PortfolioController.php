<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
class PortfolioController extends Controller
{
    
    public function index()
    {
        $skills = Skill::all();
        $project = Project::latest()->take(9)->get();
        return view('user.index', compact('skills', 'project'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\message::create([
            'sender' => $request->input('sender'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Message sent successfully!');
    }
}
