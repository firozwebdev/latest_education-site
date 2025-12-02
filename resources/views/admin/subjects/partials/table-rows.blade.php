@foreach($subjects as $subject)
    <tr>
        <td>{{ $subject->id }}</td>
        <td>{{ $subject->name }}</td>
        <td>
            @if($subject->image)
                <img src="{{ asset($subject->image) }}" alt="{{ $subject->name }}" width="50" height="30" style="object-fit: cover;">
            @else
                -
            @endif
        </td>
        <td>{!! $subject->description !!}</td>
        <td>
            <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach