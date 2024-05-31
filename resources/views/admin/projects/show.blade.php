@extends('layouts.admin')

@section('content')
<div class="container text-center mt-5">
    <h1>{{ $project->title }}</h1>
    <span class="badge text-bg-success">{{$project->type?->name}}</span>
    @forelse ($project->technologies as $technologie)
            <span class="badge text-bg-primary"> {{$technologie->name}}</span>
    @empty
        ---
    @endforelse
    <p class="mt-5">{{ $project->description}}</p>
    <div class="d-flex justify-content-center mt-5">
        <a class="btn btn-primary me-1" href="{{route('admin.projects.edit', $project->id)}}">Modifica</a>
        <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit"class="btn btn-danger" >Cancella</button>
          </form>
    </div>
</div>
@endsection
