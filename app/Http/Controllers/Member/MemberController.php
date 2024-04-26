<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\ProjectMembers;
use App\Models\TaskList;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->user()->id;
        $projectIds = ProjectMembers::where('user_id', $userId)->pluck('project_id')->unique();
        $projects = ProjectList::whereIn('id', $projectIds)->with(['members', 'tasks'])->get();
        foreach ($projects as $project) {
            $project->totalPercentage = $project->tasks->sum('percentage');
            $project->totalTasks = $project->tasks->count();
        }
        $totalTasks = TaskList::where('member_id', $userId)->count();
        $totalProjects = $projects->count();
        return view('member.dashboard', compact('projects', 'totalTasks', 'totalProjects'));
    }




    public function projects()
    {
        $userId = auth()->user()->id;
        $projects = ProjectList::whereHas('members', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('members')->get();

        return view('member.projects.project-list', compact('projects'));
    }


    public function view($id)
    {
        $details = ProjectList::findOrfail($id);
        $projectId = $details->id;
        $tasks = TaskList::where('project_id', '=', $projectId)->get()->all();
        $members = ProjectMembers::where('project_id', '=', $projectId)->get()->all();
        return view('member.projects.view-details', compact('details', 'members', 'tasks'));
    }


    public function tasks()
    {
        $userId = auth()->user()->id;
        $tasks = TaskList::where('member_id', '=', $userId)->get()->all();
        return view('member.projects.task-list', compact('tasks'));
    }
}
