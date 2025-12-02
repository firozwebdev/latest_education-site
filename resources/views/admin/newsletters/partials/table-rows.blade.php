@forelse($newsletters as $newsletter)
    <tr>
        <td>{{ $newsletter->id }}</td>
        <td>{{ $newsletter->email }}</td>
        <td>{{ $newsletter->created_at->format('d M Y, H:i') }}</td>
        <td>
            <a href="{{ route('admin.newsletters.show', $newsletter) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i> View
            </a>
            <form action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this newsletter subscription?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">No newsletter subscriptions found.</td>
    </tr>
@endforelse