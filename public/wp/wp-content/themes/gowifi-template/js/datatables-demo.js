jQuery(document).ready(function ($) {
    // Call the dataTables jQuery plugin
    var genericAjax = function (url, data, type, callBack) {
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType : 'json',
        })
        .done(function( json ) {
            console.log('ajax done');
            console.log(json);
            callBack(json);
        })
        .fail(function( xhr, status, errorThrown ) {
            console.log('ajax fail');
        })
        .always(function( xhr, status ) {
            console.log('ajax always');
        });
    };
    
    function getBody(response, trType) {
        var data = response.data.data;
        console.log(response.data);
        var content = '';
        for (var i = 0; i < data.length; i++) {
            content += trType(data[i], i);
        }
        return content;
    }
    
    var request = function (url, table, trGenerator) {
        genericAjax(url, null , 'get', function(param1){
            $(table).append(getBody(param1, trGenerator)).ready($(table).DataTable({
              "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ]
            }));
        });
    }

    var getTrTechnicians = function(row, num) {
        var content = '';
        content += `<td>${num + 1}</td>`;
        content += `<td>${row.name}</td>`;
        content += `<td>${row.email}</td>`;
        if(row.email_verified_at === null) {
            content += `<td><i class="fas fa-times fa-2x text-warning"></i></td>`;
        } else {
            content += `<td><i class="fas fa-check fa-2x text-success"></i></td>`;
        }
        content += `<td><a href="../../technical/${row.id}/edit" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a></td>`;
        content += `<td><a href="../" class="btn btn-danger destroy" data-toggle="modal" data-target="#exampleModal" data-id="${row.id}"><i class="fas fa-trash-alt"></i> Delete</a></td>`;
        return `<tr>${content}</tr>`;
    }
    
    if(document.getElementById('dataTableTechnicians') != null) {
        request('../../technical', '#dataTableTechnicians', getTrTechnicians);
    }
    
    var getTrAccessPoints = function(row, num) {
        var content = '';
        content += `<td>${num + 1}</td>`;
        content += `<td>${row.id_technical}</td>`;
        content += `<td>${row.model}</td>`;
        content += `<td>${row.location}</td>`;
        // content += `<td>${row.latitude}</td>`;
        // content += `<td>${row.longitude}</td>`;
        content += `<td><a href="../../accesspoint/${row.id}" class="btn btn-info"><i class="fas fa-eye"></i> View</a></td>`;
        content += `<td><a href="../../accesspoint/${row.id}/edit" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a></td>`;
        content += `<td><a href="../" class="btn btn-danger destroy" data-toggle="modal" data-target="#exampleModal" data-id="${row.id}"><i class="fas fa-trash-alt"></i> Delete</a></td>`;
        return `<tr>${content}</tr>`;
    }
    
    if(document.getElementById('dataTableAccessPoints') != null) {
        request('../../accesspoint', '#dataTableAccessPoints', getTrAccessPoints);
    }
    
    var getTrDisabledAccessPoints = function(row, num) {
        var content = '';
        content += `<td>${num + 1}</td>`;
        content += `<td>${row.id_technical}</td>`;
        content += `<td>${row.model}</td>`;
        content += `<td>${row.location}</td>`;
        content += `<td><a href="../../disabledaccesspoints/${row.id}/restore" class="btn btn-success"><i class="far fa-edit"></i>Enable</a></td>`
        // content += `<td>${row.latitude}</td>`;
        // content += `<td>${row.longitude}</td>`;
        return `<tr>${content}</tr>`;
    }
    
    if(document.getElementById('dataTableDisabledAccessPoints') != null) {
        request('../../disabledaccesspoints', '#dataTableDisabledAccessPoints', getTrDisabledAccessPoints);
    }
    
    var form = document.getElementById('formBorrar');

    if(form !== null) {
        setTimeout(function(){
            let link = document.querySelectorAll('.destroy');
            for(var i = link.length -1; i >=0 ; i-- ){
                link[i].addEventListener('click', function(event){ 
                    var id = event.target.dataset.id;
                    form.action = destino + id;
                });
       
            }
        }, 500);
        
        var destino = form.action;
    }
    
    var getTrUserAccessPoints = function(row, num) {
        var content = '';
        content += `<td>${num + 1}</td>`;
        content += `<td>${row.location}</td>`;
        content += `<td>${row.latitude}</td>`;
        content += `<td>${row.longitude}</td>`;
        content += `<td>
                        <form method="POST" action="../../connectionuser">
                            <input type="hidden" name="id_access_point" value="${row.id}">
                            <input type="hidden" name="api_token" value="${document.getElementById('apiToken').textContent}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-power-off"></i>
                                Connect
                                </i>
                            </button>
                        </form>
                    </td>`;
        return `<tr>${content}</tr>`;
    }
    
    if(document.getElementById('dataTableUserAccessPoints') != null) {
        request('../../accesspoint', '#dataTableUserAccessPoints', getTrUserAccessPoints);
    }
    
    var getTrActiveHours = function(row, num) {
        var content = '';
        content += `<td>${num + 1}</td>`;
        content += `<td>${row.start_date}</td>`;
        content += `<td>${row.end_date}</td>`;
        content += `<td>${row.start_hour}</td>`;
        content += `<td>${row.end_hour}</td>`;
        content += `<td>${row.minium_period}</td>`;
        content += `<td>
                        <form method="POST" action="../../delactivehour/${row.id}">
                            <input type="hidden" name="api_token" value="${document.getElementById('apiToken').textContent}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                Delete
                            </button>
                        </form>
                    </td>`;
        return `<tr>${content}</tr>`;
    }
    
    if(document.getElementById('dataTableActiveHours') != null) {
        request('../../activehour', '#dataTableActiveHours', getTrActiveHours);
    }
    
});
