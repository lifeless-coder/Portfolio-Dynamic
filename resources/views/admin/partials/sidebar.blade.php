<div class="sidebar">
    <h5 class="text-white text-center py-3 border-bottom">Admin Panel</h5>

    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('admin.hero.index') }}" class="{{ request()->routeIs('admin.hero.index') ? 'active' : '' }}">
        Hero
    </a>

    <a href="{{ route('admin.about.index') }}" class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
        About Me
    </a>

    <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.index') ? 'active' : '' }}">
        Skills
    </a>

    <a href="#">
        Education
    </a>

    <a href="#">
        Projects
    </a>

    <a href="#">
        Footer
    </a>


    
</div>
