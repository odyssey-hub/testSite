$(function() {
    var dialog, form;

    function addItem(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var header = $("#header");
        var content  = $("#content");

        var title = header.val();

        var text = content.val();

        $.ajax({
            url: '/solutions/add',
            type: "POST",
            data: {
                header:title,
                content:text
            },
            success: function (data) {
                var html_text = " <div class=\"card mt-2\" data-id=\""+data+"\">\n" +
                    "                <h5 class=\"card-header w-100\">Решение №"+data+"</h5>\n" +
                    "                <div class=\"card-body\">\n" +
                    "                    <h5 class=\"card-title\">"+title+"</h5>\n" +
                    "                    <p class=\"card-text\">"+text+"</p>\n" +
                    "                    <button type=\"button\" class=\"btn btn-primary btnEdit\" data-id=\""+data+"\"\n" +
                    "                            data-header=\""+title+"\" data-content=\""+text+"\">Редактировать</button>\n" +
                    "                    <button type=\"button\" class=\"btn btn-danger btnDelete\" data-id=\""+data+"\">Удалить</button>\n" +
                    "                </div>\n" +
                    "            </div>";

                $("#solutions").append(html_text);
                $('.btnEdit').on('click', EventEdit);
                $('.btnDelete').on('click', EventDelete);
                dialog.dialog("close");
            },
            error: function (msg) {
                alert('Ошибка:'+title+" "+text);
            }
        });
    }

    function editItem(){
        var el = dialogEdit.data('el');
        var id = el.dataset.id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var new_header = $("#edit-header")[0].value;
        var new_content = $("#edit-content")[0].value;

        $.ajax({
            url: '/solutions/edit',
            type: "POST",
            data: {
                id:id,
                header:new_header,
                content: new_content
            },
            success: function (data) {
                var btn = $("button[data-id="+id+"]");
                var sibling_header = btn.siblings(".card-title")[0];
                var sibling_text = btn.siblings(".card-text")[0];
                sibling_header.textContent = new_header;
                sibling_text.textContent = new_content;

                dialogEdit.dialog("close");
            },
            error: function (msg) {
                alert('Ошибка:');
            }
        });
    }


    function deleteItem(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/solutions/delete',
            type: "POST",
            data: {
                id:id
            },
            success: function (data) {
                var card = $(".card[data-id="+id+"]")[0];
                card.remove();
            },
            error: function (msg) {
                alert('Ошибка:');
            }
        });
    }

    dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "Добавить": addItem,
            "Отмена": function() {
                dialog.dialog( "close" );
            }
        }
    });

    var dialogEdit = $( "#dialog-form2" ).dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "ОК": editItem,
            "Отмена": function() {
                dialogEdit.dialog( "close" );
            }
        }
    });

    $('#addItem').on('click',function(){
        dialog.dialog( "open" );
    });

    function EventEdit(){
        var header = $(this)[0].dataset.header;
        var content = $(this)[0].dataset.content;
        $("#edit-header")[0].value =  header;
        $("#edit-content")[0].value = content;
        dialogEdit.data('el', $(this)[0]).dialog( "open" );
    }

    function EventDelete(){
        var id = $(this)[0].dataset.id;
        deleteItem(id);
    }

    $('.btnEdit').on('click', EventEdit);

    $('.btnDelete').on('click', EventDelete);

});
