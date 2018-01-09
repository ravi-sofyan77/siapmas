$(document).ready(function () { 

    var url_dept    = $('p.url-dept').text();
    var url_jobt    = $('p.url-jobt').text();
    var id_dept     ='';
    if ($('input[name="id_departement"]').length == 1) {
        $('input[name="id_departement"]').on("change paste keyup", function() {
            id_dept = $(this).val();
            url_jobt +=id_dept;
        });
        // $('input[name="id_departement"]').val();
        //
    }

    //console.log(url_jobt);

    //auto complete for fungsional 
    set_input_autocomplete(url_dept,'input[name="job_departement"]','name','id_departement','input[name="id_departement"]');

    set_input_autocomplete(url_jobt,'input[name="job_title"]','name','id','input[name="id_group"]');




});
 
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
            $(selector_handler).val(id).trigger("change");
        }
    },
    theme: "square"
    };

    $(selector).easyAutocomplete(options);  
}