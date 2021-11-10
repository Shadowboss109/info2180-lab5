window.addEventListener('load', e=>{ 
    let lookup= $("#lookup");
    let country= $("#country");
    console.log("Hi");

    lookup.on('click',e=>{
        let search={country:`${country.val()}`};
        $.ajax({
            type:"GET",
            url:"world.php",
            data: search,
            dataType: "html"

        }).done(response=>{
            $("#result").append(response);
            
        }).fail(response=>{
            $("#result").append("Error");
        })

        e.preventDefault();


    });








});