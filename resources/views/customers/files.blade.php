</br>
</br>
</br>
</br>
<form id="Upload" action="/user{{$customer->id}}" enctype="multipart/form-data" method="post">
  <div align="center">
  <input type="file" name="newfile">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <button type="submit">Save File</button>
</div>
</form>
