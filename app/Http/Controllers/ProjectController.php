<?php

namespace App\Http\Controllers;

use App\Project;
use App\TimeEntry;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{

    /**
     * @param Project $project
     * @return mixed
     */
    public function edit(Project $project)
    {
       return view('settings', compact('project'));
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title'=> 'required',
            'rate' => 'required|numeric'
        ]);

        $project->update($request->all());

        flash()->success('Success!', 'Project data updated!');

        return redirect()->back();

    }
    /**
     * @param Project $project
     * @return Project
     */
    public function getProjectData(Project $project)
    {
        return $project;
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function getTimeEntries(Project $project)
    {
        return $project->timeEntries;
    }

    /**
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addTimeEntry(Project $project, Request $request)
    {
        return $project->addTimeEntry(TimeEntry::fromRequest($request));
    }

    /**
     * @param Project|null $project
     * @param TimeEntry $timeEntry
     * @return bool|null
     * @throws \Exception
     */
    public function deleteTimeEntry(Project $project = null, TimeEntry $timeEntry)
    {
        $timeEntry->delete();
    }
}
