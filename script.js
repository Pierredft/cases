document.querySelectorAll(".num-button:not(.reserved)").forEach(button => {
    button.addEventListener("click", function () {
        let selectedNum = this.getAttribute("data-num");
        document.getElementById("selected-num").innerText = selectedNum;
        document.getElementById("numero").value = selectedNum;
        document.getElementById("form-container").style.display = "block";
    });
});

document.getElementById("reservation-form").addEventListener("submit", function (e) {
    e.preventDefault();
    
    let formData = new FormData(this);

    fetch("save_reservation.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload();
    });
});

