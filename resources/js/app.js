import './bootstrap';

import $ from 'jquery';

window.$ = $;

import 'bootstrap-table/dist/bootstrap-table.js'

import '../sass/app.scss';

const alertPlaceholder = document.getElementById('alert')
const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.innerHTML = wrapper.innerHTML
}


function showTable(data) {

    if ($('tr').length > 0) {
        $('#table').bootstrapTable('destroy')
    }

    $('#table').bootstrapTable({
        columns: [{
            field: 'transporter.code',
            title: 'transporter code'
        }, {
            field: 'transporter.name',
            title: 'transporter name'
        }, {
            field: 'flightNumber',
            title: 'flight number'
        }, {
            field: 'departureAirport',
            title: 'departure airport'
        }, {
            field: 'arrivalAirport',
            title: 'arrival airport'
        }, {
            field: 'departureDateTime',
            title: 'departure dateTime'
        }, {
            field: 'arrivalDateTime',
            title: 'arrival dateTime'
        }, {
            field: 'duration',
            title: 'duration'
        },
        ],
        data: data
    })
}

$('#submit').on('click', function (e) {
    let authData = $('#validAuth').prop('checked')
        ? {
            username: "basic-user",
            password: "basic_password@123"
        }
        : {
            username: "wrong",
            password: "wrong"
        }

    window.axios
        .post('/api/search', {
            searchQuery: {
                departureAirport: $('#departureAirport').val(),
                arrivalAirport: $('#arrivalAirport').val(),
                departureDate: $('#departureDate').val(),
            },
        }, {
            auth: authData
        })
        .then(function (response) {
            appendAlert('Success!', 'success')
            showTable(response.data.searchResults)
            console.log(response.data.searchResults)

        })
        .catch(function (error) {
            showTable([])
            appendAlert(error.response.data.error_message, 'danger')
            console.log(error.response.data);
        });
})

