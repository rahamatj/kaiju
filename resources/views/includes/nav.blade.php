<nav class="{{ basename(request()->path()) == '' ? 'nav-home' : 'nav' }}">
    <ul class="list">

        <li class="item" style="{{ basename(request()->path()) == '' ? 'display:none;' : '' }}">
            <a class="link" href="{{ route('/') }}">Home</a>
        </li>

        <li class="item" style="{{ basename(request()->path()) == 'blog' ? 'display:none;' : '' }}">
            <a class="link" href="{{ route('blog') }}">Blog</a>
        </li>

        <li class="item" style="{{ basename(request()->path()) == 'projects' ? 'display:none;' : '' }}">
            <a class="link" href="http://localhost:4000/projects">Projects</a>
        </li>

        <li class="item" style="{{ basename(request()->path()) == 'about' ? 'display:none;' : '' }}">
            <a class="link" href="http://localhost:4000/about">About</a>
        </li>

        <li class="item" style="{{ basename(request()->path()) == 'resume' ? 'display:none;' : '' }}">
            <a class="link" href="https://google.com/?q=my+resume">Résumé</a>
        </li>

    </ul>
</nav>