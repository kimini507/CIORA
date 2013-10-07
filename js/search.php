<script>
    places = ["Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga"];
    //console.log(flightData);
    $(document).ready(function(){
        $("#search_customer_submit").click(function(e){
            if($("#forigin_search").val()!="" && $("#fdestination_search").val()!=""){
            update_flights("customer");
            e.preventDefault();
        }
        });
        $("#search_admin_submit").click(function(e){
            
            update_flights("admin_edit");
            e.preventDefault();
            
        });
        $("#search_radio").click(function(e){
            update_search_div($("#search_radio input[type='radio']:checked").val());
            remove_view();
        });
        $("#book_submit").hide();

    });

    function update_search_div(status){
        if(status == "one_way"){
            $("#search_info").html(
                '<label for = "">Flight Id</label><input type = "text" id = "fid_search" name="via_id" placeholder="Flight Id"/><br/>' +
                '<label for = "">Origin</label><input type = "text" id = "forigin_search" name="via_origin" placeholder="Origin"/><br/>' +
                '<label for = "">Destination</label><input type = "text" id = "fdestination_search" name="via_destination" placeholder="Destination"/><br/>' +
                '<label for = "">Departure</label><input type = "date" id = "ftime_departure_search" name="via_time_departure"/><br/>' +
                '<label for = "">Arrival</label><input type = "date" id = "ftime_arrival_search" name="via_time_arrival"/><br/>'
            );
            console.log("ASDF");

        }else if(status == "round_trip"){
            $("#search_info").html(
                '<label for = "">Flight Id</label><input type = "text" id = "fid_search" name="via_id" placeholder="Flight Id"/><br/>' +
                '<label for = "">Origin</label><input type = "text" id = "forigin_search" name="via_origin" placeholder="Origin"/><br/>' +
                '<label for = "">Destination</label><input type = "text" id = "fdestination_search" name="via_destination" placeholder="Destination"/><br/>' +
                '<label for = "">Departure</label><input type = "date" id = "ftime_departure_search" name="via_time_departure"/><br/>' +
                '<label for = "">Arrival</label><input type = "date" id = "ftime_arrival_search" name="via_time_arrival"/><br/>' +
                    '<h4>Return</h4>' +
                '<label for = "">Departure</label><input type = "date" id = "rtime_departure_search" name="rvia_time_departure"/><br/>' +
                '<label for = "">Arrival</label><input type = "date" id = "rtime_arrival_search" name="rvia_time_arrival"/><br/>'
            );
            console.log(status);
        }

    }

    function update_flights(option){
        console.log($("#fpassenger").val());
        switch(option){
            case "admin_edit":
                data2 = {"flight_id":$("#fid_search").val(), "destination":$("#fdestination_search").val(),"origin":$("#forigin_search").val()};
                $.post('/user/get_flights',data2, function(data) {

                    data = JSON.parse(data);
                    flightData = "" + data;
                    for(i = 0, j = data.flights.length; i < j; i++){
                        data.flights[i].TIME_ARRIVAL = data.flights[i].TIME_ARRIVAL.split(' ').join('T');
                        data.flights[i].TIME_DEPARTURE = data.flights[i].TIME_DEPARTURE.split(' ').join('T');
                    }
                    update_view(data);
                });
                break;
            case "customer":
                data2 = {"type":1,"slot":$("#fpassenger").val(), "flight_id":$("#fid_search").val(), "destination":$("#fdestination_search").val(),"origin":$("#forigin_search").val(),"time_departure":$("#ftime_departure_search").val(),"time_arrival":$("#ftime_arrival_search").val()};

                $.post('/user/get_flights',data2, function(data) {

                    data = JSON.parse(data);
                    flightData = data;
                    for(i = 0, j = data.flights.length; i < j; i++){
                        data.flights[i].TIME_ARRIVAL = data.flights[i].TIME_ARRIVAL;
                        data.flights[i].TIME_DEPARTURE = data.flights[i].TIME_DEPARTURE;
                    }
                    update_view2(data, "#flights_div");
                });

                if($("#search_radio input[type='radio']:checked").val() == "round_trip"){
                    if($("#rtime_departure_search").val() == ""){
                        data2 = {"type":2,"slot":$("#fpassenger").val(), "flight_id":$("#fid_search").val(), "origin":$("#fdestination_search").val(),"destination":$("#forigin_search").val(),"time_departure":$("#ftime_departure_search").val(),"time_arrival":$("#ftime_arrival_search").val()};
                        console.log("entered1-------1");
                    }else{
                        data2 = {"type":2,"slot":$("#fpassenger").val(), "flight_id":$("#fid_search").val(), "origin":$("#fdestination_search").val(),"destination":$("#forigin_search").val(),"time_departure":$("#rtime_departure_search").val(),"time_arrival":$("#rtime_arrival_search").val()};
                        console.log("entered2-------2");
                    }
                    $.post('/user/get_flights',data2, function(data) {

                        data = JSON.parse(data);
                        flightData = data;
                        for(i = 0, j = data.flights.length; i < j; i++){
                            data.flights[i].TIME_ARRIVAL = data.flights[i].TIME_ARRIVAL.split(' ').join('T');
                            data.flights[i].TIME_DEPARTURE = data.flights[i].TIME_DEPARTURE.split(' ').join('T');
                        }
                        update_view2(data, "#flights_div_return");
                        console.log(data);
                        if(data.flights.length == 0){
                            remove_view();
                        }
                    });
                }
        }
    }

    function remove_view(){
        $("#flights_div").html("");
        $("#flights_div_return").html("");
        $("#book_submit").hide();
    }

    function update_view2(data, divName){
        appender = 1;
        if(divName.indexOf("return") != -1)
            appender = 2;
        else if($("#search_radio input[type='radio']:checked").val() == "one_way")
            $("#flights_div_return").html("");

        $(divName).html(
            "<table border = 1>" +
                "<tr>" +
                    "<td></td>" +
                    "<td>FLIGHT ID </td>" +
                    "<td>SLOTS </td>" +
                    "<td>ORIGIN </td>" +
                    "<td>DESTINATION </td>" +
                    "<td>TIME DEPARTURE </td>" +
                    "<td>TIME ARRIVAL </td>" +
                "</tr>"+
            "</table>"
        )

        for(i = 0, j = data.flights.length; i<j; i++){
            $(divName+" table").append(
                "<tr>" +
                    "<td>" +
                    "<input type = 'radio' name='flight_choice"+ appender +"' value = '" + data.flights[i].FLIGHT_ID + "'/>" +
                    "</td>" +
                    "<td>" +
                    data.flights[i].FLIGHT_ID +
                    "</td>" +
                    "<td>" +
                    data.flights[i].SLOT +
                    "</td>" +
                    "<td>" +
                    data.flights[i].ORIGIN +
                    "</td>" +
                    "<td>" +
                    data.flights[i].DESTINATION +
                    "</td>" +
                    "<td>" +
                    data.flights[i].TIME_DEPARTURE +
                    "</td>" +
                    "<td>" +
                    data.flights[i].TIME_ARRIVAL +
                    "</td>" +
                "</tr>"
            );
        }

        $("#book_submit").show();

    }

    function update_view(data){
    $("#flights_container").html(
    "<table>" +
        "<tr>" +
            "<td>FLIGHT ID </td>" +
            "<td>SLOTS </td>" +
            "<td>ORIGIN </td>" +
            "<td>DESTINATION </td>" +
            "<td>TIME DEPARTURE </td>" +
            "<td>TIME ARRIVAL </td>" +
            "<td>VISIBILTY </td>" +
            "</tr>"
        );

        for(i = 0, j = data.flights.length; i < j; i++){
            originString = "";
            destinationString = "";
            visibilityString = "";
            for(k = 0; k < 33; k++){
            if(places[k] == data.flights[i].ORIGIN)
            originString += '<option value="' + places[k] +'" selected="selected">' + places[k] + '</option> ';
            else
            originString += '<option value="' + places[k] +'">' + places[k] + '</option> ';

            if(places[k] == data.flights[i].DESTINATION)
            destinationString += '<option value="' + places[k] +'" selected="selected">' + places[k] + '</option> ';
            else
            destinationString += '<option value="' + places[k] +'">' + places[k] + '</option> ';
            }

            if(data.flights[i].STATUS == "VB")
            visibilityString = '<option value="VB" selected = "selected" >Visible</option><option value="NV">Not Visible</option>';
            else
            visibilityString = '<option value="VB">Visible</option><option value="NV" selected = "selected" >Not Visible</option>';

            $("#flights_container > table").append(
            '<tr>' +
                '<form action = "/user/edit_flight" method = "post">' +
                '<td><input type = "text" name = "flight_id" readonly="readonly"  value = "'+ data.flights[i].FLIGHT_ID +'"/></td>' +

                '<td><input type = "number" name = "slot" value = "'+ data.flights[i].SLOT + '"/></td>' +

                '<td>' +
                    '<select  name="origin">' +
                        originString +
                        '</select>' +
                    '</td>' +

                '<td>' +
                    '<select  name="destination">' +
                        destinationString +
                        '</select>' +
                    '</td>' +

                '<td><input type = "datetime-local" name = "departure_time" value = "' + data.flights[i].TIME_DEPARTURE + '" /></td>' +
                '<td><input type = "datetime-local" name = "arrival_time" value = "' + data.flights[i].TIME_ARRIVAL + '" /></td>' +

                '<td>' +
                    '<select  name="status">' +
                        visibilityString +
                        '</select>'+
                    '</td>' +
                '<td><input type = "submit" value = "Edit" name = "submit"/></td>' +
                '</form>' +
            '<form action = "/user/delete_flight" method = "post">' +
                '<td>' +
                    '<input type = "text" name = "delete" value = "' + data.flights[i].FLIGHT_ID + '" hidden = "hidden"/>' +
                    '<input type = "submit" value = "X"/>' +
                    '</td>' +
                '</form>'
            );
        }
    }

</script>