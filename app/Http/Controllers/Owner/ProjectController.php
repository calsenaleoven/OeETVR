<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\ProjectFileManager;
use App\Models\ProjectList;
use App\Models\ProjectMaterials;
use App\Models\ProjectMembers;
use App\Models\TaskList;
use App\Models\ProjectFeedback;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function projects()
    {
       $userId = auth()->user()->id;
        $projects = ProjectList::where('project_owner', '=', $userId)
                    ->with('members.user') // Eager load members and their user details
                    ->get();
    
        return view('owner.projects.project-list', compact('projects'));
        $details = ProjectList::with('members.user')->findOrFail($id); // Eager load members and user
        $members = $details->members; // This will now contain users due to eager loading
    }


    public function view($id)
    {
        $details = ProjectList::with('members.user')->findOrFail($id); // Eager load members and user
        $projectId = $details->id;
    
        $tasks = TaskList::where('project_id', '=', $projectId)->get()->all();
        $members = $details->members; // This will now contain users due to eager loading
    
        return view('owner.projects.view-details', compact('details', 'members', 'tasks'));
    }


    public function files($projectId)
    {
        $files = ProjectFileManager::where('project_id',$projectId)->get();
        return view('owner.projects.project-files', compact('files'));
    }


    public function materials($projectId)
    {
        $details = ProjectList::findOrFail($projectId);
        $materials = ProjectMaterials::where('project_id', $projectId)->orderBy('id', 'asc')->get();

        $overallTotal = $materials->sum(function ($material) {
            return $material->total_price * $material->quantity;
        });

        return view('owner.projects.project-materials', compact('materials', 'details', 'overallTotal'));
    }
    
   public function submitFeedback(Request $request)
    {
        // Validate the request data
        $request->validate([
            'project_id' => 'required|exists:project_lists,id',
            'ratings' => 'required|array',
            'comments' => 'nullable|array',
        ]);
    
        foreach ($request->ratings as $projectMemberId => $rating) {
            // Find the project member using project_id and member_id
            $projectMember = ProjectMembers::where('id', $projectMemberId)
                ->where('project_id', $request->project_id)
                ->first();
    
            if ($projectMember) {
                // Assuming member_id is what you need for feedback
                $userId = $projectMember->member_id; // Get the correct user ID
    
                // Check if the user exists
                if (User::where('id', $userId)->exists()) {
                    // Create feedback entry
                    ProjectFeedback::create([
                        'project_id' => $request->project_id,
                        'member_id' => $userId,
                        'rating' => $rating,
                        'comment' => $request->comments[$projectMemberId] ?? null,
                    ]);
                } else {
                    \Log::warning("User not found for member ID: $userId. Feedback not saved for Project ID: {$request->project_id}");
                }
            } else {
                \Log::warning("Project member not found for ID: $projectMemberId. Feedback not saved for Project ID: {$request->project_id}");
            }
        }
    
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
