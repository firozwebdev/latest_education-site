@foreach($testimonials as $testimonial)
<tr>
    <td>{{ $testimonial->id }}</td>
    <td>{{ $testimonial->name }}</td>
    <td>
        @if($testimonial->image)
            <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" width="50" height="30" style="object-fit: cover;">
        @else
            -
        @endif
    </td>
    <td>{{ Str::limit($testimonial->review, 50) }}</td>
    <td>
        <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach