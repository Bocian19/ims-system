/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';



    $("#menu").click("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/menu"
        }).done(function (data) { // data what is sent back by the php page
            $('#Prawy').html(data); // display data

        });

    })
    $("#employees").click("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/employees"
        }).done(function (data) { // data what is sent back by the php page
            $('#Prawy').html(data); // display data

        });

    })
    $("#invoices").click("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/invoices",
            beforeSend: function() {
                $("#load").removeClass("hidden");
            },
        }).done(function (data) { // data what is sent back by the php page
            $('#Prawy').html(data); // display data
        });
    })
    $("#delegations").click("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/delegations"
        }).done(function (data) { // data what is sent back by the php page
            $('#Prawy').html(data); // display data
        });
    })
    $("#clients").click("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/clients"
        }).done(function (data) { // data what is sent back by the php page
            $('#Prawy').html(data); // display data
        });
    })

    let net_price = document.querySelectorAll("#net_price");
    let tax = document.querySelectorAll("#tax");
    let net_val = document.querySelectorAll("#net_val");
    let with_tax_val = document.querySelectorAll("#with_tax_val");

    net_val.forEach(item => {
        let quantity = item.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
        let net_price = item.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
        item.innerHTML = quantity * net_price;

    })

    tax.forEach(item => {
        item.addEventListener('change', (e) => {
                let with_tax = e.currentTarget.parentElement.nextElementSibling;
                let quantity = e.currentTarget.parentElement.previousElementSibling.innerHTML;
                let chosen_tax = e.currentTarget.value;
                let net_value = e.currentTarget.parentElement.previousElementSibling.previousElementSibling.innerHTML;
                let with_tax_val = e.currentTarget.parentElement.nextElementSibling.nextElementSibling.nextElementSibling;
                if (chosen_tax === '0') {
                    with_tax.innerHTML = net_value;
                    with_tax_val.innerHTML = (net_value * quantity).toFixed(2);
                } else if (chosen_tax === '3') {
                    with_tax.innerHTML = (net_value * 1.03).toFixed(2);
                    with_tax_val.innerHTML = (net_value * 1.03 * quantity).toFixed(2);
                } else if (chosen_tax === '8') {
                    with_tax.innerHTML = (net_value * 1.08).toFixed(2);
                    with_tax_val.innerHTML = (net_value * 1.08 * quantity).toFixed(2);
                } else {
                    with_tax.innerHTML = (net_value * 1.23).toFixed(2);
                    with_tax_val.innerHTML = (net_value * 1.23 * quantity).toFixed(2);
                }
            }
        )
    })

    let big_order_button = document.getElementById("big_value");
    if (big_order_button) {
        big_order_button.addEventListener('click', function () {
            net_price.forEach(item => {

                if (parseInt(item.innerHTML) > 1000) {

                    item.parentElement.style.backgroundColor = 'green';
                }
            })
        })
    }
let evenPicker = document.getElementById('picker-even');
    if (evenPicker) {
        evenPicker.addEventListener("change", function () {
            $('tr.even').css('background-color', evenPicker.value);
        })
    }
let oddPicker = document.getElementById('picker-odd');
    if (oddPicker) {
        oddPicker.addEventListener("change", function () {
            $('tr.odd').css('background-color', oddPicker.value);
        })
    }



