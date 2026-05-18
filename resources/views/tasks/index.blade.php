<x-layouts::app :title="__('tasks.index')">
    <h1>タスク管理</h1>

    <div>
        <p>追加フォーム</p>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label>タスク名：</label>
            <input
                style="border: 1px solid #000;"
                type="text"
                name="title">

            <br>

            <label>詳細　　：</label>
            <input
                style="border: 1px solid #000;"
                type="text"
                name="description"><br>
            <label>ステータス</label>
            <select name="status">
                <option value="0">未着手</option>
                <option value="1">進行中</option>
                <option value="2">完了</option>
            </select>

            <button type="submit">登録</button>
        </form>
    </div>
    <div>
        <p>タスク一覧</p>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                   <div class="grid grid-cols-3 gap-4">

@forelse ($tasks as $task)
    <div class="
        @if ($task->status == 0)
            bg-gray-100
        @elseif ($task->status == 1)
            bg-blue-100
        @elseif ($task->status == 2)
            bg-green-100
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
            {{ $task->created_at->format('Y-m-d') }}
        </div>

        <div class="flex justify-end">
            {{ \App\Models\Task::$statuses[$task->status] }}
        </div>

        <div class="flex justify-end gap-2">

    <a class="bg-blue-500 text-white px-3 py-2 rounded"
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