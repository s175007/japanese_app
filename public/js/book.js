

$(document).ready(function () {
    $("#category_id").change(function (){
        $("#book_id").empty();

        let category_id = $("#category_id").val();

        console.log(category_id);

        $.ajax({
            url: "http://127.0.0.1:8000/api/categories/" +
                category_id +
                "/books",
            success: function (result) {
                console.log(result);

                let opt = $("<option>").val('').text("Chọn Books");

                $("#book_id").append(opt);

                result.forEach(function (book) {
                    // create the option
                    var opt = $("<option>").val(book.id).text(book.name);

                    //append option to the select element
                    $("#book_id").append(opt);
                });
            },
        });
    })
});

