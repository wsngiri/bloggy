<x-app-layout>
    <x-slot name="title">Tags Table</x-slot>
    <h3 class="mt-3 mb-6">Tags Table</h3>
    <div class="shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Content</th>

                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            @foreach ($posts as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-3">{{ $item->id }}</td>
                <td class="px-6 py-3 font-medium text-gray-900 dark:text-white ">{{ $item->title }}</td>
                <td class="px-6 py-3 font-medium text-gray-900 dark:text-white ">{{ $item->content }}</td>
                <td class="px-6 py-3">
                    <div class="flex items-center">
                        <a class="text-sky-500 hover:underline mr-2" href="{{ route('posts.edit', ['id' => $item->id]) }}">Edit</a>
                        <div x-data="{ open: false }">
                            <x-modal x-show="open" title="Delete This Playlists?" slot="YOOO">
                                <div class="flex justify-between items-center">
                                    <form action="{{ route('posts.destroy', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button type="submit" class="bg-red hover:underline">Yes</x-button>
                                    </form>
                                    <x-button @click="open=false" class="hover:underline">Cancel
                                    </x-button>
                                </div>
                            </x-modal>
                            <button type="submit" @click="open = true" class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>