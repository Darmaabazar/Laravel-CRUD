<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\job;

class jobController extends Controller
{
    public function index() {
        $jobs = job::all();
        return view('pages.index', compact('jobs'));
    }



    public function create(Request $request) {
        return view('pages.create');
    }

    public function upload(Request $request) {
        $validateData = $request->validate([
            'company' => 'required|string|max:200',
            'name' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            // $extension = $image -> getClientOriginalExtension();
            $imageName = time().'.'.$image->extension();
            $image->move('uploads/jobsImages/', $imageName);
            $validateData['image'] = 'uploads/jobsImages/'.$imageName;
        } else {
            $validateData['image'] = null;
        }
        
        job::query()->create([
            'company' => $validateData['company'],
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'requirements' => $validateData['requirements'],
            'salary' => $validateData['salary'],
            'image' => $validateData['image']
        ]);

        return redirect('/jobs')->with('message', 'Job Succesfully Created');
    }





    public function edit(Request $request) {
        $job = job::find($request->id);
        return view('pages.edit', compact('job'));
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'company' => 'required|string|max:200',
            'name' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $job = job::query()->find($id);

        if($request->hasFile('image')) {
            $destination = $job -> image;

            if(File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            
            $imageName = time().'.'.$image->extension();
            $image->move('uploads/jobsImages/', $imageName);
            $validateData['image'] = 'uploads/jobsImages/'.$imageName;
        }
        else{
            $validateData['image'] = $job->image;
        }
        
        $job->update([
            'company' => $validateData['company'],
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'requirements' => $validateData['requirements'],
            'salary' => $validateData['salary'],
            'image' => $validateData['image']
        ]);

        return redirect('/jobs')->with('message', 'Job Succesfully Updated');
    }



    public function destroy(Request $request, $id) {

        $job = job::query()->find($id);

        $destination = $job -> image;

        if(File::exists($destination)) {
            File::delete($destination);
        }
        
        $job->delete();

        return redirect('/jobs')->with('message', 'Job Succesfully Deleted');
    }
}
