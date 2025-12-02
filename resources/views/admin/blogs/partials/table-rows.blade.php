@foreach($blogs as $blog)
<tr>
    <td>{{ $blog->id }}</td>
    <td>
        <strong>{{ $blog->title }}</strong><br>
        <small class="text-muted">{{ Str::limit($blog->excerpt, 50) }}</small>
    </td>
    <td>{{ $blog->author_name ?? 'Anonymous' }}</td>
    <td>{{ $blog->category ?? 'Uncategorized' }}</td>
    <td>
        @if($blog->is_published)
            <span class="badge badge-success">Published</span>
        @else
            <span class="badge badge-warning">Draft</span>
        @endif
    </td>
    <td>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Not set' }}</td>
    <td>
        <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach