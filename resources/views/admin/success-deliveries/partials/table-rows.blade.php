@foreach($successDeliveries as $successDelivery)
<tr>
    <td>{{ $successDelivery->id }}</td>
    <td>{{ $successDelivery->name }}</td>
    <td>
        @if($successDelivery->image)
            <img src="{{ asset('storage/' . $successDelivery->image) }}" alt="{{ $successDelivery->name }}" width="50" height="30" style="object-fit: cover;">
        @else
            -
        @endif
    </td>
    <td>
        @if($successDelivery->youtube_link)
            <a href="{{ $successDelivery->youtube_link }}" target="_blank">View Video</a>
        @else
            No Link
        @endif
    </td>
    <td>
        <a href="{{ route('admin.success-deliveries.show', $successDelivery) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.success-deliveries.edit', $successDelivery) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.success-deliveries.destroy', $successDelivery) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach