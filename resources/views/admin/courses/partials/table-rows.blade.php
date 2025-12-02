@foreach($courses as $course)
<tr>
    <td>{{ $course->id }}</td>
    <td>{{ $course->course_name }}</td>
    <td>{{ $course->university ? $course->university->university_name : '' }}</td>
    <td>{{ $course->city }}</td>
    <td>{{ $course->qs_ranking }}</td>
    <td>
        <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach