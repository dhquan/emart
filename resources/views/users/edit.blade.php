<div class="modal" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
                        <div class="pull-left">
                            <h2>Edit Product</h2>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('users.update','false')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" id="full-name">
                                <span id="edit-name-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Email:</strong>
                                <input type="text" name="email" id="email" value="{{ $user->email }}"
                                       class="form-control"
                                       placeholder="Email">
                                <span id="edit-email-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Phone:</strong>
                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control"
                                       placeholder="Phone">
                                <span id="edit-phone-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Address:</strong>
                                <input type="text" name="address" id="address" value="{{ $user->address }}" class="form-control"
                                       placeholder="Address">
                                <span id="edit-address-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                <strong>Role:</strong>
                                <input type="text" name="role" id="role" value="{{ $user->role }}" class="form-control"
                                       placeholder="Role">
                                <span id="edit-role-error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" id="edit-user" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
