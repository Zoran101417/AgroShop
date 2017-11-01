  jQuery(document).ready(function($) {
      $("#contactform").validate({
        rules: {
          name: {
            required: true,
            minlength: 2
          },
          lname: {
            required: true,
            minlength: 2
          },
          email: {
            tequired: true,
            email: true
          },
          message: {
            required: true,
            minlength: 50
          }
        },
        message: {
          name: {
            required: "Ве молиме внесете го вашето име",
            minlength: "Вашето име е прекратко"
          },
          lname: {
            required: "Ве молиме внесете го вашето име",
            minlength: "Вашето име е прекратко"
          },
          email: {
            required: "Ве молиме внесете ја вашате е-маил адреса",
            minlength: "Ве молиме внесете валидна е-маил адреса"
          },
          message: {
            required: "Ве молиме внесете ја вашата порака",
            minlength: "Внесете најмалку 50 карактери"
          }
        }
      });
    });