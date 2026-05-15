<x-layouts::app :title="__('tasks.index')">
    <h1>タスク管理</h1>

    <div>
        <p>追加フォーム</p>
        <form action="">
            <label for="">タスク名：</label>
            <input style="border: 1px solid #000;" type="text">
            <br>
            <label for="">詳細　　：</label>
            <input style="border: 1px solid #000;" type="text">
            <button type="submit">登録</button>
        </form>
    </div>

    <div>
        <p>タスク一覧</p>
    </div>

</x-layouts::app>