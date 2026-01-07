<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About_me;
use App\Models\Aboutme_image;
use Illuminate\Http\Request;
use App\Models\heroimage as Hero;
use App\Models\Aboutme_image as About;
use App\Models\Education;
use App\Models\Footercontact;
use App\Models\Project;
use App\Models\Footertext;
use App\Models\Skill;
use App\Models\quicklink;


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
    public function showAboutTextEditForm()
    {
        $about = About_me::first();
        return view('admin.pages.updateaboutText', compact('about'));
    }
    public function storeAbout(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'subtitle'    => 'required|string',
            'description' => 'required|string',
        ]);

        About_me::updateOrCreate(
            ['id' => 1],
            $request->only('title', 'subtitle', 'description')
        );

        $about = About_me::first();
        $about_img= Aboutme_image::first();
         return redirect()->route('admin.about.index') // <-- redirect
                     ->with('success', 'About section updated!');
    }


    public function AboutImage()
    {
        $about_img= Aboutme_image::first();
        return view('admin.pages.aboutmeImg', compact('about_img'));
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

        return back()->with('success', 'Image updated!');
    }

    // Skills Section
    public function skills(Request $request){
        $skills = Skill::all();
        return view('admin.pages.skills', compact('skills'));
    }
    public function createSkill(){
        return view('admin.pages.addskills');
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
            'name' => $request->title,
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

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.pages.updateskillform', compact('skill'));
    }
   public function updateSkill(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);     

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }

        $skill->update($data);

        return redirect()->route('admin.skills.index')
                 ->with('success', 'Skill updated!');
    }


    // Education Section

    public function education()
    {
        $educations = Education::all();
        return view('admin.pages.education', compact('educations'));
    }   
    public function createEducation(){
        $educations = Education::all();
        return view('admin.pages.addEducationForm', compact('educations'));
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

        return redirect()->route('admin.education.index')
                 ->with('success', 'Education added!');
    }
    public function editEducation($id)
    {
        $education = Education::findOrFail($id);
        return view('admin.pages.editEducation', compact('education'));
    }
    public function updateEducation(Request $request, $id)
    {
        $education = Education::findOrFail($id);
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

        $education->update($data);

        redirect()->route('admin.education.index')
                 ->with('success', 'Education updated!');
    }
    public function deleteEducation($id)
    {
        $education = Education::findOrFail($id);    
        if (file_exists(public_path('img/'.$education->image))) {
            unlink(public_path('img/'.$education->image));
        }    
        $education->delete();    
        return back()->with('success', 'Education deleted!');
    }


    // Projects Section
    public function projects()
    {
        $projects = Project::all();
        return view('admin.pages.project', compact('projects'));
    }

    public function createProject(){
        return view('admin.pages.addprojectform');
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

        return redirect()->route('admin.projects.index')
                 ->with('success', 'Project added!');
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

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.pages.projectUpdate', compact('project'));
    }
    public function storeEditProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string',
            'project_url' => 'required|url',
            'image'       => 'nullable|image'
        ]);

        $data = $request->only('title', 'description', 'project_url');

        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }

        $project->update($data);

        return back()->with('success', 'Project updated!');
    }


    // Footer Settings



    /* FOOTER TEXT */
    public function footerText()
    {
        $texts = Footertext::all();
        return view('admin.pages.footertext', compact('texts'));
    }

    public function storeFooterText(Request $request)
{
    Footertext::updateOrCreate(
        ['id' => 1],              // condition
        ['text' => $request->text] // data to update/create
    );

    return back()->with('success', 'Footer text updated successfully');
}

    public function deleteFooterText($id)
    {
        Footertext::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }

    /* FOOTER CONTACT */
    public function footerContact()
    {
        $contacts = Footercontact::all();
        return view('admin.pages.footercontact', compact('contacts'));
    }

    public function storeFooterContact(Request $request)
    {
        Footercontact::create([
            'text' => $request->text
        ]);
        return back()->with('success', 'Contact added');
    }

    public function deleteFooterContact($id)
    {
        Footercontact::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }

    /* FOOTER QUICK LINK */
    public function footerQuickLink()
    {
        $links = quicklink::all();
        return view('admin.pages.footerquicklink', compact('links'));
    }

    public function storeQuickLink(Request $request)
    {
        quicklink::create([
            'name' => $request->name,
            'url'  => $request->url,
        ]);
        return back()->with('success', 'Link added');
    }

    public function deleteQuickLink($id)
    {
        quicklink::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }
}






