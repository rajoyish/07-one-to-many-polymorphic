<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Comments') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Content --}}
                    <div class="relative overflow-x-auto">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Comments
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr class="bg-white border-b">

                                        <td class="px-6 py-4">
                                            {{ $comment->id }}
                                        </td>
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ Str::limit($comment->body, 100, '...') }}
                                            <p class="mt-2 text-purple-600 hover:underline cursor-pointer">
                                                @if ($comment->commentable_type === 'App\Models\Post')
                                                    <span
                                                        class="bg-blue-100 px-2 py-0.5 text-blue-600 font-medium text-xs rounded-lg inline-block mr-1">
                                                        Post
                                                    </span>
                                                @else
                                                    <span
                                                        class="bg-yellow-100 px-2 py-0.5 text-yellow-600 font-medium text-xs rounded-lg inline-block mr-1">
                                                        Video
                                                    </span>
                                                @endif
                                                {{ $comment->commentable->title }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $comment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $comments->links() }}
                        </div>
                    </div>
                    {{-- End of Content --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
