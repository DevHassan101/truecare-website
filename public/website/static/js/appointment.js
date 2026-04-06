document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".tab-button");
    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            // Remove all Active class
            buttons.forEach((button) => {
                const circle = button.querySelector(".circle");
                const tabText = button.querySelector(".tabText");
                circle.classList.remove("active");
                tabText.classList.remove("active");
            });

            // Hide prev show content
            document.querySelectorAll(".content").forEach((contentDiv) => {
                contentDiv.classList.remove("active");
            });

            // Active the button which is clicked
            const circle = btn.querySelector(".circle");
            const tabText = btn.querySelector(".tabText");
            circle.classList.add("active");
            tabText.classList.add("active");

            // Active the tab which is clicked
            const tabId = btn.getAttribute("data-tab");
            document.getElementById(tabId).classList.add("active");
        });
    });
});

// validation functions
function validateTab1() {
    const appointmentTypes = document.querySelectorAll(
        'input[name="types[]"]:checked'
    );
    if (appointmentTypes.length === 0) {
        Toast.fire({
            icon: "error",
            title: "Please select at least one appointment type",
        });
        return false;
    }
    let appointmentTypesText = "";
    let key = 0;
    appointmentTypes.forEach((element) => {
        if (key == 0) {
            appointmentTypesText += element.value;
        } else {
            appointmentTypesText += ", " + element.value;
        }
        key++
    });
    document.getElementById("appointment-types").innerText =
        appointmentTypesText;
    return true;
}
function validateTab2() {
    const services = document.querySelectorAll(
        'input[name="services[]"]:checked'
    );
    if (services.length === 0) {
        Toast.fire({
            icon: "error",
            title: "Please select at least one service/specialty.",
        });
        return false;
    }
    return true;
}

function validateTab3() {
    const date = document.querySelector('input[name="date"]').value;
    const timeSlot = document.querySelector(
        'input[name="available_timing_id"]:checked'
    );

    if (!date) {
        Toast.fire({
            icon: "error",
            title: "Please select a date for your appointment.",
        });
        return false;
    }

    if (!timeSlot) {
        Toast.fire({
            icon: "error",
            title: "Please select a time slot for your appointment.",
        });
        return false;
    }
    document.getElementById("date-time").innerHTML = document.getElementById('available_timing_id_' + timeSlot.value).innerText + ", " + date;
    return true;
}

function changeTab(tabId) {
    let currentTab = document
        .querySelector(".content.active")
        .getAttribute("data-tab");
    console.log(currentTab);
    // console.log(currentTab.getAttribute('data-tab'));
    // return;
    if (currentTab == 1) {
        let ok = validateTab1();
        if (!ok) {
            return;
        }
    } else if (currentTab == 2) {
        let ok = validateTab2();
        if (!ok) {
            return;
        }
    } else if (currentTab == 3) {
        let ok = validateTab3();
        if (!ok) {
            return;
        }
    }

    document.querySelectorAll(".content").forEach((contentDiv) => {
        contentDiv.classList.remove("active");
    });
    document.getElementById(tabId).classList.add("active");
    const buttons = document.querySelectorAll(".tab-button");
    buttons.forEach((button) => {
        const circle = button.querySelector(".circle");
        const tabText = button.querySelector(".tabText");
        circle.classList.remove("active");
        tabText.classList.remove("active");
    });
    let btn = document.querySelector(`[data-tab="${tabId}"]`);
    // Active the button which is clicked
    const circle = btn.querySelector(".circle");
    const tabText = btn.querySelector(".tabText");
    circle.classList.add("active");
    tabText.classList.add("active");
}
