<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>

        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    {{ $post->title }}
                    投稿の個別表示部分
                </h1>
                <div class="text-right flex">
                    <a href="{{ route('post.edit', $post) }}" class="flex-1">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>
                    <form method="post" action="{{ route('post.destroy', $post) }}" class="flex-2">
                        @csrf
                        @method('delete')
                        <x-primary-button>
                            削除
                        </x-primary-button>
                    </form>
                </div>

                <div class="w-full">
                    <p class="mt-4 whitespace-pre-line">
                        {{ $post->body }}
                    </p>
                    <div class="text-sm font-semibold flex flex-row-reverse">
                        <p>{{ $post->created_at }}</p>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('post.index') }}" class="self-start">
                            一覧ページへ
                        </a>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('post.create') }}" class="self-start">
                            投稿ページへ
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
