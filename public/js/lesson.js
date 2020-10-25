$(document).ready(function () {
    //when choose category then we can choose book
    $("#category_id").change(function () {
        $("#book_id").empty();
        $("#lesson_id").empty();

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
    });


    //when choose book then we can choose lessons
    $("#book_id").change(function () {
        $("#lesson_id").empty();

        let book_id = $("#book_id").val();

        console.log(book_id);

        $.ajax({
            url: "http://127.0.0.1:8000/api/books/" +
                book_id +
                "/lessons",
            success: function (result) {
                console.log(result);

                let opt = $("<option>").val('').text("Chọn Lessons");

                $("#lesson_id").append(opt);

                result.forEach(function (lesson) {
                    // create the option
                    var opt = $("<option>").val(lesson.id).text(lesson.name);

                    //append option to the select element
                    $("#lesson_id").append(opt);
                });
            },
        });
    })
});
