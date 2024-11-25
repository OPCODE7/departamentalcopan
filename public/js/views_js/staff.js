const $departments = document.querySelectorAll(".department-container");
const $employeeCards = document.querySelectorAll(".scale-img-hover");

document.getElementById("select-department").addEventListener("change", (e) => {
  let selectedValue = e.target.value;
  $departments.forEach((department) => {
    if (selectedValue === "all" || selectedValue === "") {
      department.classList.remove("d-none");
    } else if (department.id === selectedValue) {
      department.classList.remove("d-none");
      department.classList.add("animated", "bounceIn");
    } else {
      department.classList.remove("animated", "bounceIn");
      department.classList.add("d-none");
    }
  });
});

document.getElementById("search-employee").addEventListener("keyup", (e) => {
  let searchValue = e.target.value.toLowerCase();
  $employeeCards.forEach((card) => {
    let employeeName = card.querySelector("h4").textContent.toLowerCase();
    if (employeeName.includes(searchValue)) {
      card.classList.remove("d-none");
    } else {
      card.classList.add("d-none");
    }
  });

  $departments.forEach((department) => {
    department.querySelectorAll(".scale-img-hover").length;
    if (department.querySelectorAll(".d-none").length == 0) {
      department.classList.remove("d-none");
    } else {
      department.classList.add("d-none");
    }
  });
});
