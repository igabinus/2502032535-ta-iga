<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('/css/newcss.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
      <!-- Scripts -->
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="hold-transition">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light m-0">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#exampleModal" class="nav-link" data-toggle="modal" data-target="#newTaskModal">Add New Task</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#exampleModal" class="nav-link" data-toggle="modal" data-target="#newProjectModal">Add New Project</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" method="POST" action="{{route('projects/searchProject')}}">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
        </li>
      </ul>
    </nav>

    <div class="content-wrapper" style="margin-left: 0px;">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div>
        </div>
      </div>


      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Chart -->
            <!-- <div class="col-md-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Progress</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This year
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last year
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="newTaskModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Add New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <br></br>
                                    <form action="{{route('projects/storeTask')}}" method="post" onsubmit="return validatePasswords()">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <input placeholder="Title" type="text" id="taskTitle" name="taskTitle">
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Content" type="text" id="taskDesc" name="taskDesc">
                                        </div>
                                        <div class="form-group">
                                            <select id="taskStatus" name="taskStatus">
                                                @foreach($status as $data)
                                                <option value="{{$data->id}}">
                                                {{$data->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="taskProject" name="taskProject">
                                                @foreach($projects as $data)
                                                <option value="{{$data->id}}">
                                                {{$data->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="taskUser" name="taskUser">
                                                @foreach($users as $data)
                                                <option value="{{$data->id}}">
                                                {{$data->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br></br>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="newProjectModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="card-title">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <br></br>
                                    <form action="{{ route('projects/storeProject') }}" method="POST" id="modal-details">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <input placeholder="Project Title" type="text" id="projectTitle" name="projectTitle">
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Project Description" type="text" id="projectDesc" name="projectDesc">
                                        </div>
                                        <div class="form-group">
                                            <select id="projectStatus" name="projectStatus">
                                                @foreach($status as $data)
                                                <option value="{{$data->id}}">
                                                {{$data->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br></br>
                                        <div class="form-group">
                                              <button class="btn btn-primary" type="submit" form="modal-details" >Save Project</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        
            <!-- Drag and Drop -->
        <section class="dragndrop">
          <div class="container-fluid">
            <div class='project-tasks'>
              <div class="card">
                <div class="card-body background-grey">
                  <div class='project-column'>
                    <div class='project-column-heading'>
                      <h2 class='project-column-heading__title'>Backlog</h2><button
                        class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    @foreach($tasksToDo as $data)
                    <div class='task' draggable='true'>
                      <div class='task__tags'><span class='task__tag task__tag--copyright'>{{$data->ProjectName}}</span><button
                          class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                      <p>{{$data->TaskName}}</p>
                      <div class='task__stats'>
                        <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i> {{$data->UserName}}</time></span>
                        <span><i class="fas fa-comment"></i>3</span>
                        <span><i class="fas fa-paperclip"></i>7</span>
                        <span class='task__owner'></span>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body background-grey">
                  <div class='project-column'>
                    <div class='project-column-heading'>
                      <h2 class='project-column-heading__title'>In Progress</h2><button
                        class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    @foreach($tasksInProgress as $data)
                    <div class='task' draggable='true'>
                      <div class='task__tags'><span class='task__tag task__tag--copyright'>$data->ProjectName</span><button
                          class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                      <p>$data->TaskName</p>
                      <div class='task__stats'>
                        <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
                        <span><i class="fas fa-comment"></i>3</span>
                        <span><i class="fas fa-paperclip"></i>7</span>
                        <span class='task__owner'></span>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body background-grey">
                  <div class='project-column'>
                    <div class='project-column-heading'>
                      <h2 class='project-column-heading__title'>Needs Review</h2><button
                        class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    @foreach($taksNeedReview as $data)
                    <div class='task' draggable='true'>
                      <div class='task__tags'><span class='task__tag task__tag--copyright'>$data->ProjectName</span><button
                          class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                      <p>$data->TaskName</p>
                      <div class='task__stats'>
                        <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
                        <span><i class="fas fa-comment"></i>3</span>
                        <span><i class="fas fa-paperclip"></i>7</span>
                        <span class='task__owner'></span>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body background-grey">
                  <div class='project-column'>
                    <div class='project-column-heading'>
                      <h2 class='project-column-heading__title'>Done</h2><button
                        class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    @foreach($tasksDone as $data)
                    <div class='task' draggable='true'>
                      <div class='task__tags'><span class='task__tag task__tag--copyright'>$data->ProjectName</span><button
                          class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                      <p>$data->TaskName</p>
                      <div class='task__stats'>
                        <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
                        <span><i class="fas fa-comment"></i>3</span>
                        <span><i class="fas fa-paperclip"></i>7</span>
                        <span class='task__owner'></span>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </div>

  <script src="{{ url('/js/dragndrop.js') }}"></script>
  <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/js/adminlte.js') }}"></script>

  <script src="{{ url('/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="dist/js/pages/demo.js"></script>

  <script src="{{ url('/js/pages/dashboard3.js') }}"></script>
</body>

</html>