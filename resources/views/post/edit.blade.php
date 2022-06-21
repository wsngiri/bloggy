<x-app-layout>
    <form action="{{route('posts.update', ['id' => $post->id])}}" method="post">
        @csrf
        <div class=" mb-6 mt-6">
            <x-label class="capitalize" for="title" :value="__('title')" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title ?? old('title')" required />
            @error('title')
            <div class="text-red-500 mt-2"> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <x-label class="capitalize" for="content" :value="__('content')" />
            <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'" name="content" id="content">{{$post->content ?? old('content')}} </textarea>
            @error('content')
            <div class="text-red-500 mt-2"> {{ $message }}</div>
            @enderror
        </div>
        <x-button>Submit</x-button>
    </form>
</x-app-layout>