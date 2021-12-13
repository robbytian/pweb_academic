@extends("layouts.app")

@section("content")
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Mata Kuliah</td>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($courses as $course)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$course->course_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop