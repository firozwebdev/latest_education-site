@forelse($assessments as $assessment)
    <tr>
        <td>{{ $assessment->id }}</td>
        <td>{{ $assessment->first_name }} {{ $assessment->last_name }}</td>
        <td>{{ $assessment->email }}</td>
        <td>{{ $assessment->phone }}</td>
        <td>{{ $assessment->country }}</td>
        <td>{{ $assessment->created_at->format('d M Y, H:i') }}</td>
        <td>
            <a href="{{ route('admin.assessments.show', $assessment) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i> View
            </a>
            <form action="{{ route('admin.assessments.destroy', $assessment) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this assessment?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">No assessment information found.</td>
    </tr>
@endforelse