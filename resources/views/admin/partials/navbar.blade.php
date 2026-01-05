<nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand">Dashboard</span>

        <div class="ms-auto d-flex align-items-center gap-2">
            {{-- View Frontend Button --}}
            <a href="{{ route('portfolio.index') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                View Frontend
            </a>

            {{-- Admin Name --}}
            <span class="text-muted">
                Admin
            </span>
        </div>
    </div>
</nav>
