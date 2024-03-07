<x-master title="Update Publication">
    <x-alert type="success">
        <h3>Update Publication</h3>
    </x-alert>
    <x-back page="index" type="danger"/>
    @if ($errors->any())
    <div class="container w-50">
        <x-alert type="danger">
            <h3>Error:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </x-alert>
    </div>
    @endif
    <div class="container w-50">
        <form action="{{route('publication.update',$publication->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="m-2 text-center">
                    <img src="{{asset('storage/'.$publication->image)}}" width="200px" height="150px" alt="impo">
                </div>
                <label class="form-label mb-3">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre" value="{{old('titre',$publication->titre)}}" class="form-control">
                @error('titre')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" cols="30" rows="10" class="form-control">{{old('body',$publication->body)}}</textarea>
                @error('body')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-master>