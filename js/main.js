$("#pais6").on("change", function(){
    let that = this;
    $("#japon").css("background-color", function(){
        return that.checked ? "#ff0000" : "";
    });
});

