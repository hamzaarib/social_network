<x-master title="Profile">
    <x-alert type="info">
        <h3>Profile</h3>
    </x-alert>
    <x-back page="index" type="danger"/>
    <div class="container-fluid w-75">
        <div class="row">
            <div class="card my-4 py-4">
                <img src="{{asset('storage/'.$profile->image)}}" alt="" class="card-img-top w-25 mx-auto"/>
                <div class="card-body text-center">
                    <h4 class="card-title">#{{$profile->id}} {{$profile->name}}</h4>
                    <p class="card-text">{{$profile->created_at->format("d-m-y")}}</p>
                    <p class="card-text">Email: <a href="#">{{$profile->email}}</a></p>
                    <p class="card-text">{{$profile->bio}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h3>Publications</h3>
            @foreach($profile->getPublications as $publication)
                <x-publication :publication="$publication"/>
            @endforeach
        </div>
    </div>
</x-master>