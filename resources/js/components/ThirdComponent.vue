<template>

    <div>
        <div class="container pt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Third Step (Please provide avatar & both parts of NID)</h5>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-4 col-form-label">Avatar*</label>
                                <div class="col-md-8 d-flex justify-content-sm-start">
                                    <input type="file" name="avatar" class="form-control-file" id="avatar"
                                           @change="onAvatarChange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nid_first_part" class="col-sm-4 col-form-label">NID(First Part)*</label>
                                <div class="col-md-8 d-flex justify-content-sm-start">
                                    <input type="file" name="nid_first_part" class="form-control-file"
                                           id="nid_first_part"
                                           @change="onNidFirstPartChange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nid_second_part" class="col-sm-4 col-form-label">NID(Second Part*</label>
                                <div class="col-md-8 d-flex justify-content-sm-start">
                                    <input type="file" name="nid_second_part" class="form-control-file"
                                           id="nid_second_part"
                                           @change="onNidSecondPartChange">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <strong>* Pictures should be uploaded at png format</strong>
                <strong>* Indicates required field</strong>

            </div>

<!--            The following code is for showing errors-->
            <div v-if="validationErrors !='' " class="pt-4">
                <ul class="alert alert-danger">
                    <li v-for="(value, key, index) in validationErrors">{{ value + '' }}</li>
                </ul>
            </div>

            <div class="row pt-4">
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-success" @click="submitForm()">Save</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import ShowResult from "./ShowResult";

export default {
    name: "ThirdComponent",
    props: ["basicInfo", "experiences", "educations", "publications"],
    components: {ShowResult},
    data() {
        return {
            error: null,
            validationErrors: '',
            currentStep: '',
            form: {
                name: this.basicInfo.name,
                email: this.basicInfo.email,
                phone: this.basicInfo.phone,
                nid: this.basicInfo.nid,
                address: this.basicInfo.address,
                blood_group: this.basicInfo.blood_group,
                educations: this.educations,
                experiences: this.experiences,
                publications: this.publications,
                avatar: null,
                nid_first_part: null,
                nid_second_part: null,
            }
        };
    },

    methods: {
        goToStep: function (step) {
            this.currentStep = step;
        },

        onAvatarChange(event) {
            this.form.avatar = event.target.files[0];
        },
        onNidFirstPartChange(event) {
            this.form.nid_first_part = event.target.files[0];

        },
        onNidSecondPartChange(event) {
            this.form.nid_second_part = event.target.files[0];
        },

        // the following function is for submitting form data
        submitForm() {
            let formData = new FormData();
            formData.append("name", (this.form.name));
            formData.append("email", (this.form.email));
            formData.append("phone", (this.form.phone));
            formData.append("nid", (this.form.nid));
            formData.append("address", (this.form.address));
            formData.append("blood_group", (this.form.blood_group));
            formData.append("educations", JSON.stringify(this.form.educations));
            formData.append("experiences", JSON.stringify(this.form.experiences));
            formData.append("publications", JSON.stringify(this.form.publications));
            formData.append("avatar", this.form.avatar);
            formData.append("nid_first_part", this.form.nid_first_part);
            formData.append("nid_second_part", this.form.nid_second_part);

            axios.post("/post", formData).then((res) => {
                this.$router.push('/showResult');
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.validationErrors = error.response.data.errors;
                }

            });

        },

    }
}
</script>

<style scoped>

</style>
