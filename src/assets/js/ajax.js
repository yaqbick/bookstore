
jQuery(document).ready(function ($) {
    $(".delete_button ").on("click", function (event) {
      bookID = event.target.value;
      var data = {
        action: "delete_book",
        post_type: "POST",
        data: bookID,
      };
      $.post(
        '/bookstore/ajax.php',
        data,
        function (response) {
          console.log(data.data);
        },
        "json"
      );
      console.log(data);
      alert('pomyślnie usunięto książkę');
    });
      $(".add_button").on("click", function (event) {
        var values = {title: $( "input#book_title" ).val(), 
        author: $( "select#book_author" ).val(), 
        publisher: $( "select#book_publisher" ).val()}
        values = JSON.stringify(values);
       
        var data = {
          action: "add_book",
          post_type: "POST",
          data: values,
        };
        $.post(
          '/bookstore/ajax.php',
          data,
          function (response) {
            console.log(data.data);
          },
          "json"
        );
        alert('pomyślnie dodano nową książkę');
    });
  });