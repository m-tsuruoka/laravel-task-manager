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

    <button type="submit">更新</button>
</form>
    </div>

</x-layouts::app>
