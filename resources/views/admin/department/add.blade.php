@extends('admin.master')
@section('content')
    <div class="col-lg-7 panel-body" style="padding-bottom:120px">
    <form action="" method="POST">
        <div class="form-group">
            <label>Department Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Department Name" />
        </div>
        <div class="form-group">
            <label>Office Phone</label>
            <input class="form-control" name="txtPhone" placeholder="Please Enter Office Phone" />
        </div>
        <div class="form-group">
            <label>Manager</label>
            <select class="form-control">
                <option value="0">Please Choose Manager</option>
                <option value="">Hùng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection