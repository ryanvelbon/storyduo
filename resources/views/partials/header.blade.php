<nav class="bg-gray-800 text-white p-4">
    <div class="container flex justify-between">
        <div>
            <a href="{{ route('home') }}">Home</a>
        </div>
        <div class="space-x-4">
            <a href="{{ route('stories.index') }}" wire:navigate>Stories</a>
            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <span>Sign out</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-primary-400">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
@if(isset($languages) && count($languages) > 0)
    <nav class="bg-gray-200">
        <div class="container py-4 flex justify-around">
            @foreach($languages as $language)
                <a href="">{{ $language->name }}</a>
            @endforeach
        </div>
    </nav>
@endif