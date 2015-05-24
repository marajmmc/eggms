
$(document).ready(function()
{
    $(document).on("change", "#department_id", function (event)
    {
        $("#semester_id").html('');
        var options = '<option value="">' + select_opt + '</option>';
        $("#semester_id").html(options);
        if($("#department_id").val()!="")
        {
            $.ajax({
                url: base_url + 'ajax/get_semester_info',
                type: 'POST',
                dataType: "JSON",
                data:{department_id:$("#department_id").val()},

                success: function (data, status) {
                    console.log(data);

                    for (var i = 0; i < data.length; i++)
                    {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['semester_name'] + '</option>';
                    }
                    $("#semester_id").html(options);
                },
                error: function (xhr, desc, err) {

                }
            });
        }
        else
        {
            $("#semester_id").html(options);
        }

    });

    //////////////////////////////////////// Table Row add delete function ///////////////////////////////
    $(document).on("click", "#subject_addmore", function(event)
    {

//        var ExId = 0;
        var table = document.getElementById('TaskTable');

        var rowCount = table.rows.length;
//        alert(rowCount);
        var row = table.insertRow(rowCount);
        var ExId=rowCount;
        row.id = "T" + ExId;
        row.className = "tableHover";

        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<input type='text' name='subject_name[]' id='subject_name" + ExId + "' class='form-control'/>" +
            "<input type='hidden' id='row_subject_id[]' name='row_subject_id[]' value=''/>";
        cell1 = row.insertCell(1);
        cell1.innerHTML = "<select name='status[]' id='status" + ExId + "' class='form-control' >" +
            "<option value=''>"+opt_select+"</option><option value='1'>"+opt_active+"</option><option value='2'>"+opt_inactive+"</option></select>";
        cell1.style.cursor = "default";
        cell1 = row.insertCell(2);
        cell1.innerHTML = "<a href='#'><img src='"+base_url+"images/delete.png' alt='Delete' title='Delete' onclick=\"RowDecrement('TaskTable','T" + ExId + "')\" /></a>";
        cell1.style.cursor = "default";
        document.getElementById("subject_name" + ExId).focus();

        ExId = ExId + 1;

//        $("#TaskTable").tableDnD();

    });
    //////////////////////////////////////// Table Row add delete function ///////////////////////////////

});

function RowDecrement(tableID,id)
{
    try {
        var table = document.getElementById(tableID);
        for(var i=1;i<table.rows.length;i++)
        {

            if(table.rows[i].id==id)
            {

                table.deleteRow(i);
                //                showAlert('SA-00106');
            }
        }
    }
    catch(e) {
        alert(e);
    }
}