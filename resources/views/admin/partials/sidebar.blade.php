<div class="sidebar">
    <h5 class="text-white text-center py-3 border-bottom">
        Admin Panel
    </h5>

    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('admin.hero.index') }}"
       class="{{ request()->routeIs('admin.hero.index') ? 'active' : '' }}">
        Hero
    </a>

    <a href="{{ route('admin.about.index') }}"
       class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
        About Me
    </a>

    <a href="{{ route('admin.skills.index') }}"
       class="{{ request()->routeIs('admin.skills.index') ? 'active' : '' }}">
        Skills
    </a>

    <a href="{{ route('admin.education.index') }}"
       class="{{ request()->routeIs('admin.education.index') ? 'active' : '' }}">
        Education
    </a>

    <a href="{{ route('admin.projects.index') }}"
       class="{{ request()->routeIs('admin.projects.index') ? 'active' : '' }}">
        Projects
    </a>

    <!-- Footer Dropdown -->
    <div class="mt-2">
        <a class="text-white px-3 py-2 d-block" data-bs-toggle="collapse" href="#footerMenu">
            Footer Settings
        </a>

        <div class="collapse" id="footerMenu">
            <a href="{{ route('admin.footer.text') }}" class="ps-4">Text Settings</a>
            <a href="{{ route('admin.footer.contact') }}" class="ps-4">Contact Settings</a>
            <a href="{{ route('admin.footer.quicklink') }}" class="ps-4">Quick Links</a>
        </div>
    </div>
</div>
