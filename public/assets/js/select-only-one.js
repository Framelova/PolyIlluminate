window.addEventListener("DOMContentLoaded", async () => {
  console.log("select-only-one SCRIPT LOADED");

  //get all elements input type checkbox
  const checks = document.querySelectorAll("input[type='checkbox']");

  //loop through all checkboxes
  for (let i = 0; i < checks.length; i++) {
    
    //add event listener to each checkbox
    checks[i].addEventListener("click", (e) => {
      //console.log("name", e.target.name);
      //console.log("checked", e.target.checked);

      //get all checkboxes with same name
      const similarAnswers = document.querySelectorAll(
        `input[name='${e.target.name}']`
      );

      //loop through all checkboxes with same name
      for (let j = 0; j < similarAnswers.length; j++) {
        
        //if checkbox is not the one clicked
        if (similarAnswers[j] !== e.target) {
          //uncheck it
          similarAnswers[j].checked = false;
        }
      }
    });
  }
});
