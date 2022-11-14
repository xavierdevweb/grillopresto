<form method="POST" action="{{route('ajoutImage.store')}}" enctype="multipart/form-data">
    @csrf

    <input type="file" name="image">
    <input type="submit">

</form>