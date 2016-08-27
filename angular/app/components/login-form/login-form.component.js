class LoginFormController {
    constructor($auth, ToastService, $location, $rootScope) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.$location = $location;
        this.$rootScope = $rootScope;
    }

    $onInit() {
        if (this.$auth.isAuthenticated()) {
            this.$location.url("/home");
            return;
        }
        this.email = '';
        this.password = '';
    }

    login() {
        let user = {
            email: this.email,
            password: this.password
        };

        this.$auth.login(user)
            .then((response) => {
                this.$auth.setToken(response.data);
                this.ToastService.show('Logged in successfully.');
                this.$rootScope.isAuthenticated = true;
                localStorage.setItem("user", JSON.stringify(response.data.data.student));
                this.$location.path("/home");
            })
            .catch(this.failedLogin.bind(this));
    }

    failedLogin(response) {
        if (response.status === 422) {
            for (let error in response.data.errors) {
                return this.ToastService.error(response.data.errors[error][0]);
            }
        }
        this.ToastService.error(response.statusText);
    }
}

export const LoginFormComponent = {
    templateUrl: './views/app/components/login-form/login-form.component.html',
    controller: LoginFormController,
    controllerAs: 'vm',
    bindings: {}
}
