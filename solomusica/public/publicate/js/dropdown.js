$("#region").change(function(event) {

  $.get("sectors/" + event.target.value + "", function(response, region) {

    $("#sector").empty();
    response.forEach(element => {
      $("#sector").append(`<option value=${element.id}> ${element.name} </option>`);
    });
  });
});

function setCat(n){
  document.getElementById("category").value=n;
 // document.getElementsByName('category').value=n;
 console.log(n);
}
