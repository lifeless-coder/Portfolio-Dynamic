<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\heroimage;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\about_me;
use App\Models\Aboutme_image;
use App\Models\Education;
use App\Models\quicklink;
use App\Models\Footercontact;
use App\Models\Footertext;

class PortfolioController extends Controller
{
    
    public function index()
    {
        $skills = Skill::all();
        $heroimages= heroimage::all();
        $about=about_me::all();
        $about_image= Aboutme_image::all();
        $educations= Education::all();
        $project = Project::latest()->take(9)->get();
        $quicklinks= quicklink::all();
        $fcontacts= Footercontact::all();
        $footertext= Footertext::all();
        return view('user.index', compact('skills', 'heroimages', 'project', 'about', 'about_image', 'educations', 'quicklinks','fcontacts', 'footertext'));
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

    public function footerSettings()
    {
        $footertext = Footertext::first();
        $quicklinks= quicklink::all();
        $fcontacts= Footercontact::all();
        return view('user.footerSettings', compact('footertext', 'quicklinks', 'fcontacts'));
    }

    



}
