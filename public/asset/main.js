$(function () {
    $(".datepicker").datepicker();

    $(".saveEmployee").click(function () {
        var name = $('input[name=emp_name]').val();
        var gender = $('select[name=gender]').val();
        var dob = $('input[name=dob]').val();
        var address = $('input[name=address]').val();
        var mobile = $('input[name=mob]').val();
        var email = $('input[name=email]').val();
        var departmentId = $('select[name=department]').val();
        var desigantionId = $('select[name=designation]').val();
        var doj = $('input[name=doj]').val();
        var image = $('input[name=image]').val();


        $.ajax({
            type: 'post',
            url: $('#newModal').attr('save-action'),
            data: {
                '_token': $('#newModal').attr('token'),
                'name': name,
                "gender": gender,
                "dob": dob,
                "address": address,
                "mobile": mobile,
                "email": email,
                "departmentId": departmentId,
                "designationId": desigantionId,
                "doj": doj,
                "image": image,
            },
            success: function (response) {
                if (response.status == 200) {
                    renderTable(response.data);
                    $('#newModal').modal('hide');
                }
            }
        });

    });

    $('select[name=department]').change(function () {
        var departmentId = $(this).val();
        if (departmentId != "") {
            $.ajax({
                type: 'post',
                url: $('#newModal').attr('fetch-designation'),
                data: {
                    '_token': $('#newModal').attr('token'),

                    "departmentId": departmentId,

                },
                dataType: 'JSON',
                success: function (response) {
                    var optionHtml = '';
                    for (let i = 0; i < response.data.length; i++) {
                        const element = response.data[i];
                        optionHtml += `<option value='` + element.id + `'>` + element.name + `<option>`;
                    }
                    // console.log(optionHtml)
                    $("select[name=designation]").html(optionHtml);
                }
            });

        }
    });

    $(".deleteRow").click(function () {
        var action = $(".card-body").attr('delete-action');
        $.ajax({
            type: 'post',
            url: action,
            data: {
                '_token': $('#newModal').attr('token'),

                "id": $(this).attr('each-id'),

            },
            success: function (response) {
                renderTable(response.data);
            }
        });
    });
    function renderTable(rows) {
        var tableRows = ``;
        var action = $(".card-body").attr('delete-action');
        for (let i = 0; i < rows.length; i++) {
            var element = rows[i];
            tableRows += ` <tr>
                    <td>`+ i + `</td>
                    <td>`+ element.name + `</td>
                    <td>`+ element.mobile + `</td>
                    <td>`+ element.email + `</td>
                    <td>`+ element.designation.name + `</td>
                    <td>`+ element.designation.department.name + `</td>
                    <td>
                            <button delete-action="`+ action + `" class="btn btn-danger deleteRow"
                            each-id="`+ element.id + `">delete</button></td>
                    </tr>`;
        }
        $('.renderTr').html(tableRows);
    }

});

