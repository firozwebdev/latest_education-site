@foreach($countries as $country)
    <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->name }}</td>
        <td>{{ $country->code }}</td>
        <td>
            @if($country->image)
                <img src="{{ asset('storage/' . $country->image) }}" alt="{{ $country->name }}" width="50" height="30" style="object-fit: cover;">
            @else
                -
            @endif
        </td>
        <td>{{ $country->currency }}</td>
        <td>{{ $country->currency_symbol ?? '-' }}</td>
        <td>
            <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach