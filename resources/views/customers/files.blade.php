</br>
</br>
</br>
</br>
<form action="/files" method="POST" enctype="multipart/form-data">
  <div align="center">
  <input type="file" name="newfile" value="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <button type="submit">Save File</button>
</div>
</form>
