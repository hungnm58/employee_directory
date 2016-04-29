@extends('admin.master')
@section('action','Employees List In Department')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Name</th>
            <th>Image</th>
            <th>Job title</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0; ?>
        @foreach($data as $item )
            <?php $stt++ ;?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $data['name'] !!}</td>
                <td>{!! $data['job_title'] !!}</td>
                <td>{!! $data['image'] !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@endsection