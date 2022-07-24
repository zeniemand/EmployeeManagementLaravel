<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Create a new Employee</h1>
                </div>

                <div class="card">
                    <div class="card-header">
                        Create City
                        <router-link :to="{name: 'EmployeesIndex'}" class="btn btn-primary float-right">Back</router-link>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form @submit.prevent="store">

                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>

                                    <div class="col-md-6">
                                        <input id="first_name"
                                               type="text"
                                               class="form-control "
                                               v-model="form.first_name"
                                               required>

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last_name"
                                               type="text"
                                               class="form-control "
                                               v-model="form.last_name"
                                               required>

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle Name</label>

                                    <div class="col-md-6">
                                        <input id="middle_name"
                                               type="text"
                                               class="form-control "
                                               v-model="form.middle_name"
                                        >

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <input id="address"
                                               type="text"
                                               class="form-control "
                                               v-model="form.address"
                                               required
                                        >

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="department"
                                           class="col-md-4 col-form-label text-md-end">Department</label>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="department_choose">Choose Department</label>
                                            </div>
                                            <select class="custom-select"
                                                    v-model="form.department_id"
                                                    id="department_choose">
                                                <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-end">City</label>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="city_choose">Choose City</label>
                                            </div>
                                            <select
                                                class="custom-select"
                                                v-model="form.city_id"
                                                id="city_choose">
                                                <option v-for="city in cities" :key="city.id" :value="city.id" >{{ city.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="state"
                                           class="col-md-4 col-form-label text-md-end">State</label>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="state_choose">Choose State</label>
                                            </div>
                                            <select
                                                class="custom-select"
                                                @change="getCities"
                                                v-model="form.state_id"
                                                id="state_choose"
                                            >
                                                <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="country"
                                           class="col-md-4 col-form-label text-md-end">Country</label>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="country_choose">Choose Country</label>
                                            </div>
                                            <select
                                                @change="getStates"
                                                v-model="form.country_id"
                                                class="custom-select"
                                                    id="country_choose">
                                                <option v-for="country in countries" :key="country.id"
                                                :value="country.id">{{ country.name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-end">ZIP CODE</label>

                                    <div class="col-md-6">
                                        <input id="zip_code"
                                               type="text"
                                               class="form-control "
                                               v-model="form.zip_code"
                                               autofocus>

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-end">Birthday</label>

                                    <div class="col-md-6">
                                        <datepicker input-class="form-control" v-model="form.birthdate"></datepicker>

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="date_hired" class="col-md-4 col-form-label text-md-end">Hired</label>

                                    <div class="col-md-6">
                                        <datepicker input-class="form-control" v-model="form.date_hired"></datepicker>

                                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create new Employee
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {
    components: {
        Datepicker
    },
    name: "Create",
    data() {
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: '',
                last_name: '',
                middle_name: '',
                department_id: '',
                address: '',
                city_id: '',
                state_id: '',
                country_id: '',
                zip_code: '',
                birthdate: null,
                date_hired: null,
            }
        }
    },
    created() {
        this.getCountries(),
        this.getDepartments()
    },
    methods: {
        getCountries() {
            axios.get('/api/employees/countries')
                .then(res => this.countries = res.data)
                .catch(error => console.error(error))
        },
        getStates() {
            axios.get(`/api/employees/${this.form.country_id}/states`)
                .then( res => this.states = res.data)
                .catch(error => console.log(error));
        },
        getCities() {
            axios.get(`/api/employees/${this.form.state_id}/cities`)
                .then( res => this.cities = res.data)
                .catch(error => console.error(error) );
        },
        getDepartments() {
            axios.get(`/api/employees/departments`)
                .then(res => this.departments = res.data)
                .catch(error => console.error(error));
        },
        store() {
            console.log('yyyess');
            this.form.birthdate = this.format_date(this.form.birthdate);
            this.form.date_hired = this.format_date(this.form.date_hired);
            axios.post('/api/employees', this.form).then( res => console.log(res)).catch(error => console.error(error));
        },
        format_date(val) {
            if (val) {
                return moment(new Date(val)).format('YYYYMMDD');
            }
        },
    }
}
</script>

<style scoped>

</style>
