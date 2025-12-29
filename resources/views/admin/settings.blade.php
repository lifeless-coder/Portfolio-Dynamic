<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Admin Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }
        .sidebar {
            height: 100vh;
            width: 260px;
            position: fixed;
            background: #212529;
            padding-top: 20px;
        }
        .sidebar a {
            color: #adb5bd;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #343a40;
            color: #fff;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4 class="text-center text-white mb-4">Portfolio Admin</h4>
    <a href="#hero">Hero</a>
    <a href="#about">About</a>
    <a href="#education">Education</a>
    <a href="#projects">Projects</a>
    <a href="#footer">Footer</a>
</div>

<!-- CONTENT -->
<div class="content">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- HERO -->
    <div class="card mb-4" id="hero">
        <div class="card-header fw-bold">Hero Image</div>
        <div class="card-body">
            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Upload Hero Image</label>
                    <input type="file" name="path" class="form-control" required>
                </div>
                <button class="btn btn-primary">Save Hero Image</button>
            </form>
        </div>
    </div>

    <!-- ABOUT -->
    <div class="card mb-4" id="about">
        <div class="card-header fw-bold">About Me</div>
        <div class="card-body">
            <form action="{{ route('admin.about.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Subtitle</label>
                    <input type="text" name="subtitle" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                </div>

                <button class="btn btn-success">Save About</button>
            </form>
        </div>
    </div>

    <!-- EDUCATION -->
    <div class="card mb-4" id="education">
        <div class="card-header fw-bold">Education</div>
        <div class="card-body">
            <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Degree</label>
                    <input type="text" name="degree" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Institution</label>
                    <input type="text" name="institution" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Years</label>
                    <input type="text" name="years" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success">Add Education</button>
            </form>
        </div>
    </div>

    <!-- PROJECTS -->
    <div class="card mb-4" id="projects">
        <div class="card-header fw-bold">Projects</div>
        <div class="card-body">

            <!-- ADD PROJECT -->
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf

                <div class="mb-3">
                    <label>Project Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Project URL</label>
                    <input type="url" name="project_url" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Project Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button class="btn btn-success">Add Project</button>
            </form>

            <!-- PROJECT LIST -->
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="120">Image</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>
                            <img src="{{ asset('img/'.$project->image) }}" width="100">
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>
                            <a href="{{ $project->project_url }}" target="_blank">View</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this project?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="card mb-4" id="footer">
        <div class="card-header fw-bold">Footer Text</div>
        <div class="card-body">
            <form action="{{ route('admin.footertext.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Footer Text</label>
                    <textarea name="text" class="form-control" rows="3">
{{ $footertext->text ?? '' }}
                    </textarea>
                </div>

                <button class="btn btn-primary">Update Footer</button>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
