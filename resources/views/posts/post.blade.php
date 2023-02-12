<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Content --}}
                    <section>
                        <div class="mx-auto flex max-w-7xl flex-col items-center px-5 py-8 sm:px-6 lg:px-8">
                            <div class="prose prose-blue mx-auto flex w-full max-w-3xl flex-col text-left">
                                <div class="mx-auto w-full">
                                    <h1 class="text-3xl font-bold mt-4">
                                        {{ $post->title }}
                                    </h1>
                                    <div class="my-4">
                                        {{ $post->body }}
                                    </div>
                                </div>

                                {{-- Post a Comment --}}
                                <form action="#" method="POST">
                                    @csrf
                                    <label for="body" class="block mb-2 font-bold dark:text-white">
                                        Post your comments
                                    </label>
                                    <textarea id="body" rows="4" name="body"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500
                                         dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write your thoughts here..."></textarea>

                                    <button type="submit"
                                        class="w-32 mt-5 rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white
                                        transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                        focus:ring-offset-2 active:bg-gray-900"
                                        href="#"> {{ __('Comment') }} </button>
                                </form>
                                {{-- / Post a Comment --}}
                            </div>


                        </div>
                    </section>

                    {{-- comments --}}
                    <div class="mx-auto max-w-screen-sm">
                        <h3 class="mb-4 text-lg font-semibold text-gray-900">{{ $post->comments->count() }} Comments
                        </h3>
                        <div class="space-y-4">
                            @foreach ($post->comments as $comment)
                                {{--  component comment --}}
                                <div class="flex">
                                    <div class="mr-3 flex-shrink-0">
                                        <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                            src="https://i.pravatar.cc/300" alt="" />
                                    </div>
                                    <div class="flex-1 rounded-lg border px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                        <strong>{{ Auth::user()->name }}</strong> <span class="text-xs text-gray-400">
                                            {{ $comment->created_at }}
                                        </span>
                                        <p class="text-sm">
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                                {{--  / component comment --}}
                            @endforeach
                        </div>
                        {{-- Ende of Content --}}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
