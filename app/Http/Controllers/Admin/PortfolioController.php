<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About_me;
use App\Models\Aboutme_image;
use Illuminate\Http\Request;
use App\Models\heroimage as Hero;
use App\Models\Aboutme_image as About;
use App\Models\Education;
use App\Models\Project;
use App\Models\Footertext;
use App\Models\Skill;


class PortfolioController extends Controller
{
    
    public function settings()
    {
        return view('admin.dashboard', [
            'projects'   => Project::latest()->get(),
            'footertext' => Footertext::first()
        ]);
    }

    // Hero Section
    public function hero()
    {
        $hero = Hero::first();
        return view('admin.pages.hero', compact('hero'));
    }
    public function storeHero(Request $request)
    {
        $request->validate([
            'path' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $filename = time().'.'.$request->path->extension();
        $request->path->move(public_path('img'), $filename);

        Hero::updateOrCreate(
            ['id' => 1],
            ['path' => $filename]
        );

        return back()->with('success', 'Hero image saved successfully!');
    }


    // About Me Section
    public function about()
    {
        $about = About_me::first();
        $about_img= Aboutme_image::first();
        return view('admin.pages.aboutme', compact('about', 'about_img'));
    }
    public function storeAbout(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'subtitle'    => 'required|string',
            'description' => 'required|string',
        ]);

        About::updateOrCreate(
            ['id' => 1],
            $request->only('title', 'subtitle', 'description')
        );

        return back()->with('success', 'About section updated!');
    }

    public function storeAboutImage(Request $request)
    {
        $request->validate([
            'path' => 'required|image|mimes:jpg,jpeg,png'
        ]);     

        $filename = time().'.'.$request->path->extension();
        $request->path->move(public_path('img'), $filename);

        Aboutme_image::updateOrCreate(
            ['id' => 1],
            ['path' => $filename]
        );

        return back()->with('success', 'About image updated!');
    }

    // Skills Section
    public function skills(Request $request){
        $skills = Skill::all();
        return view('admin.pages.skills', compact('skills'));
    }
    public function storeSkill(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);     
        $filename = time().'.'.$request->image->extension();
        $request->image->move(public_path('img'), $filename);   
        Skill::create([
            'title' => $request->name,
            'image' => $filename
        ]); 
        return back()->with('success', 'Skill added successfully!');
    }
    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);    
        if (file_exists(public_path('img/'.$skill->image))) {
            unlink(public_path('img/'.$skill->image));
        }    
        $skill->delete();    
        return back()->with('success', 'Skill deleted!');
    }
    public function updateSkill(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);    
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);     
        $data = ['title' => $request->title];    
        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }    
        $skill->update($data);    
        return back()->with('success', 'Skill updated!');
    }

        public function storeEducation(Request $request)
    {
        $request->validate([
            'degree'      => 'required|string',
            'institution' => 'required|string',
            'years'       => 'required|string',
            'image'       => 'nullable|image'
        ]);

        $data = $request->only('degree', 'institution', 'years');

        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }

        Education::create($data);

        return back()->with('success', 'Education added!');
    }

    
    public function storeProject(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string',
            'project_url' => 'required|url',
            'image'       => 'required|image'
        ]);

        $filename = time().'.'.$request->image->extension();
        $request->image->move(public_path('img'), $filename);

        Project::create([
            'title'       => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'image'       => $filename,
        ]);

        return back()->with('success', 'Project added successfully!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);

        if (file_exists(public_path('img/'.$project->image))) {
            unlink(public_path('img/'.$project->image));
        }

        $project->delete();

        return back()->with('success', 'Project deleted!');
    }

    
    public function updateFooterText(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        Footertext::updateOrCreate(
            ['id' => 1],
            ['text' => $request->text]
        );

        return back()->with('success', 'Footer text updated!');
    }
}
