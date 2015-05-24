
$(document).ready(function()
{

    Calendar.setup({
        inputField: "purchase_date",
        trigger: "purchase_date",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%d-%m-%Y"
    });

    $(document).on("keyup", ".numeric", function(event)
    {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

});


