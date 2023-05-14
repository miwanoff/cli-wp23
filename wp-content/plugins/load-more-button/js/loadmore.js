jQuery(function ($) {
    $("#bootkit_loadmore").click(function () {
      console.log("loadmore");
      $(this).text("Loading..."); // изменяем текст кнопки, вы также можете добавить прелоадер
      var data = {
        action: "loadmore",
        query: bootkit_posts,
        page: current_page,
      };
      console.log(data);
      $.ajax({
        url: ajaxurl, // обработчик
        data: data, // данные
        type: "POST", // тип запроса
        success: function (data) {
          console.log(data);
          if (data) {
            $("#bootkit_loadmore").text("Load more").before(data); // вставляем новые посты
            current_page++; // увеличиваем номер страницы на единицу
            if (current_page == max_pages) $("#bootkit_loadmore").remove(); // если последняя страница, удаляем кнопку
          } else {
            $("#bootkit_loadmore").remove(); // если мы дошли до последней страницы постов, скроем кнопку
          }
        },
      });
    });
  });