document.getElementById("feedbackForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  fetch("submit.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `name=${name}&email=${email}&message=${message}`
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById("response").innerText = data;
  });
});

