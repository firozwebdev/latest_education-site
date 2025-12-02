@forelse($contacts as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
        <td>
            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i> View
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No contact information found.</td>
    </tr>
@endforelse