<?php

namespace App\Http\Controllers;

use App\Models\ProjectList;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProjectManagerController extends Controller
{
    public function manager()
    {
        $projectManagerWithProjectsDone = User::where('type', '=', '2')->get();
        $data = [];
        $colors = ['#f56954', '#00a65a', '#f39c12', '#FF204E', '#00224D', '#F1EF99', '#EBC49F', '#D37676', '#7469B6'];

        foreach ($projectManagerWithProjectsDone as $key => $projectManager) {
            $doneProjectsCount = ProjectList::where('status', '=', 'Done')
                ->where('manager_id', '=', $projectManager->id)
                ->count();

            if ($doneProjectsCount === 0) {
                continue;
            }

            $data[] = [
                'manager_id' => $projectManager->id,
                'manager_name' => $projectManager->fullname,
                'done_projects_count' => $doneProjectsCount,
                'color' => $colors[$key % count($colors)],
            ];
        }

        return response()->json($data);
    }



    public function tasks()
    {
        $employeesWithTasksDone = User::where('type', '=', '3')->orWhere('type', '=', '2')->get();
        $data = [];
        $colors = ['#f56954', '#00a65a', '#f39c12', '#FF204E', '#00224D', '#F1EF99', '#EBC49F', '#D37676', '#7469B6'];

        foreach ($employeesWithTasksDone as $key => $employee) {
            $doneTasksCount = TaskList::where('status', '=', 'Done')
                ->where('member_id', '=', $employee->id)
                ->count();

            if ($doneTasksCount === 0) {
                continue;
            }

            $data[] = [
                'employee_id' => $employee->id,
                'employee_name' => $employee->fullname,
                'done_tasks_count' => $doneTasksCount,
                'color' => $colors[$key % count($colors)],
            ];
        }

        return response()->json($data);
    }
}
