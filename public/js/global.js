function logout() {
    document.getElementById('logout-form').submit();
}


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

/**
 * Open up a modal with a list of widgets
 * @param  string url
 * @return void
 */
function getWidgetList(url) {
    var jqxhr = $.get(url, function(response) {
      $('#modal #modal-header').text('Widget List');
      $('#modal #modal-body').html(response);
    }).fail(function(response) {
        $('#modal #modal-header').text('Error');
        $('#modal #modal-body').html('Ooops, something went wrong!');
    }).always(function() {
        $('#modal').modal('show');
    });
}

/**
 * Add widget to user table
 * @param  string url
 * @param  integer widgetId
 * @return void
 */
function addWidget(url, widgetId) {
    data = {'widget_id': widgetId};

    var jqxhr = $.post(url, data)
    .done(function(response) {
        $('#widget-' + widgetId).remove();
        $('#tbody').append(response);
        // $('#modal').modal('hide');
    }).fail(function(response) {
        if (response.status === 422) {
            var message = response.responseJSON.message;
            $('#message-error').html(message);
            var errors = response.responseJSON.errors;
            $.each(errors, function (key, value) {
                $('#' + key + '-error').html(value);
            });
        } else {
            $('#modal #modal-header').text('Error');
            $('#modal #modal-body').html('Ooops, something went wrong!');
            $('#modal').modal('show');
        }
    })
}

/**
 * remove a widget then remove table row from DOM
 * @param  string url
 * @param  integer widgetId
 * @return void
 */
function removeWidget(url, widgetId) {
    data = {'widget_id': widgetId};

    var jqxhr = $.post(url, data)
    .done(function(response) {
        $('#row-' + widgetId).remove();
    }).fail(function(response) {
        var errorMessage = response.responseJSON.error;
        if (typeof errorMessage == 'undefined') {
            errorMessage = 'Ooops, something went wrong!';
        }
        $('#modal #modal-header').text('Error');
        $('#modal #modal-body').html(errorMessage);
        $('#modal').modal('show');
    })
}
