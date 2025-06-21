<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表示
        </h2>
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
    </x-slot>

    <div class="mx-auto px-6">
        @foreach ($posts as $post)
            <div class="post-block mt-4 p-8 bg-white w-full rounded-2xl">
                <h1 class="p-4 text-lg font-semibold">
                    件名：
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600">
                        {{ $post->title }}
                    </a>
                </h1>
                <hr class="w-full">
                <p class="mt-4 p-4">
                    {{ $post->body }}
                </p>
                <div class="p-4 text-sm font-semibold">
                    <p>
                        {{ $post->created_at }} / {{ $post->user->name }}
                    </p>
                    <div class="p-4 text-sm font-semibold flex gap-4 items-center">
                        <button class="like-btn like-up text-gray-500 hover:text-red-500 transition duration-200">
                            👍
                        </button>
                        <button class="like-btn like-down text-gray-500 hover:text-blue-500 transition duration-200">
                            👎
                        </button>
                        <span class="like-count">0</span>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mb-4">
            {{ $posts->links() }}

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const postBlocks = document.querySelectorAll(".post-block");

            postBlocks.forEach(post => {
                const likeUp = post.querySelector(".like-up");
                const likeDown = post.querySelector(".like-down");
                const countSpan = post.querySelector(".like-count");

                likeUp.addEventListener("click", function() {
                    let count = parseInt(countSpan.textContent);
                    count++;
                    countSpan.textContent = count;
                });

                likeDown.addEventListener("click", function() {
                    let count = parseInt(countSpan.textContent);
                    if (count > 0) {
                        count--;
                    }
                    countSpan.textContent = count;
                });
            });
        });
    </script>


</x-app-layout>
