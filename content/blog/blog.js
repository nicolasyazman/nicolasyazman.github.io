
$(document).ready(function() {
   /* $(function(){
        $("#current_card").load("articles/what_are_tags_and_what_are_they_used_for.md");
                });*/

    //var reader = new FileReader();
    window.fetch('./articles').then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }
      
          return response.blob();
        })
        .then((response) => {
            console.log(response);
          //myImage.src = URL.createObjectURL(response);
    });
    //$("#cards_catalogue").load();
});
