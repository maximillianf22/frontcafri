function WjAlert(m,t){
     if(t=="i"){
          $.notify({
               icon: 'fa fa-check-circle-o',
               message: m,
               allow_dismiss: false,
               showProgressbar: true
          },{
               type: 'information',
               delay: 1000,
               timer: 500,
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: false,
               placement: {
                    from: 'top',
                    align: 'center'
               },
               offset: {
               x: 30,
               y: 70
               }
          });
     }

     if(t=="s"){
          $.notify({
               icon: 'fa fa-check-circle-o',
               message: m,
               allow_dismiss: false,
               showProgressbar: true
          },{
               type: 'success',
               delay: 2000,
               timer: 1000,
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: false,
               placement: {
                    from: 'top',
                    align: 'right'
               },
               offset: {
               x: 30,
               y: 70
               }
          });
     }

     /*--- Error Mensaje ---*/
     if(t=="e"){
          $.notify({
               icon: 'fa fa-check-circle-o',
               message: m,
               allow_dismiss: false,
               showProgressbar: true
          },{
               type: 'error',
               delay: 2000,
               timer: 1000,
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: false,
               placement: {
                    from: 'top',
                    align: 'right'
               },
               offset: {
               x: 30,
               y: 70
               }
          });
     }
     if(t=="w"){
          $.notify({
               icon: 'fa fa-check-circle-o',
               message: m,
               allow_dismiss: false,
               showProgressbar: true
          },{
               type: 'warning',
               delay: 2000,
               timer: 1500,
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: false,
               placement: {
                    from: 'top',
                    align: 'center'
               },
               offset: {
               x: 30,
               y: 70
               }
          });
     }
}
