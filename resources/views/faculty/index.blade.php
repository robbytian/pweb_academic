@extends("layouts.app")

@section("content")
<h3>Data Fakultas</h3>
<a href="/faculty/create" class="btn btn-success">Tambah Fakultas</a>
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
                <td>Nama</td>
                <td>Daftar Mahasiswa</td>
                <td colspan=2></td>
            </tr>
        </thead>
        <tbody>
            @foreach($facultys as $faculty)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$faculty->name}}</td>
                <td><a href="/faculty/{{$faculty->id}}">{{count($faculty->students)}} Mahasiswa</a></td>
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
        </tbody>
    </table>
@stop