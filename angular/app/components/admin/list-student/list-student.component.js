/**
 * Created by Abbes on 27/08/2016.
 */
class ListStudentController {
    constructor($auth, ToastService, API) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.API = API;
    }

    $onInit() {
        this.listStudent();
    }

    listStudent() {
        this.API.all('student')
            .getList()
            .then(function (data) {
                console.log(data);
            });
    }


}

export const ListStudentComponent = {
    templateUrl: './views/app/components/admin/list-student/list-student.component.html',
    controller: ListStudentController,
    controllerAs: 'vm',
    bindings: {}
}