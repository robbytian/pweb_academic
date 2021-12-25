@extends("layouts.app")

@section("content")
<h3>Lihat Data Mahasiswa Pada Prodi #{{$faculty->name}}</h3>
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
                <td colspan=2></td>
            </tr>
        </thead>
        <tbody>
            @if($faculty->students)
            @foreach($faculty->students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->code}}</td>
                <td>{{$student->name}}</td>
                <td>
                    <a href="/faculty/{{$faculty->id}}/edit/" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="/faculty/{{$faculty->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
@stop