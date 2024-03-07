<x-master title="Tout Publication">
    <x-alert type="info">
        <h3>List des Publication</h3>
    </x-alert>
    <div class="container w-50 text-end">
        <a href="{{route('publication.create')}}" class="btn btn-success">Add Publication</a>
    </div>
    <div class="container w-50">
        @foreach($publications as $publication)
            <x-publication :publication="$publication"/>
        @endforeach
    </div>
</x-master>
