<form method="post">
    {{ csrf_field() }}
    <input name="id"><br/>
    <textarea name="code"></textarea>
    <button type="submit">go</button>
</form>