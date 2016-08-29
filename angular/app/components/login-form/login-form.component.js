class LoginFormController {
    constructor($auth, ToastService, $location, $rootScope, $state) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.$location = $location;
        this.$rootScope = $rootScope;
        this.$state = $state;
    }

    $onInit() {
        if (this.$auth.isAuthenticated()) {
            this.$state.go('app.home');
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
                this.$state.go('app.home');
            })
            .catch(this.failedLogin.bind(this));
    }

    failedLogin(response) {
        console.log(response);
        this.ToastService.error(response.data.errors.message[0]);
    }
}

export const LoginFormComponent = {
    templateUrl: './views/app/components/login-form/login-form.component.html',
    controller: LoginFormController,
    controllerAs: 'vm',
    bindings: {}
}
