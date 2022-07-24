<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
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
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="form-inline">
                                    <router-link :to="{
                                        name: 'EmployeesEdit',
                                        // params: {
                                        //     id: employee.id
                                        // }
                                    }"
                                                 class="btn btn-success">Edit</router-link>
                                    <form action="#"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure to delete?')"
                                    >
                                        <button class="btn btn-danger ml-2 ">Delete</button>
                                    </form>
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
export default {
    name: "index",
    data(){
        return {
            employees: [],
        }
    },
    created() {
        this.employees = this.getEmployees();
    },
    methods: {
        getEmployees(){
            axios.get("api/employees")
                .then(res => this.employees = res.data.data)
                .catch(error => console.error(error));
        }
    }
}
</script>

<style scoped>

</style>
