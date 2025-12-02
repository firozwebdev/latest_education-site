@foreach($branches as $branch)
<tr>
    <td>{{ $branch->id }}</td>
    <td>{{ $branch->branch_name }}</td>
    <td>{{ $branch->branch_location }}</td>
    <td>
        <a href="{{ route('admin.branches.show', $branch) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach