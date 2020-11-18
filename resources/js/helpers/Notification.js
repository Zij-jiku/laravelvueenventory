class Notification{
    success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Insert Successfully',
            time: 1000  
        }).show();
    }

    alert(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Are you sure?',
            time: 1000  
        }).show();
    }

    error(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Something went wrong!',
            time: 1000  
        }).show();
    }

    warning(){
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Opps wrong',
            time: 1000  
        }).show();
    }

    img_val(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Upload image more than 1MB',
            time: 1000
        }).show();
    }

}
export default Notification = new Notification();




