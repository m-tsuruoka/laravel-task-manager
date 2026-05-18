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
        required
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
    <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>未着手</option>
    <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>進行中</option>
    <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>完了</option>
</select>
    <label>日時</label>
            <input  value="{{ old('due_date', $task->due_date)}}" type="date" name="due_date">

    <button type="submit">更新</button>
</form>
    </div>

</x-layouts::app>
