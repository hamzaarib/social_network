<x-master title="Create Profile">
    <x-alert type="success">
        <h3>Create Profile</h3>
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
        <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Entrer Your Name">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Entrer Your Email">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Entrer Your Password" />
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Entrer Your Password" />
            </div>
            <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea name="bio" cols="30" rows="10" class="form-control">{{old('bio')}}</textarea>
                @error('bio')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-master>