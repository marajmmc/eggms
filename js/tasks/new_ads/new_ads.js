
$(document).ready(function()
{
    $(document).on("change", "#category_id", function (event)
    {
        $("#sub_category_id").html('');
        var options = '<option value="">' + select_opt + '</option>';
        $("#sub_category_id").html(options);
        if($("#category_id").val()!="")
        {
            $.ajax({
                url: base_url + 'ajax/get_sub_category_info',
                type: 'POST',
                dataType: "JSON",
                data:{category_id:$("#category_id").val()},

                success: function (data, status) {
                    console.log(data);

                    for (var i = 0; i < data.length; i++)
                    {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['sub_category_name'] + '</option>';
                    }
                    $("#sub_category_id").html(options);
                },
                error: function (xhr, desc, err) {

                }
            });
        }
        else
        {
            $("#sub_category_id").html(options);
        }

    });

    $(document).on("change", "#sub_category_id", function (event)
    {
        $("#branch_id").html('');
        var options = '<option value="">' + select_opt + '</option>';
        $("#branch_id").html(options);
        if($("#sub_category_id").val()!="")
        {
            $.ajax({
                url: base_url + 'ajax/get_branch_list',
                type: 'POST',
                dataType: "JSON",
                data:{category_id:$("#category_id").val(), sub_category_id:$("#sub_category_id").val()},

                success: function (data, status) {
                    console.log(data);

                    for (var i = 0; i < data.length; i++)
                    {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['company_name'] + '</option>';
                    }
                    $("#branch_id").html(options);
                },
                error: function (xhr, desc, err) {

                }
            });
        }
        else
        {
            $("#branch_id").html(options);
        }

    });

    $(document).on("change", "#division_id", function (event)
    {
        $("#district_id").html('');
        var options = '<option value="">' + select_opt + '</option>';
        $("#district_id").html(options);
        if($("#division_id").val()!="")
        {
            $.ajax({
                url: base_url + 'ajax/get_zilla_list',
                type: 'POST',
                dataType: "JSON",
                data:{division_id:$("#division_id").val()},

                success: function (data, status) {
                    console.log(data);

                    for (var i = 0; i < data.length; i++)
                    {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['zillanameeng'] + '</option>';
                    }
                    $("#district_id").html(options);
                },
                error: function (xhr, desc, err) {

                }
            });
        }
        else
        {
            $("#district_id").html(options);
        }

    });

});
