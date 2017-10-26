var base = {

    init: function () {
        var data = {action: 'list'};
        $.ajax({url : 'company.php', data : data, type : 'post'})
            .done(function (response) {
                var companies = JSON.parse(response);
                var max = companies[0].value;
                companies = companies.map(function (item, index, array) {
                    item.percent = Math.round(100*((item.value*100)/max))/100.0;
                    return item;
                });
                var row = '';
                var bar = '';
                var margin_top = 0;
                for(i = 0; i < companies.length; i++){
                    margin_top = 300-((companies[i].value*300)/max);
                    bar += '<div class="graphic_bar" style="background-color: '+companies[i].color+'; height: '+(companies[i].value*300)/max+'px; margin-top: '+margin_top+'px;"></div>';

                    row += '<div class="table_row">' +
                                '<div class="company_bar" style="background-color: '+companies[i].color+'">' +
                                    '<span class="text_percent">'+companies[i].percent+'%</span>' +
                                '</div>' +
                                '<span class="company_text">'+companies[i].name+ ' Valor: '+companies[i].value+'</span>' +
                                '<a style="float: right" onclick="base.del('+companies[i].id+')">Eliminar</a>' +
                                '<div style="clear: left"></div>' +
                            '</div>';
                }
                bar += '<div style="clear: left"></div>';
                $(".graphics").html(bar);
                $(".right").html('Total de empresas: '+companies.length+'');
                $("#table").html(row);
            })
        return false;
    },

    new: function () {
        $("#company").submit(function () {
            var data = $(this).serialize();
            $.ajax({url : 'company.php', data : data, type : 'post'})
                .done(function (response) {
                    base.init();
                    $("#name").val('');
                    $("#value").val('');
                    $("#color").val('#000000');
                })
            return false;
        })
    },

    del: function (id) {
        var data = {action: 'del', id:id};
        $.ajax({url : 'company.php', data : data, type : 'post'})
            .always(function (response) {
                base.init();
            });
    }
}