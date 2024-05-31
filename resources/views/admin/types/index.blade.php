@extends('layouts.admin')
@section('content')
<div class="container">
    <h1 class="text-center p-4">Types</h1>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <div class="d-flex my-4">
        <form class="d-flex" action="{{route('admin.types.store')}}" method="POST" >
            @csrf
            <input type="text" class="form-control me-2" placeholder="New Type" name="name">
            <button class="btn btn-outline-primary" type="submit">Add</button>
        </form>
    </div>
    <table class="table  crud-table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($types as $type )
            <tr>
              <td>{{$type->id}}</td>
              <td class="w-100">
                <form action="{{route('admin.types.update', $type)}}" id="form-edit-{{$type->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text"  value="{{$type->name}}" name="name">
                </form>
              </td>
              <td>
                  <div class="d-flex">
                      <button class="btn btn-primary me-1" onclick="submitForm({{$type->id}})">modifica</button>
                      <form action="{{route('admin.types.destroy', $type)}}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit"class="btn btn-danger">cancella</button>
                        </form>
                  </div>
              </td>
            @endforeach
        </tbody>
      </table>
</div>
<script>
    function submitForm(id){
        const form = document.getElementById(`form-edit-${id}`);
        form.submit();

    }
</script>
@endsection
