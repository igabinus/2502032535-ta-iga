<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    public function searchProject(Request $request)
    {
        $cari = $request->search;

        $project = DB::select('SELECT p.name as ProjectName from  PROJECTS p WHERE p.name like "%$cari%"');
 
        return view('dashboard/projectList', [
            "project" => $project
        ]);
    }

    public function dashboard(){
        $status = DB::select('SELECT * from STATUS s');
        $tasksToDo = DB::select('SELECT t.name as TaskName, p.name as ProjectName, u.name as UserName from TASKS t inner join PROJECTS p on t.project_id = p.id inner join USERS u on u.id = t.user_id WHERE t.status_id = 1');
        $tasksInProgress = DB::select('SELECT t.name  as TaskName, p.name as ProjectName from TASKS t inner join PROJECTS p on t.project_id = p.id WHERE t.status_id = 4');
        $taksNeedReview = DB::select('SELECT t.name  as TaskName, p.name as ProjectName  from TASKS t inner join PROJECTS p on t.project_id = p.id WHERE t.status_id = 5');
        $tasksDone = DB::select('SELECT t.name  as TaskName, p.name as ProjectName  from TASKS t inner join PROJECTS p on t.project_id = p.id WHERE t.status_id = 2');
        $projects = DB::select('SELECT * from PROJECTS');
        $users = DB::select('SELECT * from USERS');


        return view("dashboard/dashboard",[
            "tasksToDo" => $tasksToDo,
            "tasksInProgress" => $tasksInProgress,
            "taksNeedReview" => $taksNeedReview,
            "tasksDone" => $tasksDone,
            "status" => $status,
            "projects" => $projects,
            "users" => $users
        ]);
    }

    public function showTask(){
        $listTask = DB::select('SELECT t.name, p.name from TASKS t inner join PROJECTS p on t.project_id = p.id');
        $no=1;
        return view("Barang/ListBarang",["tasks" => $listTask]);

    }


    public function showProjects(){
        $projects = DB::select('SELECT p.name from PROJECTS p');
        return view("Barang/ListBarang",["projects" => $projects]);

    }

    public function showStatus(){
        $status = DB::select('SELECT s.name from STATUS s');
        return view("Barang/ListBarang",["statusTask" => $status]);
    }

    public function storeProject(Request $request)
    {
        $project = Project::create([
            'name' => $request->input('projectTitle'),
            'description' => $request->input('projectDesc'),
            'status_id' => $request->input('projectStatus')
        ]);

        return redirect()->route('dashboard');
    }

    public function storeTask(Request $request)
    {
        $task = Task::create([
            'name' => $request->input('taskTitle'),
            'description' => $request->input('taskDesc'),
            'status_id' => $request->input('taskStatus'),
            'project_id' => $request->input('taskProject'),
            'user_id' => $request->input('taskUser')
        ]);

        return redirect()->route('dashboard');
    }



}