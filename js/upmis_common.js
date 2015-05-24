$(document).ready(function()
{
//    notification_open()
    $(document).on("click", ".txtallselect", function(event) {
        $(this).one('mouseup', function(event){
            event.preventDefault();
        }).select();
    });

//    notification_open()
    $(document).on("click", ".alert .close", function(event) {
        $("#message_container").slideUp();
    });

    $(document).on("submit", ".report_form", function(event) {
        window.open('','form_popup','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=1300,height=500,left = 10,top = 10,scrollbars=yes');
        this.target = 'form_popup';
    });
    setTimeout(function()
    {
        $("#message_container").slideUp();
    }, 3000);

});

function notification_open(msgbody, title)
{
    $("#notification_div").html('');
    $("#notification_div").append("<div class='notification_title'>" +
        "<img src='"+base_url+"images/favicon-logo.png' />" +
        "T.M. Software :: " + title +
        "</div><h5 id='notification_body'>" + msgbody +
        "</h5>");
    $("#notification_div").slideDown();
    setTimeout(function()
    {
        notification_close();
    }, 5000);
}
function notification_close()
{
    $("#notification_div").slideUp();
}

function ben_to_en_number_conversion(ben_number) {
    var eng_number = '';
    for (var i = 0; i < ben_number.length; i++) {

        if (ben_number[i] == "০")
            eng_number = eng_number + '0';
        else if (ben_number[i] == "১")
            eng_number = eng_number + '1';
        else if (ben_number[i] == "২")
            eng_number = eng_number + '2';
        else if (ben_number[i] == "৩")
            eng_number = eng_number + '3';
        else if (ben_number[i] == "৪")
            eng_number = eng_number + '4';
        else if (ben_number[i] == "৫")
            eng_number = eng_number + '5';
        else if (ben_number[i] == "৬")
            eng_number = eng_number + '6';
        else if (ben_number[i] == "৭")
            eng_number = eng_number + '7';
        else if (ben_number[i] == "৮")
            eng_number = eng_number + '8';
        else if (ben_number[i] == "৯")
            eng_number = eng_number + '9';
        else
            eng_number = eng_number + ben_number[i];
    }

    return eng_number;
}
function display_image(brose_bttion,display_id)
{

    if (brose_bttion.files && brose_bttion.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e)
        {
            $(display_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(brose_bttion.files[0]);
    }
}