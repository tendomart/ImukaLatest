@extends('blogs.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel 6.0 CRUD Example</h2>
</div>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blog</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Blog Title</th>
<th>Blog Content</th>
<th width="280px">Action</th>
</tr>
@foreach ($blogs as $blog)
<tr>
<td>{{ $blog->blog_title }}</td>
<td>{{ $blog->blog_content }}</td>
<td>
<form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection