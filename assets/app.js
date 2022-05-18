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

$("#menu").click("click", function(e) {
    e.preventDefault();
    $.ajax({
        url: "/menu"
    }).done(function (data) { // data what is sent back by the php page
        $('#Prawy').html(data); // display data

    });

})
$("#employees").click("click", function(e) {
    e.preventDefault();
    $.ajax({
        url: "/employees"
    }).done(function (data) { // data what is sent back by the php page
        $('#Prawy').html(data); // display data

    });

})
$("#invoices").click("click", function(e) {
    e.preventDefault();
    $.ajax({
        url: "/invoices"
    }).done(function (data) { // data what is sent back by the php page
        $('#Prawy').html(data); // display data
    });
})
$("#delegations").click("click", function(e) {
    e.preventDefault();
    $.ajax({
        url: "/delegations"
    }).done(function (data) { // data what is sent back by the php page
        $('#Prawy').html(data); // display data
    });
})
$("#clients").click("click", function(e) {
    e.preventDefault();
    $.ajax({
        url: "/clients"
    }).done(function (data) { // data what is sent back by the php page
        $('#Prawy').html(data); // display data
    });
})
let evenPicker = document.getElementById('picker-even');
evenPicker.addEventListener("change", function ()
{
    $('tr.even').css('background-color', evenPicker.value);
})
let oddPicker = document.getElementById('picker-odd');
oddPicker.addEventListener("change", function ()
{
    $('tr.odd').css('background-color', oddPicker.value);
})

let net_price = document.querySelectorAll("#net_price");
let tax = document.querySelectorAll("#tax");
let with_tax_price = document.querySelectorAll("#net_val");
let with_tax_val = document.querySelectorAll("#with_tax_val");

with_tax_price.forEach(item => {
    let quantity = item.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
    let net_price = item.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
    item.innerHTML = quantity * net_price;

})

tax.forEach(item => {
    item.addEventListener('change', (e)=> {
        let with_tax = e.currentTarget.parentElement.nextElementSibling;
        let quantity = e.currentTarget.parentElement.previousElementSibling.innerHTML;
        let chosen_tax = e.currentTarget.value;
        let net_value = e.currentTarget.parentElement.previousElementSibling.previousElementSibling.innerHTML;
        let with_tax_val = e.currentTarget.parentElement.nextElementSibling.nextElementSibling.nextElementSibling;
        if (chosen_tax === '0'){
            with_tax.innerHTML = net_value;
            with_tax_val.innerHTML = net_value * quantity;
        } else if(chosen_tax === '3'){
            with_tax.innerHTML = net_value * 1.03;
            with_tax_val.innerHTML = net_value * 1.03 * quantity;
        }
        else if(chosen_tax === '8'){
            with_tax.innerHTML = net_value * 1.08;
            with_tax_val.innerHTML = net_value * 1.08 * quantity;
        }
        else {
            with_tax.innerHTML = net_value * 1.23;
            with_tax_val.innerHTML = net_value * 1.23 * quantity;
        }
    }
)
})

let big_order_button = document.getElementById("big_value");

big_order_button.addEventListener('click', function ()
{
    net_price.forEach(item => {

        if(parseInt(item.innerHTML) > 1000) {

            item.parentElement.style.backgroundColor = 'green';
        }
        })
})










