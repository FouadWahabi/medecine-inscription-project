/**
 * Created by Abbes on 27/08/2016.
 */
class HomeController {
    constructor($auth, ToastService, $location, API) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.$location = $location;
        this.API = API;
        this.user = JSON.parse(localStorage.getItem('user', {}));
    }

    $onInit() {
        if (!this.$auth.isAuthenticated()) {
            this.$location.url('/login');
        }
    }

    fileSelected(element) {
        var myFileSelected = element.files[0];
        console.log(myFileSelected);
    }

    onFileSelect(files) {
        console.info('files', files[0]);
    }

    uploadPhoto(data) {
        console.log(data);
        console.log(this.myUpload);
        console.log(this.user);

        let params = {
            img: data.base64
        };
        this.API.all("student/" + this.user + "/upload-photo").post(params)
            .then(()=> {
                this.ToastService.show("Image Added success");
            });

    }


}

export const HomeComponent = {
    templateUrl: './views/app/components/home/home.component.html',
    controller: HomeController,
    controllerAs: 'vm',
    bindings: {}
}