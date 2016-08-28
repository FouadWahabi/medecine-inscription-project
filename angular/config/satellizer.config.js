export function SatellizerConfig($authProvider) {
    'ngInject';

    $authProvider.httpInterceptor = function () {
        return true;
    }

    $authProvider.loginUrl = '/api/auth/login';
    $authProvider.signupUrl = '/api/auth/signup';
    $authProvider.tokenName = 'token';
    $authProvider.tokenPrefix = 'satellizer';
    $authProvider.tokenHeader = 'Authorization';
    $authProvider.tokenType = 'Bearer';
    $authProvider.storageType = 'localStorage';

}
