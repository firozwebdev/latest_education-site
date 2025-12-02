@forelse($appointments as $appointment)
    <tr>
        <td>{{ $appointment->id }}</td>
        <td>{{ $appointment->first_name }} {{ $appointment->last_name }}</td>
        <td>{{ $appointment->email }}</td>
        <td>{{ $appointment->phone }}</td>
        <td>{{ $appointment->country }}</td>
        <td>{{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') : 'N/A' }}</td>
        <td>{{ $appointment->appointment_time ? \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') : 'N/A' }}</td>
        <td>{{ $appointment->created_at->format('d M Y, H:i') }}</td>
        <td>
            <a href="{{ route('admin.appointments.show', $appointment) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i> View
            </a>
            <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center">No appointment information found.</td>
    </tr>
@endforelse