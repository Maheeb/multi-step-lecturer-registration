<template>

    <div>
<!--        The following component is for top navbar-->
        <LayoutComponent/>

<!--        First step of the form starting from here-->
        <div v-if="currentStep===1">
            <div class="container pt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">First Step (Please Provide Basic Information)</h5>

                    </div>
                    <div class="card-body">

                        <div class="row form-group">

                            <div v-if="errors.length">
                                <b>Please correct the following error(s):</b>
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" placeholder="Enter Name"
                                       v-model="basicInfo.name"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" placeholder="Enter Email"
                                       v-model="basicInfo.email" required>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="phone">Phone*</label>
                                <input type="number" class="form-control" placeholder="Enter Phone"
                                       v-model="basicInfo.phone" required>
                            </div>

                            <div class="col-md-6">
                                <label for="nid">NID*</label>
                                <input type="number" class="form-control" placeholder="Enter NID"
                                       v-model="basicInfo.nid" required>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address"
                                       v-model="basicInfo.address" required>
                            </div>

                            <div class="col-md-6">
                                <label for="blood_group">Blood Group</label>
                                <input type="text" class="form-control" placeholder="Enter Blood Group"
                                       v-model="basicInfo.blood_group" required>
                            </div>

                        </div>

                        <strong>* Indicates required field</strong>
                    </div>
                </div>

                <div class="row pt-4">

                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" @click.prevent="goToStep(2)">

                            Next Step
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div v-else>
            <second-component :item="currentStep" :basicInfo="basicInfo"/>
        </div>
    </div>

</template>

<script>
import SecondComponent from "./SecondComponent";
import LayoutComponent from "./LayoutComponent";
export default {
    name: "FirstComponent",
    components: {SecondComponent, LayoutComponent},
    data() {
        return {
            currentStep: 1,
            errors: [],
            basicInfo: {
                name: '',
                email: '',
                phone: '',
                nid: '',
                address: '',
                blood_group: '',
            },
        };
    },

    methods: {

        goToStep: function (step) {
                this.currentStep = step;
        },

    }

}
</script>

<style scoped>

</style>
