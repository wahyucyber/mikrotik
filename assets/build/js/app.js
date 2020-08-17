'use strict';

class App {
   constructor() {
   }

   http(params = [], callBack) {
      $.ajax({
         type: params['method'],
         url: "api/"+params['url'],
         data: params['data'],
         headers: {
            Authorization: token
         },
         success: function (response) {
            if(response.status == false && response.error == "unauthorization.") {
               window.location = "auth/logout.html";
            }else{
               callBack(response);
            }
         }
      });
   }

   notif(params = []) {
      $(params['element']).html(`
         <div class="alert alert-${params['type']} alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            ${params['text']}
         </div>
      `);
   }
}

var app = new App;