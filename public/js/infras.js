function showDialog(title, width, height) {

    var formDiv = $('<div/>');
    window.newFormDialog = formDiv.dialog({
        width: width,
        height: height,
        title: title,
        close: function() {
            removeDialog(this);
        },
        open: function() {
            var closeBtn = $('.ui-dialog-titlebar-close');
            closeBtn.html(
                '<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>'
            );
        },
        dialogClass: 'dlgfixed'
    });

    return formDiv;
}

function removeDialog(thisObj) {
    // $(thisObj).find('input').each(function() {
    //     $(this).trigger('removeErrorMessage');
    // });

    $(thisObj).dialog('destroy').remove();
}


function closeDialog(thisObj) {
    $(thisObj).closest('.ui-dialog-content').dialog('close');
}