<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
                </div>

                <div v-if="message" class="alert alert-success" role="alert">
                    {{ message }}
                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <form method="GET" action="#">
                                    <div class="form-row align-items-center">
                                        <div class="col">
                                            <input type="search"
                                                   name="search"
                                                   class="form-control mb-2"
                                                   id="search"
                                                   placeholder="search name">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary mb-2 float-right" >Create employee</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-auto">
                        <table class="card-table table">
                            <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Country</th>
                                <th scope="col">Zip Code</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Hired</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">#{{ employee.id }}</th>
                                <td>{{ employee.first_name }}</td>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.middle_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.department }}</td>
                                <td>{{ employee.city }}</td>
                                <td>{{ employee.state }}</td>
                                <td>{{ employee.country }}</td>
                                <td>{{ employee.zip_code }}</td>
                                <td>{{ format_date(employee.birthdate) }}</td>
                                <td>{{ format_date(employee.date_hired) }}</td>
                                <td class="form-inline">
                                    <router-link :to="{
                                        name: 'EmployeesEdit',
                                        params: {
                                            id: employee.id
                                        }
                                    }"
                                                 class="btn btn-success">Edit</router-link>
                                    <button class="btn btn-danger ml-2 " @click="deleteEmployee(employee.id)" >Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "index",
    data(){
        return {
            employees: [],
            message: false,
        }
    },
    created() {
        this.employees = this.getEmployees();
    },
    mounted() {
        if (localStorage.message) {
            this.message = localStorage.message;
            localStorage.removeItem('message');
        }
    },
    methods: {
        getEmployees(){
            axios.get("api/employees")
                .then(res => this.employees = res.data.data)
                .catch(error => console.error(error));
        },
        format_date(val) {
            if (val) {
                return moment(new Date(val)).format('YYYY-MM-DD');
            }
        },
        async deleteEmployee(id) {
            if(confirm('Are you sure to delete?')){
                let deletedEmployeeName = '';
                await axios.delete('/api/employees/' + id)
                    .then(res => {
                        deletedEmployeeName = res.data.employeeName
                    })
                    .catch(error => console.error(error));
                this.employees = this.getEmployees();
                this.message = `Employee: \' ${deletedEmployeeName} \' deleted successfully `;
            }
        },
    }
}
</script>

<style scoped>

</style>
