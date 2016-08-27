class StudentInscriptionFormController {
    constructor(API, $scope, $state) {
        'ngInject';
        this.API = API;
        this.$scope = $scope;
        this.$state = $state;
        //
    }

    $onInit() {
        this.studentForm = {};

        this.$scope.steps = [
            {
                templateUrl: './views/app/pages/student_inscription/general/student_inscription_form_general.page.html',
                title: 'General',
                hasForm: true
            },
            {
                templateUrl: './views/app/pages/student_inscription/address/student_inscription_form_address.page.html',
                title: 'Address',
                hasForm: true
            },
            {
                templateUrl: './views/app/pages/student_inscription/bac/student_inscription_form_bac.page.html',
                title: 'Bac',
                hasForm: true
            }
        ];

    }

    register() {
        var newStudent = this.API.all('student/create');

        newStudent.post('student', this.studentForm).then(() => {
            this.isValidToken = true;
        }, () => {
            this.$state.go('app.landing');
        });
    }
}

export const StudentInscriptionFormComponent = {
    templateUrl: './views/app/components/student_inscription_form/student_inscription_form.component.html',
    controller: StudentInscriptionFormController,
    controllerAs: 'vm',
    bindings: {}
}
