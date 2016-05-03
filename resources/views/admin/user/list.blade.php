@extends('admin.master')
@section('action','User List')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 1?>
        @foreach($data as $item)
        <tr class="odd gradeX" align="center">
            <td>{!! $stt ++ !!}</td>
            <td>{!! $item['username'] !!}</td>
            <td>{!! $item['email'] !!}</td>
            <td class="center"><i class="fa fa-trash  fa-fw"></i><a onclick="return confirmDelete('Do you want delete this user?')" href="{!! URL::route('admin.user.getDelete',$item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@endsection

