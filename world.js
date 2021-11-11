window.addEventListener('load', e=>{ 
    let lookup= $("#lookup");
    let country= $("#country");

    let cit= $("#city");
 




    lookup.on('click',e=>{
       
        
        let search={country:`${country.val()}`};
        $.ajax({
            type:"GET",
            url:"world.php",
            data: search,
            dataType: "html"

        }).done(response=>{
            $("#result").empty();
            $("#result").append(response);
            
        }).fail(response=>{
            $("#result").empty();
            $("#result").append("Error");
        })

        e.preventDefault();


    });
    cit.on('click',e=>{
        
        let search={country:`${country.val()}`, context:"cities"};
        $.ajax({
            type:"GET",
            url:"world.php",
            data: search,
            dataType: "html"

        }).done(response=>{
            $("#result").empty();
            $("#result").append(response);
            
        }).fail(response=>{
            $("#result").empty();
            $("#result").append("Error");
        })

        e.preventDefault();


    });








});