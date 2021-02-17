@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <div class="card-header py-3">
        <h4 class="font-weight-bold text-primary">Edit Post Category</h4>
        <ul class="breadcrumbs">
            <li><a href="{{route('admin')}}" style="color:#999">Dashboard</a></li>
            <li><a href="" class="active text-primary">Update Post Category</a></li>
        </ul>
      </div>
    <div class="card-body">
      <form method="post" action="{{route('post-category.update',$postCategory->id)}}" class="col-md-4 col-sm-12">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$postCategory->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{(($postCategory->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($postCategory->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-primary col-12" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection
