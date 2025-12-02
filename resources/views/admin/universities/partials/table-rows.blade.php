@foreach($universities as $university)
    <tr>
        <td>{{ $university->id }}</td>
        <td>{{ $university->university_name }}</td>
        <td>
            @if($university->logo)
                <img src="{{ asset($university->logo) }}" alt="{{ $university->university_name }}" width="50" height="30" style="object-fit: cover;">
            @else
                -
            @endif
        </td>
        <td>{{ $university->country ? $university->country->name . ' (' . ($university->country->currency_symbol ?? $university->country->currency ?? 'No currency') . ')' : '' }}</td>
        <td>
            <a href="{{ route('admin.universities.show', $university) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ route('admin.universities.edit', $university) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.universities.destroy', $university) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach