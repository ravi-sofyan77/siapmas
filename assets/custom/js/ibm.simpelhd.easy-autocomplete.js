$(document).ready(function () { 

    var input_agama = $('input[name="agama"]');
    var url_agama   = $('p.url-religions').text();
    set_input_autocomplete(url_agama,input_agama,'name');
    
    var input_pekerjaan = $('input[name="pekerjaan"]');
    var url_pekerjaan   = $('p.url-pekerjaan').text();
    set_input_autocomplete(url_pekerjaan,input_pekerjaan,'name');

    var input_angkel = $('input[name="angkel"]');
    var url_angkel   = $('p.url-person').text();
    //set_input_autocomplete(url_nik,input_nik,'name');
    set_autocomplete_tpl(url_angkel,input_angkel,'nama','nik','id_person','input[name="id_person"]');
}); 



function set_input_autocomplete(action_url,selector,field) {
    var options = {
        url: function(phrase) {
            return action_url;
        },
        getValue: function(element) {
            return element[field];
        },
        template: {
            fields: {
                description:field
            }
        },
        ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
                dataType: "json"
            }
        },
        list: {
        maxNumberOfElements: 8,
        match: {
            enabled: true
        },
        sort: {
            enabled: true
        }
    },
        preparePostData: function(data) {
            data['X-API-KEY'] = 'W1th0utLo993d1n';
            return data;
        },
        requestDelay: 400,
        theme: "square"
    };

    $(selector).easyAutocomplete(options);
}

function set_input_autocomplete(action_url,selector,field,primary_key,selector_handler) {
    var options = {

    url: function(phrase) {
      return action_url;
    },
    getValue: function(element) {
        return element[field];
    },
    template: {
        fields: {
            description: field
        }
    },
    ajaxSettings: {
      dataType: "json",
      method: "POST",
      data: {
            dataType: "json"
        }
    },  
    preparePostData: function(data) {
        data['X-API-KEY'] = 'W1th0utLo993d1n';
        return data;
    },
    requestDelay: 400,
    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var data = $(selector).getSelectedItemData();
            var id  = data[primary_key];
            if ($(selector_handler).length == 1) {
                $(selector_handler).val(id).trigger("change");
            }
        }
    },
    theme: "square"
    };

    if ($(selector).length == 1) {
        $(selector).easyAutocomplete(options); 
    } 
}

function set_autocomplete_tpl(action_url,selector,field,field_tpl,primary_key,selector_handler) {
    var options = {

    url: function(phrase) {
      return action_url;
    },
    getValue: function(element) {
        return element[field];
    },
    template: {
        type: "description",
        fields: {
            description: field_tpl
        }
    },
    ajaxSettings: {
      dataType: "json",
      method: "POST",
      data: {
            dataType: "json"
        }
    },  
    preparePostData: function(data) {
        data['X-API-KEY'] = 'W1th0utLo993d1n';
        return data;
    },
    requestDelay: 400,
    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var data = $(selector).getSelectedItemData();
            var id  = data[primary_key];
            if ($(selector_handler).length == 1) {
                $(selector_handler).val(id).trigger("change");
            }
        }
    },
    theme: "square"
    };

    if ($(selector).length == 1) {
        $(selector).easyAutocomplete(options); 
    } 
}

function set_basic_autocomplete(selector,source_url){
    var options = {
        url: function(phrase) {
            return source_url;
        },
        ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
                dataType: "json"
            }
        },  
        preparePostData: function(data) {
            data['X-API-KEY'] = 'W1th0utLo993d1n';
            return data;
        },
        list: {
            match: {
                enabled: true
            }
        },
        theme: "square"
    };

    
    if ($(selector).length == 1) {
        $(selector).easyAutocomplete(options);
    }
}