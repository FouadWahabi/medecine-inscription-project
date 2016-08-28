class AppHeaderController {
    constructor($sce, $auth, $location, $rootScope, $state) {
        'ngInject';

        this.$sce = $sce;
        this.$auth = $auth;
        this.$location = $location;
        this.$rootScope = $rootScope;
        this.$state = $state;
    }

    $onInit() {
        this.$rootScope.isAuthenticated = this.$auth.isAuthenticated();
    }

    logout() {
        this.$auth.logout();
        this.$rootScope.isAuthenticated = this.$auth.isAuthenticated();
        localStorage.removeItem("user");
        this.$state.go('app.login');

    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
