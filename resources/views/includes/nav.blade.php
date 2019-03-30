<nav class="{{ basename(request()->path()) == '' ? 'nav-home' : 'nav' }}">
    <ul class="list">

        <li class="item" style="{{ basename(request()->path()) == '' ? 'display:none;' : '' }}">
            <a class="link" href="{{ route('/') }}">Home</a>
        </li>

        <li class="item" style="{{ basename(request()->path()) == 'blog' ? 'display:none;' : '' }}">
            <a class="link" href="{{ route('blog') }}">Blog</a>
        </li>

        @if(config('kaiju.projects'))
        <li class="item" style="{{ basename(request()->path()) == 'projects' ? 'display:none;' : '' }}">
            <a class="link" href="{{ route('projects') }}">Projects</a>
        </li>
        @endif

        <li class="item" style="{{ basename(request()->path()) == 'about' ? 'display:none;' : '' }}">
            <a class="link" href="http://localhost:4000/about">About</a>
        </li>

        @if(config('kaiju.resume'))
        <li class="item" style="{{ basename(request()->path()) == 'resume' ? 'display:none;' : '' }}">
            <a class="link" href="{{ config('kaiju.resume-external') 
                ? config('kaiju.resume-url') 
                : asset('vendor/kaiju/assets') . '/' . config('kaiju.resume-url') }}" target="_blank">Résumé</a>
        </li>
        @endif
    </ul>
</nav>