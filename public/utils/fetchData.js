window.addEventListener("DOMContentLoaded", async () => {
  console.log("fetchData SCRIPT LOADED");
});

/**
 * GET request
 * @param {url request} url_api
 * @param {headers request} headers
 * @returns formmat json
 */
const poly_illuminate_getFetchData = (url_api, headers) => {
  let controller = new AbortController(); // Create a new controller to abort the request

  let timeout = setTimeout(() => {
    controller.abort(); // Abort the request
  }, 60000); // Set timeout to 60 seconds

  return new Promise((resolve, reject) => {
    fetch(url_api, {
      method: "GET",
      headers: headers,
      signal: controller.signal, // Pass the controller to the request
    })
      .then((res) => {
        resolve(res.json());
      })
      .catch((err) => {
        console.error("Error request get", err);
        reject(new Error(`Request get error: ${err}`));
      });
  });
};
