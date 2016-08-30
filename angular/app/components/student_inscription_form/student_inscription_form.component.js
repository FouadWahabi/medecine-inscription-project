class StudentInscriptionFormController {
    constructor($auth, API, $scope, $state, ToastService) {
        'ngInject';
        this.$auth = $auth;
        this.API = API;
        this.$scope = $scope;
        this.$state = $state;
        this.ToastService = ToastService;
        //
    }

    $onInit() {

        if (this.$auth.isAuthenticated()) {
            this.$state.go('app.home');
        }

        this.studentForm = {};

        this.studentForm.studies = [];

        this.initData = {};

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
                templateUrl: './views/app/pages/student_inscription/study/student_inscription_form_study.page.html',
                title: 'Study',
                hasForm: true
            },
            {
                templateUrl: './views/app/pages/student_inscription/fonction/student_inscription_form_fonction.page.html',
                title: 'Fonction',
                hasForm: true
            },
            {
                templateUrl: './views/app/pages/student_inscription/doctaurat/student_inscription_form_doctaurat.page.html',
                title: 'Doctaurat',
                hasForm: true
            }
        ];

        // initialize init data
        this.API.one('student/create').get().then((data) => {
            this.initData = data;
        });

    }

    register() {
        console.log(this.studentForm.birthday);
        this.studentForm.birthday = this.getFormatDate(this.studentForm.birthday);
        this.studentForm.date_of_inauguration = this.getFormatDate(this.studentForm.date_of_inauguration);
        this.studentForm.doctaurat_date_of_pitc = this.getFormatDate(this.studentForm.doctaurat_date_of_pitc);
        this.API.all('student/create').post(this.studentForm).then(() => {
                this.ToastService.show(`Thanks for registering`);
                this.$state.go('app.landing');
            })
            .catch(this.failedRegister.bind(this));

    }

    getFormatDate(data) {
        if (data != undefined) {
            var jj = data.substring(0, 2);
            var mm = data.substring(3, 5);
            var aa = data.substring(6);
            return aa + "-" + mm + "-" + jj;
        }
        return undefined;
    }

    failedRegister(response) {
        console.log(response);
        if (response.status == 400)
            this.ToastService.error(response.data.errors.message[0]);
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

    getCities(id_country) {
        if (this.initData.cities) {
            return this.initData.cities[id_country];
        } else {
            return [];
        }
    }

    studyRange() {
        var input = [];
        for (var i = parseInt(this.studentForm.bac_year) + 1; i < 2017; i += 1) {
            input.push(i.toString());
            if ((i - parseInt(this.studentForm.bac_year)) > this.studentForm.studies.length) {
                this.studentForm.studies.push({
                    study_year: "",
                    study_university: "",
                    study_level: "",
                    study_result: ""
                });
            }
        }
        console.log(input)
        return input;
    }

}

export const StudentInscriptionFormComponent = {
    templateUrl: './views/app/components/student_inscription_form/student_inscription_form.component.html',
    controller: StudentInscriptionFormController,
    controllerAs: 'vm',
    bindings: {}
}
