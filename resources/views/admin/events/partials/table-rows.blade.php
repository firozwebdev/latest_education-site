@foreach($events as $event)
<tr>
    <td>{{ $event->id }}</td>
    <td>{{ $event->event_name }}</td>
    <td>
        @if($event->logo)
            <img src="{{ asset($event->logo) }}" alt="{{ $event->event_name }}" width="50" height="30" style="object-fit: cover;">
        @else
            -
        @endif
    </td>
    <td>{{ $event->date }}</td>
    <td>
        <a href="{{ route('admin.events.show', $event) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach