$(document).ready(function () {
  $.fn.select2entity = function(action) {
    var action = action || {};
    this.select2($.extend(action, {
      ajax: {
        data: function (params) {
          return {
            q: params.term,
            page: params.page || 1
          };
        }
      }
    }));
    return this;
  };

  $('.select2entity').select2entity();
});
