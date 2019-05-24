<!-- The Modal -->
<div class="modal" id="create-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create user</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('users.store')}}" method="post" id="create-form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Name:</strong>
                                <input type="text" id="full-name" name="name" class="form-control"
                                       placeholder="Name">
                                <span id="name-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('detail')?' has-error':''}}">
                                <strong>Email:</strong>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                <span id="email-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('detail')?' has-error':''}}">
                                <strong>Phone:</strong>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                                <span id="phone-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('detail')?' has-error':''}}">
                                <strong>Address:</strong>
                                <input type="text" id="address" name="address" class="form-control"
                                       placeholder="Address">
                                <span id="address-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('detail')?' has-error':''}}">
                                <strong>Role:</strong>
                                <input type="text" id="role" name="role" class="form-control" placeholder="Role">
                                <span id="role-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" id="create-user" class="btn btn-primary">Add New</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="close-user-create" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>