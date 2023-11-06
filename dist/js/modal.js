const tabLinks = document.querySelectorAll(".tablinks");
const tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function (el) {
el.addEventListener("click", openTabs);
});

function openTabs(el) {
var btn = el.currentTarget;
var electronic = btn.dataset.electronic;

if (tabContent) {
    tabContent.forEach(function (el) {
    el.classList.remove("active");
    });
}

if (tabLinks) {
    tabLinks.forEach(function (el) {
    el.classList.remove("active");
    });
}

if (document.querySelector("#" + electronic)) {
    document.querySelector("#" + electronic).classList.add("active");
}

btn.classList.add("active");
}

function waitForAddedNode(params) {
return new Promise((resolve, reject) => {
    new MutationObserver(function (mutations) {
    const el = document.querySelector(params.classSelector);

    if (el) {
        this.disconnect();
        resolve(el);
    }
    }).observe(params.parent || document, {
    subtree: !!params.recursive,
    childList: true,
    });
});
}

waitForAddedNode({ classSelector: ".trust-item", recursive: true })
.then(function () {
    // Lấy modal
    var modal = document.getElementById("ModalTrust");

    // Lấy nút mở modal
    var buttons = document.querySelectorAll(".trust-item");

    // Lấy nút đóng modal
    var span = document.getElementsByClassName("trust-close")[0];

    var buttonSubmit = document.getElementsByClassName("btn-submit")[0];

    buttons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        console.log("btn", btn.dataset);
        const { typeTab } = btn.dataset;
        if (typeTab) {
        if (tabContent) {
            tabContent.forEach(function (el) {
            el.classList.remove("active");
            });
        }
        if (tabLinks) {
            tabLinks.forEach(function (el) {
            el.classList.remove("active");
            });
        }
        if (document.querySelector("#" + typeTab)) {
            document.querySelector("#" + typeTab).classList.add("active");
        }
        const buttonCurrent = document.querySelector(
            `[data-electronic='${typeTab}']`
        );
        if (buttonCurrent) {
            buttonCurrent.classList.add("active");
        }
        }
        modal.style.display = "block";
        document.body.classList.toggle("modal-open");
        document.body.style.overflow = "hidden";
        document.body.style.paddingRight = "15px";
    });
    });

    // Nút đóng model
    span.onclick = function () {
    modal.style.display = "none";
    document.body.classList.toggle("modal-open");
    document.body.style.overflow = null;
    document.body.style.paddingRight = null;
    };

    buttonSubmit.onclick = function () {
    modal.style.display = "none";
    };
    // Đóng modal khi bấm ra ngoài
    window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.classList.toggle("modal-open");
        document.body.style.overflow = null;
        document.body.style.paddingRight = null;
    }
    };
})
.catch(() => { });