/**
 * Created by Abbes on 27/08/2016.
 */
class HomeController {
    constructor($auth, ToastService, $location, API, $state) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.$location = $location;
        this.API = API;
        console.log(localStorage.getItem('user', {}))
        this.user = JSON.parse(localStorage.getItem('user', {}));
        this.$state = $state;
    }

    $onInit() {
        if (!this.$auth.isAuthenticated()) {
            console.log('Not auth')
            this.$state.go('app.login');
        }
    }

    fileSelected(element) {
        this.myUpload = element.files[0];
    }

    onFileSelect(files) {
        console.info('files', files[0]);
    }

    uploadPhoto() {
        let params = {
            img: this.myPhoto.base64
        };
        this.API.all("student/" + this.user.id_student + "/upload-photo").post(params)
            .then((res)=> {
                this.user.img = res.response;
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