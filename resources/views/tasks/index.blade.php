<x-layouts::app :title="__('tasks.index')">
    <h1 class="flex justify-center text-2xl pb-5 font-bold">タスク管理</h1>

    <div class="border p-5">
        <p class="font-bold">追加フォーム</p>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <input
                class="border border-gray-300 p-2 rounded mb-2"
                type="text"
                name="title" placeholder="タスク名" required>
            　
            <input
                class="border border-gray-300 p-2 rounded mb-2"
                type="text"
                name="description" placeholder="詳細"><br>

            <label for="">日時：</label>
            <input type="date" name="due_date">
            <label>ステータス</label>
            <select class="border border-gray-300 rounded px-3 py-2 mr-2" name="status">
                <option value="0">未着手</option>
                <option value="1">進行中</option>
                <option value="2">完了</option>
            </select>

            <button class="bg-orange-400 text-white px-3 py-2 rounded" #000;" type="submit">登録</button>
        </form>
    </div>

    <div class="border p-5 mt-5">
        <p class="font-bold">検索</p>
        <form action="">
            <input class="border border-gray-300 p-2 rounded" type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="キーワード検索" placeholder="検索キーワード">

            <select class="border border-gray-300 rounded px-3 py-2" name="status">
                <option value="">すべて</option>
                <option value="0">未着手</option>
                <option value="1">進行中</option>
                <option value="2">完了</option>
            </select>
            <button class="bg-orange-400 text-white px-3 py-2 rounded" type="submit">検索</button>
        </form>
    </div>

    <!-- 一覧 -->
    <div>
        <p class="flex justify-center pt-10 font-bold">タスク一覧</p>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 break-words">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="grid grid-cols-3 gap-4">

                        @forelse ($tasks as $task)
                        <div class="
        @if ($task->status == 0)
            bg-gray-100
        @elseif ($task->status == 1)
            bg-green-100
        @elseif ($task->status == 2)
            bg-red-100
        @endif

        p-4 rounded h-full flex flex-col
    ">

                            <div class="font-bold">
                                {{ $task->title }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $task->description }}
                            </div>

                            <div class="mt-auto text-sm text-gray-500">
                                @if ($task->due_date)
                                @php
                                $today = \Carbon\Carbon::today();
                                $due = \Carbon\Carbon::parse($task->due_date);
                                $diff = $today->diffInDays($due, false);
                                @endphp

                                <p>期限日：{{ $task->due_date }}</p>

                                @if ($diff > 0)
                                <p>残り{{ $diff }}日</p>
                                @elseif ($diff == 0)
                                <p>今日が期限</p>
                                @else
                                <p>{{ abs($diff) }}日超過</p>
                                @endif
                                @endif

                            </div>

                            <div class="flex justify-end">
                                <form action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <select name="status" onchange="this.form.submit()">
                                        <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>未着手</option>
                                        <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>進行中</option>
                                        <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>完了</option>
                                    </select>
                                </form>
                            </div>

                            <div class="flex justify-end gap-2">

                                <a class="bg-blue-400 text-white px-3 py-2 rounded"
                                    href="{{ route('tasks.edit', $task) }}">
                                    編集
                                </a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-2 rounded"
                                        onclick="return confirm('本当に削除しますか？')">
                                        削除
                                    </button>
                                </form>
                            </div>

                        </div>

                        @empty
                        <div>タスクがありません</div>
                        @endforelse

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-layouts::app>