<x-layouts::app :title="__('tasks.index')">
    <h1>タスク管理</h1>

    <div>
        <p>編集フォーム</p>
        <form action="{{ route('tasks.update', $task)  }}" method="POST">
    @csrf
    @method('PUT')
    <label>タスク名：</label>
    <input
        style="border: 1px solid #000;"
        type="text"
        name="title"
        value="{{ old('title', $task->title)}}"
    >

    <br>

    <label>詳細　　：</label>
    <input
        style="border: 1px solid #000;"
        type="text"
        name="description"
        value="{{ old('description', $task->description)}}"
    ><br>
    <label>ステータス</label>
    <select name="status">
        <option value="0">未着手</option>
        <option value="1">進行中</option>
        <option value="2">完了</option>
    </select>

    <button type="submit">更新</button>
</form>
    </div>

</x-layouts::app>
