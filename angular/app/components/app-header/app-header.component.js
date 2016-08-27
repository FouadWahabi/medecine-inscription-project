class AppHeaderController {
    constructor($sce, $auth, $location, $rootScope) {
        'ngInject';

        this.$sce = $sce;
        this.$auth = $auth;
        this.$location = $location;
        this.$rootScope = $rootScope;

    }

    $onInit() {
        //defer iframe loading
        this.$rootScope.isAuthenticated = this.$auth.isAuthenticated();
        console.log(this.$rootScope.isAuthenticated);

    }


    logout() {
        console.log("Hello");
        this.$auth.logout();
        this.$rootScope.isAuthenticated = this.$auth.isAuthenticated();
        localStorage.setItem("user",{});
        this.$location.url("/login");


    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
