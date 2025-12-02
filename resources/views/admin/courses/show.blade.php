@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Course Details</h3>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $course->id }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td><img src="{{ $course->logo }}" alt="Logo" width="100"></td>
                        </tr>
                        <tr>
                            <th>Images</th>
                            <td><img src="{{ $course->images }}" alt="Image" width="100"></td>
                        </tr>
                        <tr>
                            <th>University Name</th>
                            <td>{{ $course->university_name }}</td>
                        </tr>
                        <tr>
                            <th>Offer Card 1</th>
                            <td>{{ $course->offer_card_1 }}</td>
                        </tr>
                        <tr>
                            <th>Offer Card 2</th>
                            <td>{{ $course->offer_card_2 }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $course->city }}</td>
                        </tr>
                        <tr>
                            <th>QS Ranking</th>
                            <td>{{ $course->qs_ranking }}</td>
                        </tr>
                        <tr>
                            <th>Course Name</th>
                            <td>{{ $course->course_name }}</td>
                        </tr>
                        <tr>
                            <th>Progress To</th>
                            <td>{{ $course->progress_to }}</td>
                        </tr>
                        <tr>
                            <th>Student Level</th>
                            <td>{{ $course->student_level }}</td>
                        </tr>
                        <tr>
                            <th>Next Intake</th>
                            <td>{{ $course->next_intake }}</td>
                        </tr>
                        <tr>
                            <th>Entry Score</th>
                            <td>{{ $course->entry_score }}</td>
                        </tr>
                        <tr>
                            <th>Tuition Fees</th>
                            <td>{{ $course->tuition_fees }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection