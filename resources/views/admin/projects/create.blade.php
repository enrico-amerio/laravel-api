@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Aggiungi Progetto</h1>

    <div class="row pt-5">
        <div class="col-10">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach

                </div>
            @endif
            <form action="{{ route('admin.projects.store')}} " method="POST">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{old('title')}}">
                  @error('title')
                  <small class="text-danger ">
                      {{ $message }}
                    </small>
                    @enderror
                </div>
                <label for="type_id">Type</label>
                <select name="type_id" class="form-select" aria-label="Default select example">
                    <option >Select a Type</option>
                    @foreach ($types as $type )
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <div class="btn-group mt-2" role="group" aria-label="Basic checkbox toggle button group">

                    @foreach ($technologies as $technologie)

                    <input type="checkbox" class="btn-check" id="{{ $technologie->id }}" autocomplete="off" value="{{ $technologie->id }}" name="technologies[]" @if (in_array($technologie->id, old('technologies', [])))
                     checked
                    @endif>
                    <label class="btn btn-outline-primary" for="{{ $technologie->id }}">{{ $technologie->name }}</label>
                    @endforeach

                  </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter description">{{old('description')}}</textarea>
                    @error('description')
                  <small class="text-danger ">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
