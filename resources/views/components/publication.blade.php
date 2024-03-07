<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card mb-3  bg-light">
        <div class="profile position-relative">
            <img src="{{asset('storage/'.$publication->getProfile->image)}}" alt="">
            <h5>{{$publication->getProfile->name}}</h5>
            <a href="{{route('profile.show',$publication->getProfile->id)}}" class="stretched-link"></a>
        </div>
        <hr>
        @auth
            @if(auth()->user()->id === $publication->profile_id)
            <div class="text-end  m-2">
                <a href="{{route('publication.edit',$publication->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('publication.destroy',$publication->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Are You sure Delete Publication {{$publication->titre}} ?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
            @endif
        @endauth
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{$publication->titre}}</p>
                <p>{{Str::limit($publication->body,50)}}</p>
                @if(!is_null($publication->image))
                    <footer class="blockquote-footer">
                        {{-- <cite title="Source title">Source title</cite> --}}
                        <img src="{{asset('storage/'.$publication->image)}}" class="img-fluid">
                    </footer>
                @endif
            </blockquote>
        </div>
    </div>
</body>
</html>
