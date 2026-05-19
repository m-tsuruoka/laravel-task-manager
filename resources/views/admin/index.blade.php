<x-layouts::app :title="__('tasks.index')">
    <h1 class="">管理者</h1>

    <h1>ユーザー一覧</h1>

    <table class="border-collapse w-full">
        <tr class="bg-gray-100">
            <th class="border border-gray-300 p-2 text-left">ID</th>
            <th class="border border-gray-300 p-2 text-left">名前</th>
            <th class="border border-gray-300 p-2 text-left">Email</th>
            <th class="border border-gray-300 p-2 text-left">管理者</th>
            <th class="border border-gray-300 p-2 text-left"></th>
        </tr>

        @foreach ($users as $user)
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
            <td class="border border-gray-300 p-2"><a class="bg-blue-400 text-white px-3 py-2 rounded" href="/admin/{{ $user->id }}/edit">編集</a></td>
        </tr>

        @endforeach

    </table>

</x-layouts::app>