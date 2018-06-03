<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      categoria:
      <select class="" name="select">
        @foreach ($categories as $category)

          <option value="{{$category->id}}">{{$category->name}}</option>

        @endforeach
      </select>
      <br>



    </form>
  </body>
</html>
