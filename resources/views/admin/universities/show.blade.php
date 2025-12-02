@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">University Details</h3>
                    <a href="{{ route('admin.universities.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Country</th>
                            <td>{{ $university->country->name ?? '' }} ({{ $university->country->currency_symbol ?? $university->country->currency ?? 'No currency' }})</td>
                        </tr>
                        <tr>
                            <th>University Name</th>
                            <td>{{ $university->university_name }}</td>
                        </tr>
                        <tr>
                            <th>Student Level</th>
                            <td>{{ $university->student_level }}</td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>{{ $university->duration }}</td>
                        </tr>
                        <tr>
                            <th>Next Intake</th>
                            <td>{{ $university->next_intake }}</td>
                        </tr>
                        <tr>
                            <th>Tuition Fees</th>
                            <td>{{ $university->tuition_fees }}</td>
                        </tr>
                        <tr>
                            <th>Scholarship</th>
                            <td>{{ $university->scholarship }}</td>
                        </tr>
                        <tr>
                            <th>IELTS Score</th>
                            <td>{{ $university->ielts_score }}</td>
                        </tr>
                        <tr>
                            <th>Website URL</th>
                            <td><a href="{{ $university->website_url }}" target="_blank">{{ $university->website_url }}</a></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $university->description !!}</td>
                        </tr>
                        <tr>
                            <th>Global Rank</th>
                            <td>{{ $university->global_rank }}</td>
                        </tr>
                        <tr>
                            <th>In Country Rank</th>
                            <td>{{ $university->in_country_rank }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $university->location }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td><img src="{{ $university->logo }}" alt="Logo" width="100"></td>
                        </tr>
                        <tr>
                            <th>Images</th>
                            <td>{{ $university->images }}</td>
                        </tr>
                        <tr>
                            <th>University Wise Course</th>
                            <td>{!! $university->university_wise_course !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection