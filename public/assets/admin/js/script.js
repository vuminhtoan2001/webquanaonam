//Class Active menu
window.addEventListener("load", function () {
  console.log(location.pathname);
  arr_link = location.pathname.split("/");
  console.log(arr_link);
  const sidebarLinks = document.querySelectorAll(".menu-text");
  sidebarLinks.forEach((link, index) => {
    if (link.innerHTML.toLowerCase() == arr_link[3]) {
      const link_active = link.parentElement;
      link_active.parentElement.classList.add("active");
    }
  });
});
//Menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
toggle.onclick = function () {
  navigation.classList.toggle("active-toggle");
  main.classList.toggle("active-toggle");
};

// Sweet alert delete
function handleDelete(e) {
  const key = e.getAttribute("key");
  console.log(e.getAttribute("key"));
  console.log(window.location.href);
  Swal.fire({
    title: "Bạn thật sự muốn xóa ?",
    text: "Bạn sẽ không thể hoàn nguyên dữ liệu lại khi xóa !",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        icon: "success",
        title: "Xóa thành công!",
        showConfirmButton: false,
        timer: 1500,
      });
      setTimeout(() => {
        window.location.assign(`${window.location.href}/delete/${key}`);
      }, 1500);
    }
  });
}

// Handle preview image
let file = document.getElementById("file");
if (file != null) {
  file.addEventListener("change", function (e) {
    const file = e.target.files[0];
    file.preview = URL.createObjectURL(file);
    const img = document.getElementById("img-product");
    img.src = file.preview;
  });
}
file = document.getElementById("file-news-1");
if (file != null) {
  file.addEventListener("change", function (e) {
    const file = e.target.files[0];
    file.preview = URL.createObjectURL(file);
    const img = document.getElementById("img-news-1");
    img.style.marginTop = "20px";
    img.style.height = "210px";
    img.src = file.preview;
  });
}
file = document.getElementById("file-news-2");
if (file != null) {
  file.addEventListener("change", function (e) {
    const file = e.target.files[0];
    file.preview = URL.createObjectURL(file);
    const img = document.getElementById("img-news-2");
    img.style.marginTop = "20px";
    img.style.height = "210px";
    img.src = file.preview;
  });
}
file = document.getElementById("file-news-3");
if (file != null) {
  file.addEventListener("change", function (e) {
    const file = e.target.files[0];
    file.preview = URL.createObjectURL(file);
    const img = document.getElementById("img-news-3");
    img.style.marginTop = "20px";
    img.style.height = "210px";
    img.src = file.preview;
  });
}

// Handle Action (Add, Update, Delete)
const btn_add = document.querySelector("#btn_them");
btn_add.onclick = function (e) {
  Swal.fire({
    icon: "success",
    title: "Thêm mới thành công",
    showConfirmButton: false,
    timer: 1000,
  });
};

function handleOrder(e) {
  const key = e.getAttribute("key");
  Swal.fire({
    icon: "success",
    title: "Đã duyệt đơn hàng",
    showConfirmButton: false,
    timer: 1000,
  });
  setTimeout(() => {
    window.location.assign(`${window.location.href}/handleChecked/${key}`);
  }, 1000);
}
function handleRemoveChecked(e) {
  const key = e.getAttribute("key");
  Swal.fire({
    icon: "success",
    title: "Đã hủy duyệt đơn hàng",
    showConfirmButton: false,
    timer: 1000,
  });
  setTimeout(() => {
    window.location.assign(`${window.location.href}/destroyChecked/${key}`);
  }, 1000);
}
