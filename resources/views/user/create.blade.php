<x-app-layout>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class=" mb-6 mt-6">
            <x-label class="capitalize" for="username" :value="__('username')" />
            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            @error('username')
            <div class="text-red-500 mt-2"> {{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-6 mt-6">
            <x-label class="capitalize" for="name" :value="__('name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            @error('name')
            <div class="text-red-500 mt-2"> {{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-6 mt-6">
            <x-label class="capitalize" for="password" :value="__('password')" />
            <x-input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('password')" required />
            @error('password')
            <div class="text-red-500 mt-2"> {{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-6 mt-6">
            <x-label class="capitalize" for="role" :value="__('role')" />
            <select class="block w-full mt-1" name="role" id="role">
                <option value="admin">admin</option>
                <option selected value="author">author</option>
            </select>
        </div>
        <x-button>Submit</x-button>
    </form>
</x-app-layout>