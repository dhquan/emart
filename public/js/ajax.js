$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Get data on modal show
    $('#show-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('myname');
        var email = button.data('email');
        var phone = button.data('phone');
        var address = button.data('address');
        var role = button.data('role');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #full-name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #role').val(role);

    });

    // Create user with ajax
    $("#create-modal #create-user").click(function () {
        $.ajax({
            method: "POST",
            url: 'http://localhost/users',
            data: {
                name: $('#create-modal input#full-name').val(),
                email: $('#create-modal input#email').val(),
                phone: $('#create-modal input#phone').val(),
                address: $('#create-modal input#address').val(),
                role: $('#create-modal input#role').val()

            },
            success: function (data) {
                $('#table').append("<tr id='row_" + data.id + "'>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.name + "</td>" +
                    "<td>" + data.email + "</td>" +
                    "<td>" + data.phone + "</td>" +
                    "<td>" + data.address + "</td>" +
                    "<td>" + data.role + "</td>" +
                    "<td><button type='button' class='btn btn-info' data-id='" + data.id + "' data-myname='" + data.fullname
                    + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address
                    + "' data-role='" + data.role + "'>"
                    + "Show</button> " +
                    "<button type='button' id='edit-item' class='btn btn-primary' data-toggle='modal' data-target='edit-modal' " +
                    "data-id='" + data.id + "' data-myname='" + data.fullname + "' data-email='" + data.email + "' data-phone='" + data.phone
                    + "' data-address='" + data.address + "' data-role='" + data.role + "'>"
                    + "Edit</button> " +
                    "<button class='delete-modal btn btn-danger delete' data-id='" + data.id + "' data-myname='" + data.fullname
                    + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address
                    + "' data-role='" + data.role + "'>"
                    + "Delete</button>" +
                    "</td>" +
                    "</tr>");
                $('#create-modal').modal('hide');
                $('#create-form').trigger('reset');
            },
            error: function (data) {
                for (error in data.responseJSON.errors) {
                    $('#' + error + '-error').html(data.responseJSON.errors[error]);
                }
            }
        })
    });

    // Get data on modal edit
    $('#edit-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('myname');
        var email = button.data('email');
        var phone = button.data('phone');
        var address = button.data('address');
        var role = button.data('role');
        var modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #full-name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #role').val(role);

    });

    // Edit user with ajax
    $("#edit-modal #edit-user").click(function () {
        $.ajax({
            method: "PUT",
            url: 'http://localhost/users/false',
            data: {
                id: $('#edit-modal input#id').val(),
                name: $('#edit-modal input#full-name').val(),
                email: $('#edit-modal input#email').val(),
                phone: $('#edit-modal input#phone').val(),
                address: $('#edit-modal input#address').val(),
                role: $('#edit-modal input#role').val()

            },
            success: function (data) {
                $('#row_' + data.id).replaceWith(" " +
                    "<tr id='row_" + data.id + "'>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.name + "</td>" +
                    "<td>" + data.email + "</td>" +
                    "<td>" + data.phone + "</td>" +
                    "<td>" + data.address + "</td>" +
                    "<td>" + data.role + "</td>" +
                    "<td><button type='button' class='btn btn-info' data-id='" + data.id + "' data-myname='" + data.fullname + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address + "' data-role='" + data.role + "'>"
                    + "Show</button> " +
                    "<button type='button' id='edit-item' class='btn btn-primary' data-toggle='modal' data-target='edit-modal' data-id='" + data.id + "' data-myname='" + data.fullname + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address + "' data-role='" + data.role + "'>"
                    + "Edit</button> " +
                    "<button class='delete-modal btn btn-danger delete' data-id='" + data.id + "' data-myname='" + data.fullname + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address + "' data-role='" + data.role + "'>"
                    + "Delete</button>" +
                    "</td>" +
                    "</tr>");
                $('#edit-modal').modal('hide');
            },
            error: function (data) {
                console.log(data.responseJSON.errors);
                for (error in data.responseJSON.errors) {
                    $('#edit-' + error + '-error').html(data.responseJSON.errors[error]);
                }
            }
        })
    });

    // Delete user with ajax
    $(".delete").click(function () {
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax({
            method: "DELETE",
            url: 'http://localhost/users/false',
            data: {
                "id": id,
                "_token": token
            },
            success: function () {
                $('#row_' + id).remove();
            }
        })
    })
})