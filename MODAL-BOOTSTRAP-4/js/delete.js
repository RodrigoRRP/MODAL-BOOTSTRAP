$('.btnBorrar').click(function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    var dataString = 'id='+ id;
    url = "app/recib_Delete.php";
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function(data)
            {
              window.location.href="/MODAL";
              $('#res').html(data);
            }
        });
return false;

});
