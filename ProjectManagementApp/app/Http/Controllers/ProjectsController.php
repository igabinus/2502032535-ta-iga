<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;


class ProjectsController extends Controller
{
    public function addNewProject()
    {
        return view('projects/NewProject');
    }

    public function dashboard(){
        $status = DB::select('SELECT * from STATUS s');
        $tasksToDo = DB::select('SELECT t.name as TaskName, p.name as ProjectName from TASKS t inner join PROJECTS p on t.project_id = p.id WHERE t.status_id = 1');
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
        $no=1;
        return view("Barang/ListBarang",["projects" => $projects]);

    }

    public function showStatus(){
        $status = DB::select('SELECT s.name from STATUS s');
        $no=1;
        return view("Barang/ListBarang",["statusTask" => $status]);
    }

    public function addProject(Request $req){

        $project = new Project;
        $project->name = $req->projectTitle;
        $project->description = $req->projectDesc;
        $project->save();

        return redirect("dashboard/dashboard");
    }



}