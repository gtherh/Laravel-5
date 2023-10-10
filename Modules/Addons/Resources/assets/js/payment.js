"use strict";
let httpRequest;
let x = document.getElementById("payment-form-container");
document.getElementById('addon-install-btn').onclick = function () {
    const p = x.closest('.payment-form-hide');
    if (p) {
        p.classList.remove('payment-form-hide');
    }
    x.classList.toggle('payment-form-show');
};

document.getElementById('cancel-addform').onclick = function () {
    x.classList.remove('payment-form-show');
};


var close = document.getElementsByClassName("payment-alert-closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function () {
            div.style.display = "none";
        }, 600);
    }
}

let triggers = document.querySelectorAll('.payment-modal-trigger');
if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
    httpRequest = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 6 and older
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}


triggers.forEach((trigger) => {
    trigger.addEventListener('click', function () {
        clearForm();
        paymentModalToggle();
        setFormName(this.dataset.name);
        getPaymentFormData(this.dataset.url);
    });
});

document.querySelector('.payment-modal-close').addEventListener('click', function () {
    paymentModalToggle();
});

function getPaymentFormData(url) {
    if (url === '#') {
        return;
    }
    togglePaymentLoading();
    httpRequest.onreadystatechange = handleResponse;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function paymentModalToggle() {
    document.querySelector('.payment-modal-window').classList.toggle('payment-modal-hidden');
}

function handleResponse() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        togglePaymentLoading();
        if (httpRequest.status === 200) {
            let response = JSON.parse(httpRequest.responseText);
            if (response.status) {
                generateForm(response.html);
            }
        } else {
            alert('There was a problem with the request.');
            paymentModalToggle();
        }
    }
}

function generateForm(html) {
    var div = document.createElement("div");
    div.innerHTML = html;
    document.querySelector('.modal-form-data .payment-form').appendChild(div);
}

function setFormName(name) {
    document.querySelector('.payment-modal-title').innerHTML = name;
}

function togglePaymentLoading() {
    document.querySelector('.payment-form-loading').classList.toggle('payment-modal-dnone');

}

function clearForm() {
    document.querySelector('.modal-form-data .payment-form').innerHTML = '';
    setFormName('');
}

const insTab = document.getElementById('ins-addon-tab');


$('.search-box').on('keyup', function () {
    var input, filter, tr, td, i, txtValue;
    input = $(this).val();
    filter = input.toUpperCase();
    tr = $('table').find("tbody tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].querySelector(".addons-name");
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
})
