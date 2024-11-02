<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\TaskList;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user()->id;
        $projects = ProjectList::where('manager_id', $user)->with('tasks')->get();
        $projectCount = ProjectList::where('manager_id', $user)->first();

        foreach ($projects as $project) {
            $project->totalPercentage = $project->tasks->sum('percentage');
            $project->totalTasks = $project->tasks->count();
        }

        $totalProjects = $projects->count();
        $task = 0;

        if ($projectCount) {
            $task = TaskList::where('project_id', '=', $projectCount->id)->count();
        }

        return view('manager.dashboard', compact('projects', 'totalProjects', 'task'));
    }
    
    public function view($id)
    {
        $details = ProjectList::findOrfail($id);
        $projectId = $details->id;
        $tasks = TaskList::where('project_id', '=', $projectId)->get()->all();
        $members = ProjectMembers::where('project_id', '=', $projectId)->get()->all();
        return view('manager.projects.view-details', compact('details', 'members', 'tasks'));
    }
    
    public function tasks()
    {
        $userId = auth()->user()->id;
        $tasks = TaskList::where('member_id', '=', $userId)->get()->all();
        return view('manager.projects.task-list', compact('tasks'));
    }
    
    public function updateStatus(Request $request)
    {
        $task = TaskList::find($request->id);
        
        if ($task) {
            $task->status = $request->status;
            $task->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }
}
