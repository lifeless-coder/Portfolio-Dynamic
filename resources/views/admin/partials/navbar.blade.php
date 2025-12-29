<nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand">Dashboard</span>

        <div class="ms-auto">
            <span class="text-muted">
                {{ auth()->user()->name ?? 'Admin' }}
            </span>
        </div>
    </div>
</nav>
