class StudentInscriptionFormController {
    constructor(API, $scope, $state, ToastService) {
        'ngInject';
        this.API = API;
        this.$scope = $scope;
        this.$state = $state;
        this.ToastService = ToastService;
        //
    }

    $onInit() {
        this.studentForm = {};

        this.initData = {};

        this.studentForm.studies = [{
            study_year: "",
            study_university: "",
            study_level: "",
            study_resultat: ""
        }];

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
            },
            {
                templateUrl: './views/app/pages/student_inscription/fonction/student_inscription_form_fonction.page.html',
                title: 'fonction',
                hasForm: true
            },
            {
                templateUrl: './views/app/pages/student_inscription/study/student_inscription_form_study.page.html',
                title: 'Study',
                hasForm: true
            }
        ];

        // initialize init data
        this.API.one('student/create').get().then((data) => {
            this.initData = data;
        });

    }

    register() {
        this.API.all('student/create').post(this.studentForm).then(() => {
            this.ToastService.show(`Thanks for registering`);
            this.$state.go('app.landing');
        });
    }

    addStudy() {
        this.studentForm.studies.push({
            study_year: "",
            study_university: "",
            study_level: "",
            study_resultat: ""
        });
    }

    removeStudy() {
        if (this.studentForm.studies.length > 1) {
            this.studentForm.studies.splice(this.studentForm.studies.length - 1, 1);
        }
    }
}

export const StudentInscriptionFormComponent = {
    templateUrl: './views/app/components/student_inscription_form/student_inscription_form.component.html',
    controller: StudentInscriptionFormController,
    controllerAs: 'vm',
    bindings: {}
}
