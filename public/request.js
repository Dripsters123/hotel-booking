document.querySelectorAll(".accept-button").forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    if (window.confirm("Are you sure you want to accept this request?")) {
      // If the user clicked "OK", submit the form.
      e.target.closest("form").submit();
      // Show notification
      showNotification("The request has been accepted.", "green");
    }
  });
});

document.querySelectorAll(".decline-button").forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    if (window.confirm("Are you sure you want to decline this request?")) {
      // If the user clicked "OK", submit the form.
      e.target.closest("form").submit();
      // Show notification
      showNotification("Your request has been declined.", "red");
    }
  });
});

function showNotification(message, color) {
  // Create notification div
  var notification = document.createElement("div");
  notification.textContent = message;
  notification.style.backgroundColor = color;
  notification.style.color = "white";
  notification.style.position = "fixed";
  notification.style.bottom = "20px";
  notification.style.right = "20px";
  notification.style.padding = "15px";
  notification.style.borderRadius = "5px";

  // Append to body
  document.body.appendChild(notification);

  // Remove after 3 seconds
  setTimeout(function () {
    document.body.removeChild(notification);
  }, 3000);
}
