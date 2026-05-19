<x-layouts::app :title="__('管理者変更')">
    <h1 class="">管理者</h1>
    <table class="border-collapse w-full">
        <tr class="bg-gray-100">
            <th class="border border-gray-300 p-2 text-left">ID</th>
            <th class="border border-gray-300 p-2 text-left">名前</th>
            <th class="border border-gray-300 p-2 text-left">Email</th>
            <th class="border border-gray-300 p-2 text-left">管理者</th>
        </tr>

        <tr>
            <td class="border border-gray-300 p-2">{{ $user->id }}</td>
            <td class="border border-gray-300 p-2">{{ $user->name }}</td>
            <td class="border border-gray-300 p-2">{{ $user->email }}</td>

            <td class="border border-gray-300 p-2">
                @if ($user->is_admin)
                管理者
                @else
                一般
                @endif
            </td>
        </tr>


    </table>
    <form class="pt-5" action="/admin/{{ $user->id }}/role" method="POST">
        @csrf
        @method('PATCH')

        <select class="border border-gray-300 rounded px-3 py-2" name="is_admin">
            <option value="0">一般</option>
            <option value="1">管理者</option>
        </select>

        <button class="bg-blue-400 text-white px-3 py-2 rounded" type="submit" onclick="return confirm('本当に変更しますか？')">
            権限変更
        </button>
    </form>

    <form class="pt-5" action="/admin/{{ $user->id }}" method="POST">
        @csrf
        @method('DELETE')

        <button class="bg-red-500 text-white px-3 py-2 rounded" type="submit" onclick="return confirm('本当に削除しますか？')" >
            ユーザ削除
        </button>
    </form>

<p class="pt-5">登録タスク一覧</p>

<table class="border-collapse w-full">
    <tr class="bg-gray-100">
        <th class="border border-gray-300 p-2 text-left">タイトル</th>
        <th class="border border-gray-300 p-2 text-left">詳細</th>
        <th class="border border-gray-300 p-2 text-left">ステータス</th>
        <th class="border border-gray-300 p-2 text-left">作成日時</th>
    </tr>

    @forelse ($tasks as $task)
        <tr>
            <td class="border border-gray-300 p-2">{{ $task->title }}</td>
            <td class="border border-gray-300 p-2">{{ $task->description }}</td>
            <td class="border border-gray-300 p-2">{{\App\Models\Task::$statuses[$task->status] }}</td>
            <td class="border border-gray-300 p-2">{{ $task->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">
                タスクがありません
            </td>
        </tr>
    @endforelse
</table>


</x-layouts::app>