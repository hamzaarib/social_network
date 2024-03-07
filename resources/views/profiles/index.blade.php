<x-master title="Tout Profile">
    <x-alert type="info">
        <h3>List des Profiles</h3>
    </x-alert>
    <div class="container">
        <div class="text-end">
            <a href="{{route('profile.create')}}" class="btn btn-success">Add Profile</a>
        </div>
        <div>
            <span class="background">
                <span class="centering">
                    <section class="articles">
                        @foreach ($profiles as $profile)
                            <x-profile-card :profile="$profile" />
                        @endforeach
                    </section>
                </span>
            </span>
        </div>
        {{$profiles->links()}}
    </div>
    
</x-master>
