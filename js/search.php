<script>
    places = ["Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga"];
    flightData = <?php echo json_encode(["flights"=>$flights]);?>;
    //console.log(flightData);
    $(document).ready(function(){
        $("#search_admin_submit").click(function(e){
            update_flights("admin_edit");
            e.preventDefault();
        });
    });

    function update_flights(option){

        switch(option){
            case "admin_edit":
                data2 = {"flight_id":$("#fid_search").val(), "destination":$("#fdestination_search").val(),"origin":$("#forigin_search").val()};
                $.post('/user/get_flights',data2, function(data) {

                    data = JSON.parse(data);
                    flightData = data;
                    for(i = 0, j = data.flights.length; i < j; i++){
                        data.flights[i].TIME_ARRIVAL = data.flights[i].TIME_ARRIVAL.split(' ').join('T');
                        data.flights[i].TIME_DEPARTURE = data.flights[i].TIME_DEPARTURE.split(' ').join('T');
                    }
                    update_view(data);
                });
                break;
            case "customer":
                data2 = {"flight_id":$("#fid_search").val(), "destination":$("#fdestination_search").val(),"origin":$("#forigin_search").val(),"time_departure":$("#ftime_departure_search").val(),"time_arrival":$("#ftime_arrival_search").val()};
                $.post('/user/get_flights',data2, function(data) {

                    data = JSON.parse(data);
                    flightData = data;
                    for(i = 0, j = data.flights.length; i < j; i++){
                        data.flights[i].TIME_ARRIVAL = data.flights[i].TIME_ARRIVAL.split(' ').join('T');
                        data.flights[i].TIME_DEPARTURE = data.flights[i].TIME_DEPARTURE.split(' ').join('T');
                    }
                    update_view2(data);
                });
        }
    }

    function update_view2(data){
        console.log(data);
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
                '<td><input type = "text" name = "flight_id"  value = "'+ data.flights[i].FLIGHT_ID +'"/></td>' +

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