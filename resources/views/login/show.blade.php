<x-master title="Se Connecter">
    <div class="container w-50 bg-light p-5">
        <x-alert type="light">
            <h3 class="text-center">Authentification</h3>
        </x-alert>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="login" value="{{old('login')}}" class="form-control" placeholder="Entrer Your Email">
                @error('login')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Entrer Your Password" />
            </div>
            <button type="submit" class="btn btn-primary">Connection</button>
        </form>
    </div>
</x-master>