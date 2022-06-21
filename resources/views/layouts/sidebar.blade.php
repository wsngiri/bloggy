<div class="w-1/5 bg-gray-800 min-h-screen p-4 py-5">
    <div class="mb-6">
        <header class="font-medium text-gray-400 px-2 uppercase text-xs">
            Main
        </header>
        <a href="{{ route('dashboard') }}" class="block text-gray-200 px-2 py-2">Dashboard</a>
    </div>
    <div class="mb-6">
        <header class="font-medium text-gray-400 px-2 uppercase text-xs">
            Posts
        </header>
        <a href="{{ route('posts.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
        <a href="{{ route('posts.index') }}" class="block text-gray-200 px-2 py-2">Table</a>
    </div>
    @if(Auth::user()->role === 'admin')
    <div class="mb-6">
        <header class="font-medium text-gray-400 px-2 uppercase text-xs">
            Users
        </header>
        <a href="{{ route('users.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
        <a href="{{ route('users.index') }}" class="block text-gray-200 px-2 py-2">Table</a>
    </div>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="block text-gray-200 px-2 py-2" href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
</div>