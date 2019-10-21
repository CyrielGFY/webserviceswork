<html>
<header>
    <h1>Welcome on my calendar</h1>
</header>
<body>
<div id="newevent">
    <p id="neweventtitle">Ajouter un événement :</p>
        <div class="form-group">
        <label for="year">Date</label>
        <input type="date" class="form-control" id="year" name="date" placeholder="Année">
        <input type="time" class="form-control" id="time" name="date" >
        <input type="place" class="form-control" id="place" name="date" placeholder="place">
        <input type="criticity" class="form-control" id="criticity" name="date" placeholder="criticity">
</div>
<!--<class="form-group">
<label for="year">Heure</label>
<input type="time" class="form-control" name="time" id="time" placeholder="Heure">
</div>
<input type="submit">-->
<button id="endform"onclick="isavailable()">ok</button>
</div>
</br>
<div id="eventexist"></div>
</br>
<a href="">Modifier un événement</a>
</br>
<a href="">Supprimer un événement</a>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    $('#place').hide();
    $('#criticity').hide();
    function isavailable() {
         datecreate = $('#year').val();
         timecreate = $('#time').val();
         console.log("date : "+datecreate+" time : "+timecreate);
//$.get("http://localhost:8888/webserviceswork/webserviceswork/phpbackend/getevent.php?datebooking="+datecreate,function(data){ console.log(data);});
        axios.get('./getevent.php', {
            params: {
                datebooking: datecreate+' '+timecreate+':00',
            }
        })
            .then(function (response) {
                console.log(response);
                responsefinal =response.data;
                console.log(responsefinal);
                console.log(responsefinal.length);
                if (responsefinal.length===0){
                    secondstep();
                }
                else {$('#eventexist').text("Vous avez un conflit : un événement est déjà prévu le : "+responsefinal[0][1]+" à "+responsefinal[0][2])}
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function (response) {
                //console.log(response.data)
            });
    }
    function secondstep(){
        $('#year').hide();
        $('#time').hide();
        $('#endform').attr("onclick","createnewevent()");
        $('#neweventtitle').text('Ajouter un événement le : '+datecreate+" à : "+timecreate);
        $('#place').show();
        $('#criticity').show();}

        function createnewevent(){
            place=$('#place').val();
            level=$('#criticity').val();
        axios.post('./createevent.php', {
            params: {
                datebooking: datecreate+' '+timecreate+':00',
                place: place,
                criticity:level,
            }
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function (response) {
                //console.log(response.data)
            });

    }
</script>
</body>
</html>
