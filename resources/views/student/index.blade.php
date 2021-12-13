@extends("layouts.app")

@section("content")
<h3>Data Mahasiswa</h3>
<a href="/student/create" class="btn btn-success">Tambah Mahasiswa</a>
<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
</div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <td>No</td>
                <td>NRP</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Tanggal Lahir</td>
                <td>Tempat Lahir</td>
                <td colspan=2></td>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->code}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->gender == "P" ? "Pria" : "Wanita"}}</td>
                <td>{{$student->birth_date}}</td>
                <td>{{$student->birth_place}}</td>
                <td>
                    <a href="/student/{{$student->id}}/edit/" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="/student/{{$student->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop