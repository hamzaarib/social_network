<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <article>
        <figure>
            <img src="{{asset('storage/'.$profile->image)}}" alt="" />
        </figure>
        <div class="article-preview" style="position:relative;">
            <h2>{{$profile->name}}</h2>
            <p>
                {{Str::limit($profile->bio)}}
                <a href="{{route("profile.show",$profile->id)}}" class="read-more stretched-link" >Read more</a>
            </p>
        </div>
        <div class="card-foot bg-light">
            <form action="{{route('profile.edit',$profile->id)}}" method="get">
                @csrf
                <button class="btn btn-info">Edit</button>
            </form>
            <form action="{{route('profile.destroy',$profile->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </article>
</body>
</html>