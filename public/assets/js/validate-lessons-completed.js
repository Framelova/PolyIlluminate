window.addEventListener("DOMContentLoaded", async () => {
  console.log("validate-lessons-completed SCRIPT LOADED");

  //fetch all lessons completed
  let lessons = await poly_illuminate_getFetchData(
    document.location.origin +
      "/wp-json/polly-illuminate/v1/lessons-completed-by-user",
    {
      "X-WP-Nonce": wpApiSettings.nonce,
    }
  );

  console.log("lessons", lessons);

  //Validate lessons completed
  if (lessons.length > 0) {
    for (let i = 0; i < lessons.length; i++) {
      const lesson = lessons[i];

      //Get element svg with data-shape-title
      let $polygon = document.querySelector(
        `[data-shape-title="${lesson.post_title}"]`
      );

      if ($polygon) {
        $polygon.classList.add("imp-shape-highlighted");
      }
    }
  }
});
