const input = document.getElementById("searchInput");
const box = document.getElementById("suggestBox");

// ===== LỊCH SỬ =====
function getHistory() {
    return JSON.parse(localStorage.getItem("search_history") || "[]");
}

function saveHistory(keyword) {
    let history = getHistory();

    history = history.filter(k => k !== keyword);
    history.unshift(keyword);

    if (history.length > 5) history.pop();

    localStorage.setItem("search_history", JSON.stringify(history));
}

// ===== HIỂN THỊ =====
function renderSuggest(list) {
    if (!list || list.length === 0) {
        box.style.display = "none";
        return;
    }

    box.innerHTML = list.map(item =>
        `<div class="suggest-item">${item}</div>`
    ).join("");

    box.style.display = "block";

    document.querySelectorAll(".suggest-item").forEach(el => {
        el.onclick = () => {
            input.value = el.innerText;
            saveHistory(el.innerText);
            box.style.display = "none";
        }
    });
}

// ===== CLICK INPUT → HIỆN LỊCH SỬ =====
input.addEventListener("focus", () => {
    let history = getHistory();
    renderSuggest(history);
});

// ===== GÕ → HIỆN GỢI Ý (ẨN HISTORY) =====
input.addEventListener("input", function () {
    let keyword = this.value.trim();

    if (keyword === "") {
        box.style.display = "none"; // KHÔNG hiện lại history
        return;
    }

    fetch("search_suggest.php?keyword=" + encodeURIComponent(keyword))
        .then(res => res.json())
        .then(data => {
            renderSuggest(data);
        });
});

// ===== CLICK NGOÀI → ẨN =====
document.addEventListener("click", (e) => {
    if (!e.target.closest(".search-form")) {
        box.style.display = "none";
    }
});

// ===== SUBMIT → LƯU =====
document.querySelector(".search-form").addEventListener("submit", function () {
    let keyword = input.value.trim();
    if (keyword !== "") {
        saveHistory(keyword);
    }
});