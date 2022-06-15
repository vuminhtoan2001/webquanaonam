// handle back to top of page
btnBackToTop = document.querySelector(".back-to-top");
if (btnBackToTop) {
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      btnBackToTop.style.display = "block";
    } else {
      btnBackToTop.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function backToTop() {
    document.documentElement.scrollIntoView({
      behavior: "smooth",
    });
    // document.body.scrollTop = 0; // For Safari
    // document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
}

// handel url active link:

window.addEventListener("load", function () {
  const sidebarLinks = document.querySelectorAll(".nav-link");
  console.log(location.pathname);
  arr_link = location.pathname.split("/");
  console.log(arr_link);
  switch (arr_link[2]) {
    case "":
      sidebarLinks[0].classList.add("active");
      break;
    case "products":
      sidebarLinks[1].classList.add("active");
      break;
    case "store":
      sidebarLinks[2].classList.add("active");
      break;
    case "news":
      sidebarLinks[3].classList.add("active");
      break;
    case "contact":
      sidebarLinks[4].classList.add("active");
      break;
  }
});
