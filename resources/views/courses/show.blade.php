@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blog Details</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary btn-sm">Back to Blogs</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $blog->title }}</h2>

                            @if($blog->featured_image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image" class="img-fluid rounded">
                                </div>
                            @endif

                            @if($blog->excerpt)
                                <div class="alert alert-info">
                                    <strong>Excerpt:</strong> {{ $blog->excerpt }}
                                </div>
                            @endif

                            <div class="blog-content">
                                {!! $blog->content !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Blog Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>Author:</th>
                                            <td>{{ $blog->author_name ?? 'Anonymous' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category:</th>
                                            <td>{{ $blog->category ?? 'Uncategorized' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>
                                                @if($blog->is_published)
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-warning">Draft</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Published At:</th>
                                            <td>{{ $blog->published_at ? $blog->published_at->format('M d, Y H:i') : 'Not set' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Read Time:</th>
                                            <td>{{ $blog->read_time }} minutes</td>
                                        </tr>
                                        <tr>
                                            <th>Views:</th>
                                            <td>{{ number_format($blog->views_count) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created:</th>
                                            <td>{{ $blog->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated:</th>
                                            <td>{{ $blog->updated_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    </table>

                                    @if($blog->tags && is_array($blog->tags))
                                        <div class="mt-3">
                                            <strong>Tags:</strong><br>
                                            @foreach($blog->tags as $tag)
                                                <span class="badge badge-primary mr-1">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection